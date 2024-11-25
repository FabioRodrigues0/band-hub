import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterLink, RouterLinkActive } from '@angular/router';
import { Observable } from 'rxjs';
import { User } from '../interfaces';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [CommonModule, RouterLink, RouterLinkActive],
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  user$: Observable<User | null>;
  isAuthenticated$: Observable<boolean>;
  isUserMenuOpen = false;

  navigationItems = [
    { label: 'Home', icon: 'ri-home-line', route: '/' },
    { label: 'Want to Listen', icon: 'ri-headphone-line', route: '/want-to-listen' },
    { label: 'Currently Playing', icon: 'ri-play-circle-line', route: '/currently-playing' },
    { label: 'Listened', icon: 'ri-history-line', route: '/listened' },
    { label: 'Favorites', icon: 'ri-heart-line', route: '/favorites' }
  ];

  constructor(private authService: AuthService) {
    this.user$ = this.authService.currentUser$;
    this.isAuthenticated$ = this.authService.isAuthenticated$;
  }

  ngOnInit(): void {}

  logout(): void {
    this.authService.logout();
    this.isUserMenuOpen = false;
  }

  toggleUserMenu(): void {
    this.isUserMenuOpen = !this.isUserMenuOpen;
  }

  getUserInitial(user: User | null): string {
    return user?.name?.charAt(0).toUpperCase() ?? '?';
  }

  getUserName(user: User | null): string {
    return user?.name ?? 'User';
  }
}
