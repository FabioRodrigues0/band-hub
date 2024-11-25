import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { SidebarComponent } from './core/sidebar/sidebar.component';
import { NotificationComponent } from './core/components/notification/notification.component';
import { AuthService } from './core/services/auth.service';
import { User } from './core/interfaces';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet, SidebarComponent, NotificationComponent],
  template: `
    <div class="flex h-screen bg-gray-100">
      <app-sidebar 
        [user]="user$ | async"
        [isAuthenticated]="isAuthenticated$ | async">
      </app-sidebar>
      <main class="flex-1 overflow-y-auto p-4">
        <router-outlet></router-outlet>
      </main>
      <app-notification></app-notification>
    </div>
  `
})
export class AppComponent implements OnInit {
  user$: Observable<User | null>;
  isAuthenticated$: Observable<boolean>;

  constructor(private authService: AuthService) {
    this.user$ = this.authService.currentUser$;
    this.isAuthenticated$ = this.authService.isAuthenticated$;
  }

  ngOnInit(): void {
    // Any initialization logic can go here
  }
}
