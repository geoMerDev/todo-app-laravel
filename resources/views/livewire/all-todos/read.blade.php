<div>

    <div class="todo overflow-x-auto">

        <div class=" p-5 flex justify-between gap-4">

            <div class="w-full">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="search" wire:keydown.enter="searchInDb"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search  Users" required>


                    <button type="submit" wire:click="searchInDb"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        </div>


        @if ($users->count())


            <div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 pt-4 px-5">
                    @foreach ($users as $user)
                        <x-todo-card :user="$user" />
                    @endforeach


                </div>
            </div>



            @if ($users->hasPages())
                <div class="m-5">
                    {{ $users->links() }}
                </div>
            @endif
        @else
        <div class="flex items-center justify-center w-full  h-64">
            <div>
                @if(!empty($search))
                <h2 class="text-center">No se encontraron registros que coincidan con "{{ $search }}"</h2>
            @else
                <h2 class="text-center">Aun no existen registros para mostrar</h2>
            @endif
            </div>
        </div>
        @endif
    </div>


</div>
