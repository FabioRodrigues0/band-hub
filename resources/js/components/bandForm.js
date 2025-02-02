export default () => ({
    form: {
        name: '',
        genres: '',
        description: '',
        artist_id: '',
        photo: null
    },
    photoPreview: null,

    handleFileInput(event) {
        const file = event.target.files[0];
        this.form.photo = file;

        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                this.photoPreview = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            this.photoPreview = null;
        }
    },

    async submit() {
        const formData = new FormData();
        Object.keys(this.form).forEach(key => {
            if (this.form[key] !== null && this.form[key] !== '') {
                formData.append(key, this.form[key]);
            }
        });

        try {
            const response = await fetch('/bands', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) {
                throw new Error('Failed to create band');
            }

            const result = await response.json();
            
            // Close drawer and reset form
            this.$dispatch('close-drawer');
            this.form = {
                name: '',
                genres: '',
                description: '',
                artist_id: '',
                photo: null
            };
            this.photoPreview = null;

            // Redirect to the new band's page
            window.location.href = `/bands/${result.slug}`;
        } catch (error) {
            console.error('Error:', error);
            // Handle error (show message to user)
        }
    }
});
