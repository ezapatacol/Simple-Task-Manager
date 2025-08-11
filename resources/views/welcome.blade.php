<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Simple Task Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @auth
                        <h3 class="text-lg font-medium mb-4">
                            Hello 👋
                        </h3>
                    @else
                        <h3 class="text-lg font-medium mb-4">
                            Welcome to Task Manager 👋
                        </h3>
                    @endauth
                    
                    <p class="mb-4">
                        This is a <strong>Simple Task Manager</strong> — a lightweight Laravel app where you can manage tasks in a simple, clean interface.
                        It's perfect for organizing your daily activities.
                    </p>

                    <div class="border-t border-gray-200 dark:border-gray-700 my-6"></div>

                    <h4 class="text-md font-medium mb-3">What you can do here:</h4>
                    <ul class="list-disc list-inside mb-4 space-y-2">
                        <li>Create new tasks</li>
                        <li>View your task list</li>
                        <li>Mark tasks as completed</li>
                    </ul>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                        Start managing your tasks today with our simple and intuitive interface.
                    </p>

                    @auth
                        <a href="{{ route('tasks.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-700 focus:bg-green-700 dark:focus:bg-green-700 active:bg-green-900 dark:active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <span class="mr-2">➕</span> Add New Task
                        </a>
                    @else
                        <div class="space-x-4">
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-700 focus:bg-blue-700 dark:focus:bg-blue-700 active:bg-blue-900 dark:active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Login
                            </a>
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-700 focus:bg-green-700 dark:focus:bg-green-700 active:bg-green-900 dark:active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>