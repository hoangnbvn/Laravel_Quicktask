<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('tasks.store', ['user' => $user]) }}" method="POST">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="task-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-label for="content" :value="__('Content')" />
                    <x-text-input id="task-content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autofocus autocomplete="content" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
