import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NotificationService } from '../../services/notification.service';

@Component({
  selector: 'app-notification',
  standalone: true,
  imports: [CommonModule],
  template: `
    <div class="fixed bottom-4 right-4 z-50">
      <div *ngFor="let notification of notifications" 
           class="mb-2 p-4 rounded-lg shadow-lg max-w-md animate-slide-in"
           [ngClass]="{
             'bg-green-500': notification.type === 'success',
             'bg-red-500': notification.type === 'error',
             'bg-blue-500': notification.type === 'info'
           }">
        <p class="text-white">{{ notification.message }}</p>
      </div>
    </div>
  `,
  styles: [`
    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    .animate-slide-in {
      animation: slideIn 0.3s ease-out;
    }
  `]
})
export class NotificationComponent implements OnInit {
  notifications: { message: string; type: string; }[] = [];

  constructor(private notificationService: NotificationService) {}

  ngOnInit() {
    this.notificationService.getNotifications().subscribe(notification => {
      this.notifications.push(notification);
      setTimeout(() => {
        this.notifications = this.notifications.filter(n => n !== notification);
      }, notification.duration || 3000);
    });
  }
}
