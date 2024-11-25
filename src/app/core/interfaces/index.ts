import { FormControl } from '@angular/forms';

// Core interfaces
export * from './genre.interface';

export interface User {
  id: number;
  name: string;
  username: string;
  email: string;
  bio?: string;
  image?: string;
  followers?: number;
  following?: number;
  playlists?: number;
  favoriteGenres?: string[];
}

export interface Artist {
  id: number;
  name: string;
  slug: string;
  bio: string;
  description?: string;
  image: string;
  genres: string[];
  bands?: Band[];
  albums?: Album[];
  monthlyListeners?: number;
  topTracks?: Track[];
  relatedArtists?: Artist[];
  instruments?: string[];
}

export interface Album {
  id: number;
  title: string;
  slug: string;
  description?: string;
  image?: string;
  year_release?: number;
  band?: {
    id: number;
    name: string;
    slug: string;
  };
  artists?: Array<{
    id: number;
    name: string;
    slug: string;
  }>;
  tracks?: Track[];
}

export interface Track {
  id: number;
  title: string;
  albumId: number;
  album?: Album;
  artistId: number;
  artist?: Artist;
  duration: string | number;
  trackNumber: number;
  isExplicit?: boolean;
  popularity?: number;
  previewUrl?: string;
}

export interface Band {
  id: number;
  name: string;
  slug: string;
  description?: string;
  image?: string;
  genres?: string[];
  members?: Artist[];
  albums?: Album[];
}

export interface Playlist {
  id: number;
  title: string;
  description?: string;
  coverImage?: string;
  userId: number;
  user?: User;
  tracks: Track[];
  isPublic: boolean;
  followers?: number;
  duration?: string;
  createdAt: string;
  updatedAt: string;
}

export interface Genre {
  id: number;
  name: string;
  color: string;
  description?: string;
  popularity?: number;
  image?: string;
}

// Form-related interfaces
export interface ProfileFormData {
  name: string;
  bio: string;
  image: string;
  favoriteGenres: string[];
}

export interface PlaylistFormData {
  title: string;
  description?: string;
  isPublic: boolean;
}

// Response interfaces
export interface ApiResponse<T> {
  data: T;
  message?: string;
  error?: string;
}
