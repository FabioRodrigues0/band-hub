import { Component, OnInit } from '@angular/core';
import { CommonModule, NgOptimizedImage } from '@angular/common';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { Band } from '../../core/interfaces/band.interface';
import { DrawerComponent } from '../../shared/drawer/drawer.component';
import { EditFormComponent } from '../../shared/edit-form/edit-form.component';
import { FormFieldComponent } from '../../shared/form-field/form-field.component';
import { ImageFallbackDirective } from '../../shared/directives/image-fallback.directive';

@Component({
  selector: 'app-band',
  standalone: true,
  imports: [
    CommonModule,
    NgOptimizedImage,
    ReactiveFormsModule,
    DrawerComponent,
    EditFormComponent,
    FormFieldComponent,
    ImageFallbackDirective
  ],
  templateUrl: './band.component.html',
  styleUrls: ['./band.component.css']
})
export class BandComponent implements OnInit {
  band?: Band;
  isLoading = true;
  error?: string;
  isEditDrawerOpen = false;
  editForm: FormGroup;

  constructor(private fb: FormBuilder) {
    this.editForm = this.fb.group({
      name: ['', [Validators.required, Validators.minLength(2)]],
      genre: ['', Validators.required],
      description: [''],
      formed: ['', [Validators.required, Validators.min(1900), Validators.max(new Date().getFullYear())]],
      location: ['', Validators.required],
      members: ['', Validators.required]
    });
  }

  ngOnInit() {
    // Simulate loading band data
    setTimeout(() => {
      try {
        this.band = {
          id: 1,
          name: 'The Example Band',
          genre: 'Rock',
          description: 'A fantastic rock band pushing the boundaries of modern music.',
          image: 'assets/images/band.jpg',
          formed: 2020,
          location: 'San Francisco, CA',
          members: ['John Doe (Guitar, Vocals)', 'Jane Smith (Bass)', 'Mike Johnson (Drums)'],
          albums: 2,
          followers: 1500,
          monthlyListeners: 5000
        };
        this.isLoading = false;
        
        // Initialize form with band data
        this.initializeForm();
      } catch (error) {
        this.error = 'Failed to load band data';
        this.isLoading = false;
      }
    }, 1000);
  }

  getDefaultImage(): string {
    return 'assets/images/default-band.jpg';
  }

  private initializeForm() {
    if (this.band) {
      this.editForm.patchValue({
        name: this.band.name,
        genre: this.band.genre,
        description: this.band.description || '',
        formed: this.band.formed,
        location: this.band.location,
        members: this.band.members.join(', ')
      });
      this.editForm.markAsPristine();
    }
  }

  openEditDrawer() {
    if (this.band) {
      // Reset form to current band data
      this.initializeForm();
      requestAnimationFrame(() => {
        this.isEditDrawerOpen = true;
      });
    }
  }

  closeEditDrawer() {
    this.isEditDrawerOpen = false;
    // Wait for animation to complete before resetting
    setTimeout(() => {
      this.initializeForm();
    }, 300);
  }

  saveBand() {
    if (this.editForm.valid && this.band) {
      const formValue = this.editForm.value;
      const members = formValue.members.split(',').map((member: string) => member.trim());
      
      // In a real app, you would call a service to update the band
      this.band = {
        ...this.band,
        ...formValue,
        members
      };
      this.closeEditDrawer();
    }
  }
}
