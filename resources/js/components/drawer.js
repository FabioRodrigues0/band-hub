// Drawer Alpine Component
const drawer = () => ({
    isOpen: false,
    entityType: null,
    mode: 'create',
    title: '',
    formData: {},
    formContent: '',
    isSubmitting: false,
    form: {},
    photoPreview: null,
    
    init() {
        this.$watch('entityType', value => {
            if (value) {
                this.title = this.mode === 'create' ? `Create ${value}` : `Edit ${value}`;
            }
        });

        // Listen for open drawer events
        window.addEventListener('open-entity-drawer', (event) => {
            const { type, mode = 'create', id = null, data = {} } = event.detail;
            this.open(type, mode, id, data);
        });
    },

    async open(type, mode = 'create', id = null, data = {}) {
        // Set data first
        this.entityType = type;
        this.mode = mode;
        this.formData = { ...data };
        if (id) this.formData.id = id;

        // Initialize form data
        this.form = {
            name: data.name || '',
            description: data.description || '',
            genres: data.genres || '',
            bands: data.bands || [],
            bio: data.bio || '',
        };

        // Set photo preview if image exists
        if (data.image) {
            if (data.image.includes('artistsImages') || data.image.includes('bandsImages')) {
                this.photoPreview = `/storage/${data.image}`;
            } else {
                this.photoPreview = data.image;
            }
        } else {
            this.photoPreview = null;
        }

        // Load form content
        try {
            const response = await fetch(`/forms/${type}/${mode}${id ? `/${id}` : ''}`);
            if (!response.ok) {
                const errorData = await response.text();
                throw new Error(errorData || 'Failed to load form');
            }
            this.formContent = await response.text();
        } catch (error) {
            console.error('Error loading form:', error);
            this.formContent = `<div class="text-red-500 p-4">Error loading form: ${error.message}</div>`;
        }

        // Then open drawer with a small delay to ensure smooth transition
        setTimeout(() => {
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
        }, 50);
    },

    handleFileInput(event) {
        const file = event.target.files[0];
        if (!file) return;

        this.photoPreview = URL.createObjectURL(file);
    },

    close() {
        this.isOpen = false;
        document.body.style.overflow = '';

        // Reset data after transition
        setTimeout(() => {
            this.entityType = null;
            this.formData = {};
            this.formContent = '';
            this.isSubmitting = false;
            this.photoPreview = null;
        }, 300);
    },

    getEndpoint() {
        const type = this.entityType.toLowerCase();
        if (this.mode === 'create') {
            return `/${type}s`; // e.g., /artists, /bands
        } else {
            return `/${type}s/${this.formData.id}`; // e.g., /artists/1, /bands/1
        }
    },

    async submit() {
        if (this.isSubmitting) return;

        this.isSubmitting = true;
        const form = this.$refs.form;
        const formData = new FormData(form);

        try {
            // Get the correct endpoint
            const endpoint = this.getEndpoint();
            
            // Add method override for PUT if needed
            if (this.mode === 'edit') {
                formData.append('_method', 'PUT');
            }

            // Make the request
            const response = await fetch(endpoint, {
                method: 'POST', // Always POST, Laravel will handle method override
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Failed to submit form');
            }

            const data = await response.json();
            
            // Close drawer first
            this.close();

            // Then redirect to the details page
            if (data.redirect) {
                window.location.href = data.redirect;
            }

        } catch (error) {
            console.error('Error submitting form:', error);
            // You might want to show an error message to the user here
        } finally {
            this.isSubmitting = false;
        }
    }
});

export { drawer };
