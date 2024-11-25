import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ActivatedRoute } from '@angular/router';
import { Track } from '../../core/interfaces';
import { NotificationService } from '../../core/services/notification.service';

@Component({
  selector: 'app-music-lists',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="p-6">
      <h1 class="text-2xl font-bold mb-6">{{ currentList?.name }}</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div *ngFor="let track of currentList?.tracks" 
             class="bg-zinc-800 p-4 rounded-lg hover:bg-zinc-700 transition-colors">
          <div class="flex items-center">
            <img [src]="track.album?.image" [alt]="track.title" 
                 class="w-16 h-16 rounded mr-4">
            <div>
              <h3 class="font-medium text-white">{{ track.title }}</h3>
              <p class="text-sm text-gray-400">{{ track.artist?.name }}</p>
            </div>
          </div>
          <div class="mt-2 flex justify-end">
            <button *ngFor="let action of getAvailableActions()" 
                    (click)="moveTrack(track, action.targetList)"
                    class="text-sm text-indigo-400 hover:text-indigo-300 ml-2">
              {{ action.label }}
            </button>
          </div>
        </div>
      </div>
    </div>
  `
})
export class MusicListsComponent implements OnInit {
  musicLists = [
    {
      id: 'want-to-listen',
      name: 'Want to Listen',
      tracks: [] as Track[],
      actions: [
        { label: 'Move to Currently Playing', targetList: 'currently-playing' },
        { label: 'Move to Listened', targetList: 'listened' },
        { label: 'Add to Favorites', targetList: 'favorites' }
      ]
    },
    {
      id: 'currently-playing',
      name: 'Currently Playing',
      tracks: [] as Track[],
      actions: [
        { label: 'Move to Listened', targetList: 'listened' },
        { label: 'Add to Favorites', targetList: 'favorites' }
      ]
    },
    {
      id: 'listened',
      name: 'Listened',
      tracks: [] as Track[],
      actions: [
        { label: 'Add to Favorites', targetList: 'favorites' }
      ]
    },
    {
      id: 'favorites',
      name: 'Favorites',
      tracks: [] as Track[],
      actions: [
        { label: 'Remove from Favorites', targetList: 'remove' }
      ]
    }
  ];

  currentList = this.musicLists[0];

  constructor(
    private route: ActivatedRoute,
    private notificationService: NotificationService
  ) {}

  ngOnInit() {
    this.route.data.subscribe(data => {
      const listType = data['listType'];
      this.currentList = this.musicLists.find(list => list.id === listType) || this.musicLists[0];
      // TODO: Load tracks for the current list from a service
    });
  }

  getAvailableActions() {
    return this.currentList?.actions || [];
  }

  moveTrack(track: Track, targetList: string) {
    // TODO: Implement track movement logic with backend service
    this.notificationService.success(`Moved "${track.title}" to ${targetList}`);
  }
}
