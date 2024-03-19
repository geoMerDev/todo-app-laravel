<div>
    @livewire('todo.update')
    @livewire('todo.delete')
    <div class="todo overflow-x-auto">

        <div class=" p-5 flex justify-between gap-4">
            @livewire('todo.create')
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
                        placeholder="Search  Todos" required>


                    <button type="submit" wire:click="searchInDb"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </div>
        </div>


        @if ($myTodos->count())




            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Is Complete
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Create By
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Update
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remove
                        </th>
                    </tr>
                </thead>
                @php
                    $cont = 1;
                    //dd($myTodos);
                @endphp
                <tbody>
                    @foreach ($myTodos as $myTodo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $cont++ }}
                            </th>
                            <td class="px-6 py-4">

                                <div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" @checked($myTodo->is_complete)
                                            id="todo-toggle-{{ $myTodo->id }}" class="sr-only peer"
                                            wire:click="todoToggle({{ $myTodo->id }})">
                                        <div
                                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                        </div>

                                    </label>
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                @if ($myTodo->is_complete)
                                    <span class="line-through">{{ $myTodo->title }}</span>
                                @else
                                    {{ $myTodo->title }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $myTodo->category ? $myTodo->category->name : 'Uncategorized' }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $myTodo->createdBy ? $myTodo->createdBy->name : 'Unknown' }}

                            </td>
                            <td class="px-6 py-4">
                                <button type="button" title="editar"
                                    wire:click="$dispatch('todo-edit', { todoEdit: {{ $myTodo }} })"
                                    class="focus:outline-none p-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <svg class="w-6 h-6  dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
                                    </svg>

                                </button>
                            </td>

                            <td class="px-6 py-4">
                                <button type="button" title="eliminar"
                                    wire:click="$dispatch('todo-delete', { todoDelete: {{ $myTodo }} })"
                                    class="focus:outline-none p-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>


            @if ($myTodos->hasPages())
                <div class="m-5">
                    {{ $myTodos->links() }}
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
