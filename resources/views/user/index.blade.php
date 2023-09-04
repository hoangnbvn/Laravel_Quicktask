<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-primary-button class="mt-4 mb-4" >
                {{ __('Create New User') }}
            </x-primary-button>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-white" scope="col">#</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __('Name') }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __('Username') }}</th>
                        <th class="text-gray-900 dark:text-white" scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <th class="text-gray-900 dark:text-white text-center" scope="row">{{ $index + 1 }}</th>
                        <td class="text-gray-900 dark:text-white text-center cursor-pointer">{{ $user->fullname }}</td>
                        <td class="text-gray-900 dark:text-white text-center">{{ $user->username }}</td>
                        <td class="text-gray-900 dark:text-white text-center">
                            <x-nav-link :href="route('users.show', ['user' => $user])">
                                <x-primary-button class="mt-4">
                                    {{ __("Show user") }}
                                </x-primary-button>
                            </x-nav-link>
                            <x-primary-button class="mt-4">
                                {{ __('Edit user') }}
                            </x-primary-button>
                            <x-danger-button class="mt-4">
                                {{ __('Delete user') }}
                            </x-danger-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
