<div>  

    <button wire:click="$toggle('open')"
        class="flex items-center justify-center px-5 py-2 font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300  rounded-full text-sm  text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
        </svg>
        Add Todo
    </button>

    <x-dialog-modal wire:model.live="open" maxWidth="sm">
        <x-slot name="title">
            Create todo
        </x-slot>
 
 
        <x-slot name="content">
            <!-- title -->
            <div class="mt-4">
                <x-label for="create-title" :value="__('title')" />
                <x-input wire:model="todo.title" id="create_nombre" class="block mt-1 w-full" type="text"
                    name="title" required autofocus />
                <x-input-error for="todo.title" class="mt-2" />
            </div>
         
            
            <div class="mt-4">
                <x-label for="create-todo_category_id" :value="__('Todo Category')" />

                <x-select id="create_todo" wire:model="todo.todo_category_id" name="select-docente"
                    class="block mt-1 w-full" :items="$selectTodoCategories" />

                <x-input-error for="todo.todo_category_id" class="mt-2" />
            </div>
 
            <div class="mt-4">
                <x-label for="create-todo" :value="__('Assigned to')" />

                <x-select id="create_todo" wire:model="todo.assigned_to" name="select-assigned_to"
                    class="block mt-1 w-full" :items="$selectUsers" />

                <x-input-error for="todo.assigned_to" class="mt-2" />
            </div>
 
 
        </x-slot>
 
 
        <x-slot name="footer">
            <x-secondary-button wire:click="close">
                {{ __('Cancel') }}
            </x-secondary-button>
            <button wire:click="store()"
                class="flex items-center justify-center mx-4 px-4 py-2 font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300  rounded-full text-sm  text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>
                Create todo
            </button>
 
 
        </x-slot>
    </x-dialog-modal>
</div>
