<div>
    <x-dialog-modal wire:model.live="open" maxWidth="sm">
        <x-slot name="title">
            Update todo
        </x-slot>


        <x-slot name="content">
            <!-- title -->
            <div class="mt-4">
                <x-label for="update-title" :value="__('title')" />
                <x-input wire:model="todo.title" id="update_nombre" class="block mt-1 w-full" type="text" name="title"
                    required autofocus />
                <x-input-error for="todo.title" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-label for="update-todo_category_id" :value="__('Todo Category')" />

                <x-select id="update_todo_todo_category_id" wire:model="todo.todo_category_id" name="select-docente"
                    class="block mt-1 w-full" :items="$selectTodoCategories" />

                <x-input-error for="todo.todo_category_id" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="update-todo" :value="__('Assigned to')" />

                <x-select id="update_todo_assigned_to" wire:model="todo.assigned_to" name="select-assigned_to"
                    class="block mt-1 w-full" :items="$selectUsers" />

                <x-input-error for="todo.assigned_to" class="mt-2" />
            </div>


        </x-slot>


        <x-slot name="footer">
            <x-secondary-button wire:click="close">
                {{ __('Cancel') }}
            </x-secondary-button>
            <button wire:click="update()"
                class="flex items-center justify-center mx-4 px-4 py-2 font-medium text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300  rounded-full text-sm  text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
                <svg class="w-6 h-6  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
                </svg>
                Update todo
            </button>


        </x-slot>
    </x-dialog-modal>
</div>
