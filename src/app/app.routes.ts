import { Routes } from '@angular/router';
import { HomeComponent } from './features/home/home.component';
import { ListComponent } from './features/list/list.component';
import { DetailsComponent } from './features/details/details.component';
import { ProfileComponent } from './features/profile/profile.component';
import { MusicListsComponent } from './features/music-lists/music-lists.component';

export const routes: Routes = [
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'profile',
    component: ProfileComponent
  },
  {
    path: 'lists',
    children: [
      {
        path: 'want-to-listen',
        component: MusicListsComponent,
        data: { listType: 'want-to-listen' }
      },
      {
        path: 'currently-playing',
        component: MusicListsComponent,
        data: { listType: 'currently-playing' }
      },
      {
        path: 'listened',
        component: MusicListsComponent,
        data: { listType: 'listened' }
      },
      {
        path: 'favorites',
        component: MusicListsComponent,
        data: { listType: 'favorites' }
      }
    ]
  },
  {
    path: ':type',
    component: ListComponent
  },
  {
    path: ':type/:slug',
    component: DetailsComponent
  }
];
