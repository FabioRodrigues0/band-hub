@props(['mode' => 'create'])

<div 
    x-data="drawer"
    x-cloak
    class="fixed inset-0 z-50 overflow-hidden"
    role="dialog"
    aria-modal="true"
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <!-- Backdrop -->
    <div 
        class="fixed inset-0 bg-black bg-opacity-75"
        x-show="isOpen"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="close"
    ></div>

    <!-- Drawer -->
    <div 
        class="fixed inset-y-0 right-0 w-full max-w-md transform"
        x-show="isOpen"
        x-transition:enter="transform transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
    >
        <div class="h-full bg-zinc-900 shadow-xl flex flex-col">
            <!-- Using the existing header component -->
            <x-drawer.header />

            <!-- Content -->
            <form 
                x-ref="form"
                @submit.prevent="submit"
                class="flex-1 flex flex-col"
            >
                @csrf
                <div class="flex-1 overflow-y-auto p-6">
                    <div x-html="formContent"></div>
                </div>

                <!-- Footer with buttons -->
                <div class="p-6 bg-zinc-800">
                    <div class="flex items-center justify-between px-4 py-3 bg-zinc-900 border-t border-zinc-800">
                        <div>
                            <template x-if="mode === 'edit'">
                                <button 
                                    @click="if(confirm('Are you sure you want to delete this item?')) { window.location.href = `/${entityType}s/${formData.id}/delete` }"
                                    type="button"
                                    class="px-4 py-2 text-sm font-medium text-red-500 hover:text-red-400"
                                >
                                    Delete
                                </button>
                            </template>
                        </div>
                        <div class="flex items-center gap-2">
                            <button 
                                type="button"
                                @click="close"
                                class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-gray-300"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500"
                                :disabled="isSubmitting"
                            >
                                <span x-show="!isSubmitting">
                                    <span x-text="mode === 'create' ? 'Create' : 'Save Changes'"></span>
                                </span>
                                <span x-show="isSubmitting">
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
