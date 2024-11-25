import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable, map } from 'rxjs';
import { Album, Artist, Band, User, Genre } from '../interfaces';

@Injectable({
  providedIn: 'root'
})
export class DataService {
  private apiUrl = 'http://localhost:8000/api';

  constructor(private http: HttpClient) {}

  // Artist endpoints
  getArtists(params?: {
    search?: string;
    sortBy?: 'name';
    sortOrder?: 'asc' | 'desc';
  }): Observable<Artist[]> {
    let httpParams = new HttpParams();
    
    if (params) {
      if (params.search) httpParams = httpParams.set('search', params.search);
      if (params.sortBy) {
        httpParams = httpParams.set('sortBy', params.sortBy);
        httpParams = httpParams.set('sortOrder', params.sortOrder || 'asc');
      }
    }

    return this.http.get<Artist[]>(`${this.apiUrl}/artists`, { params: httpParams });
  }

  getArtist(id: number): Observable<Artist> {
    return this.http.get<Artist>(`${this.apiUrl}/artists/${id}`);
  }

  getArtistBySlug(slug: string): Observable<Artist> {
    return this.http.get<Artist>(`${this.apiUrl}/artists/${slug}`);
  }

  getArtistAlbums(artistId: number): Observable<Album[]> {
    return this.http.get<Album[]>(`${this.apiUrl}/artists/${artistId}/albums`);
  }

  getRecentlyPlayed(): Observable<(Album | Artist | Band)[]> {
    return this.http.get<(Album | Artist | Band)[]>(`${this.apiUrl}/recently-played`);
  }

  getGenres(): Observable<Genre[]> {
    return this.http.get<Genre[]>(`${this.apiUrl}/genres`);
  }

  // Album endpoints
  getAlbums(params?: {
    search?: string;
    sortBy?: 'title' | 'releaseDate';
    sortOrder?: 'asc' | 'desc';
  }): Observable<Album[]> {
    let httpParams = new HttpParams();
    
    if (params) {
      if (params.search) httpParams = httpParams.set('search', params.search);
      if (params.sortBy) {
        httpParams = httpParams.set('sortBy', params.sortBy);
        httpParams = httpParams.set('sortOrder', params.sortOrder || 'asc');
      }
    }

    return this.http.get<Album[]>(`${this.apiUrl}/albums`, { params: httpParams });
  }

  getAlbum(id: number): Observable<Album> {
    return this.http.get<Album>(`${this.apiUrl}/albums/${id}`);
  }

  getAlbumBySlug(slug: string): Observable<Album> {
    return this.http.get<Album>(`${this.apiUrl}/albums/${slug}`);
  }

  // Band endpoints
  getBands(params?: {
    search?: string;
    sortBy?: 'name';
    sortOrder?: 'asc' | 'desc';
  }): Observable<Band[]> {
    let httpParams = new HttpParams();
    
    if (params) {
      if (params.search) httpParams = httpParams.set('search', params.search);
      if (params.sortBy) {
        httpParams = httpParams.set('sortBy', params.sortBy);
        httpParams = httpParams.set('sortOrder', params.sortOrder || 'asc');
      }
    }

    return this.http.get<Band[]>(`${this.apiUrl}/bands`, { params: httpParams });
  }

  getBand(id: number): Observable<Band> {
    return this.http.get<Band>(`${this.apiUrl}/bands/${id}`);
  }

  getBandBySlug(slug: string): Observable<Band> {
    return this.http.get<Band>(`${this.apiUrl}/bands/${slug}`);
  }

  getBandAlbums(bandId: number): Observable<Album[]> {
    return this.http.get<Album[]>(`${this.apiUrl}/bands/${bandId}/albums`);
  }

  // Mock Profile endpoints (no authentication required)
  getProfile(): Observable<User> {
    // Return mock user data
    const mockUser: User = {
      id: '1',
      name: 'John Doe',
      username: 'johndoe',
      email: 'john@example.com',
      bio: 'Music enthusiast and aspiring guitarist',
      image: null,
      followers: 42,
      following: 38,
      playlists: 12,
      favoriteGenres: ['Rock', 'Jazz', 'Blues']
    };
    return new Observable(observer => {
      setTimeout(() => {
        observer.next(mockUser);
        observer.complete();
      }, 500);
    });
  }

  updateProfile(data: Partial<User>): Observable<User> {
    // Simulate profile update
    return new Observable(observer => {
      setTimeout(() => {
        observer.next({
          id: '1',
          ...data,
          followers: 42,
          following: 38,
          playlists: 12
        } as User);
        observer.complete();
      }, 500);
    });
  }

  // Helper function for formatting track duration
  private formatDuration(seconds: number): string {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
  }
}
