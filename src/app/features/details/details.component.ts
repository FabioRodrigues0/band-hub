import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ActivatedRoute, RouterModule } from '@angular/router';
import { ActionButtonsComponent } from '../../shared/action-buttons/action-buttons.component';
import { Album, Artist, Band } from '../../core/interfaces';
import { DataService } from '../../core/services/data.service';
import { ImageFallbackDirective } from '../../shared/directives/image-fallback.directive';
import { CardComponent } from '../../shared/card/card.component';
import { NgOptimizedImage } from '@angular/common';
import { Observable, of } from 'rxjs';

type ItemType = 'album' | 'artist' | 'band';

@Component({
  selector: 'app-details',
  standalone: true,
  imports: [
    CommonModule, 
    ActionButtonsComponent,
    RouterModule,
    NgOptimizedImage,
    ImageFallbackDirective,
    CardComponent
  ],
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {
  type: ItemType | null = null;
  item: Album | Artist | Band | null = null;
  relatedItems: Album[] = [];
  isLoading = true;
  error: string | null = null;

  constructor(
    private route: ActivatedRoute,
    private dataService: DataService
  ) {}

  ngOnInit() {
    // Get type and slug from URL
    this.route.url.subscribe(segments => {
      if (segments.length >= 1) {
        this.type = segments[0].path as ItemType;
        const slug = segments[1]?.path;
        
        if (slug) {
          this.loadItem(slug);
        }
      }
    });
  }

  private loadItem(slug: string) {
    this.isLoading = true;
    this.error = null;

    switch (this.type) {
      case 'album':
        this.loadAlbumDetails(slug);
        break;
      case 'artist':
        this.loadArtist(slug);
        break;
      case 'band':
        this.loadBandDetails(slug);
        break;
    }
  }

  private loadAlbumDetails(slug: string): void {
    this.dataService.getAlbumBySlug(slug).subscribe({
      next: (album: Album) => {
        this.item = album;
        this.dataService.getAlbums().subscribe(
          (albums: Album[]) => this.relatedItems = albums
        );
      },
      error: (error) => {
        console.error('Error loading album:', error);
        this.error = 'Failed to load album details';
      }
    });
  }

  private loadArtist(slug: string): void {
    this.dataService.getArtistBySlug(slug).subscribe({
      next: (artist: Artist) => {
        this.item = artist;
        if (artist) {
          this.dataService.getArtistAlbums(artist.id).subscribe(
            (albums: Album[]) => this.relatedItems = albums
          );
        }
      },
      error: (error) => {
        console.error('Error loading artist:', error);
        this.error = 'Failed to load artist details';
      }
    });
  }

  private loadBandDetails(slug: string): void {
    this.dataService.getBandBySlug(slug).subscribe({
      next: (band: Band) => {
        this.item = band;
        if (band) {
          this.dataService.getBandAlbums(band.id).subscribe(
            (albums: Album[]) => this.relatedItems = albums
          );
        }
      },
      error: (error) => {
        console.error('Error loading band:', error);
        this.error = 'Failed to load band details';
      }
    });
  }

  isAlbum(item: Album | Artist | Band): item is Album {
    return 'title' in item;
  }

  isArtist(item: Album | Artist | Band): item is Artist {
    return 'instruments' in item;
  }

  isBand(item: Album | Artist | Band): item is Band {
    return 'members' in item;
  }

  getItemName(item: Album | Artist | Band): string {
    if (this.isAlbum(item)) {
      return item.title;
    }
    return item.name;
  }

  getDefaultImage(): string {
    if (this.isAlbum(this.item)) {
      return '/assets/images/defaults/album.jpg';
    } else if (this.isArtist(this.item)) {
      return '/assets/images/defaults/artist.jpg';
    }
    return '/assets/images/defaults/band.jpg';
  }
}
