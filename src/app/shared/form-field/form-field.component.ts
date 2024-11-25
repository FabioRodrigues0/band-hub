import { Component, Input } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AbstractControl, ReactiveFormsModule, ValidationErrors } from '@angular/forms';
import { animate, style, transition, trigger } from '@angular/animations';

@Component({
  selector: 'app-form-field',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './form-field.component.html',
  animations: [
    trigger('fadeInOut', [
      transition(':enter', [
        style({ opacity: 0, transform: 'translateY(-10px)' }),
        animate('200ms ease-out', style({ opacity: 1, transform: 'translateY(0)' }))
      ]),
      transition(':leave', [
        animate('200ms ease-in', style({ opacity: 0, transform: 'translateY(-10px)' }))
      ])
    ])
  ]
})
export class FormFieldComponent {
  @Input() label!: string;
  @Input() control!: AbstractControl;
  @Input() error?: ValidationErrors | null;
  @Input() showErrors: boolean = true;
  @Input() hint?: string;

  get isRequired(): boolean {
    if (this.control) {
      const validators = this.control.validator?.(this.control);
      return validators?.['required'] !== undefined;
    }
    return false;
  }

  get hasError(): boolean {
    return this.control && this.control.invalid && (this.control.dirty || this.control.touched);
  }

  get errorMessage(): string {
    if (!this.error) return '';

    if (this.error['required']) return 'This field is required';
    if (this.error['email']) return 'Please enter a valid email address';
    if (this.error['minlength']) return `Minimum length is ${this.error['minlength'].requiredLength} characters`;
    if (this.error['maxlength']) return `Maximum length is ${this.error['maxlength'].requiredLength} characters`;
    if (this.error['pattern']) return 'Only letters, numbers, underscores, and hyphens are allowed';

    return 'Invalid input';
  }
}
