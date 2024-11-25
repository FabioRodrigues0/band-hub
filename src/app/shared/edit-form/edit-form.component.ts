import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-edit-form',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './edit-form.component.html'
})
export class EditFormComponent implements OnInit {
  @Input() form!: FormGroup;
  @Output() save = new EventEmitter<void>();
  @Output() cancel = new EventEmitter<void>();

  ngOnInit() {
    // Initialize form with default values if not already set
    if (this.form && !this.form.dirty) {
      Object.keys(this.form.controls).forEach(key => {
        const control = this.form.get(key);
        if (control && control.value === '') {
          control.setValue(null);
        }
      });
    }
  }

  onSave() {
    if (this.form.valid) {
      this.save.emit();
    }
  }

  onCancel() {
    this.form.reset(this.form.value);
    this.cancel.emit();
  }
}
