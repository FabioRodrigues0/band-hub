import { Component, Input } from '@angular/core';
import { Observable, of } from 'rxjs';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { Album, Artist, Band } from '../../core/interfaces';
import { DataService } from '../../core/services/data.service';

@Component({
  selector: 'app-card',
  standalone: true,
  imports: [
    CommonModule,
    RouterModule
  ],
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.scss']
})
export class CardComponent {
  @Input() item!: Album | Artist | Band;
  @Input() type: 'album' | 'artist' | 'band' = 'album';

  constructor(private dataService: DataService) { }

  get routerLink(): string[] {
    if (!this.item?.slug) return ['/'];
    return ['/', this.type + 's', this.item.slug];
  }

  getName(): string {
    if (!this.item) return 'Unknown';
    if (this.isAlbum(this.item)) {
      return this.item.title;
    }
    return this.item.name;
  }

  getImage(): string {
    if (!this.item) return this.getDefaultImage();
    if (this.isAlbum(this.item)) {
      return this.item.image || this.getDefaultImage();
    }
    return this.item.image || this.getDefaultImage();
  }

  isAlbum(item: Album | Artist | Band): item is Album {
    return 'title' in item || 'releaseDate' in item;
  }

  isArtist(item: Album | Artist | Band): item is Artist {
    return 'genres' in item && !('members' in item);
  }

  isBand(item: Album | Artist | Band): item is Band {
    return 'members' in item;
  }

  getDefaultImage(): string {
    if (!this.item) return '/assets/images/default-artist.svg';
    
    if (this.isAlbum(this.item)) {
      return '/assets/images/default-album.svg';
    } else if (this.isBand(this.item)) {
      return '/assets/images/default-band.svg';
    } else {
      return '/assets/images/default-artist.svg';
    }
  }

  handleImageError(event: Event): void {
    const img = event.target as HTMLImageElement;
    if (img) {
      img.src = this.getDefaultImage();
    }
  }
}
