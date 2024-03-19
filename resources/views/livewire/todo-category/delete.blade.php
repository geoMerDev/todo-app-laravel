<div>
    <x-dialog-modal wire:model.live="open" maxWidth="sm">
        <x-slot name="title">
            Delete Todo Category
        </x-slot>


        <x-slot name="content">

            <p>Are you sure you want to delete this todo category?</p>
            <p>Delete todo category: <strong>{{ $todoCategory->name }}</strong></p>





        </x-slot>


        <x-slot name="footer">
            <x-secondary-button wire:click="close">
                {{ __('Cancel') }}
            </x-secondary-button>
            <button wire:click="delete()"
                class="flex items-center justify-center mx-4 px-4 py-2 font-medium text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300  rounded-full text-sm  text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"">
                <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                </svg>
                Delete Todo Category
            </button>


        </x-slot>
    </x-dialog-modal>
</div>
