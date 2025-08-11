<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hello, {{ Auth::user()->name }} - Your Tasks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>

                        <ul class="list-group">
                            @forelse($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $task->title }}
                                    <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'warning' }}">
                                        {{ $task->status }}
                                    </span>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('tasks.toggle-status', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-4 py-2 rounded {{ $task->status === 'completed' ? 'bg-green-500' : 'bg-yellow-500' }} text-white">
                                            {{ $task->status === 'completed' ? 'Completed' : 'Pending' }}
                                        </button>
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item text-muted">No tasks found</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>