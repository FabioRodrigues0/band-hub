import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Observable, of } from 'rxjs';
import { CardComponent } from '@app/shared/card/card.component';
import { DataService } from '../../core/services/data.service';
import { Album, Artist, Band, Genre } from '../../core/interfaces';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, CardComponent],
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  greeting: string = '';
  recentlyPlayed$: Observable<(Album | Artist | Band)[]>;
  albums$: Observable<Album[]>;
  artists$: Observable<Artist[]>;
  bands$: Observable<Band[]>;
  genres: Genre[] = [];

  constructor(private dataService: DataService) {
    this.setGreeting();
    this.recentlyPlayed$ = this.dataService.getRecentlyPlayed();
    this.albums$ = this.dataService.getAlbums();
    this.artists$ = this.dataService.getArtists();
    this.bands$ = this.dataService.getBands();
  }

  ngOnInit(): void {
    this.loadGenres();
  }

  getItemName(item: Album | Artist | Band): string {
    if ('title' in item) {
      return item.title; // Album
    }
    return item.name; // Artist or Band
  }

  private setGreeting(): void {
    const hour = new Date().getHours();
    if (hour < 12) this.greeting = 'Morning';
    else if (hour < 18) this.greeting = 'Afternoon';
    else this.greeting = 'Evening';
  }

  private loadGenres(): void {
    this.dataService.getGenres().subscribe(genres => this.genres = genres);
  }
}
