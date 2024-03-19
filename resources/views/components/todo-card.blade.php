@props(['user'])


<div
    class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">User Todos: {{ $user->name }} </h5>

    <ul role="list" class="space-y-5 my-7">

        @forelse ($user->todosAssigned as $todo)
            @if ($todo->is_complete)
                <li class="flex line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">
                        {{ $todo->title }}
                    </span>
                </li>
            @else
                <li class="flex ">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 ms-3">
                        {{ $todo->title }}
                    </span>
                </li>
            @endif
        @empty
            <span> has no assigned todos</span>
        @endforelse





    </ul>
   
</div>
