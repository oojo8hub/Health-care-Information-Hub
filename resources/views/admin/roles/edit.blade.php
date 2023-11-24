<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin/roles" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                            Roles
                        </a>
                    </li>

                    <li ria-current="page" >
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a class="ml-1 text-sm font-medium text-gray-500 ">Edit Role</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{ucwords($role->name)}}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session()->has('role-message'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('role-message') }}</span>
                    </div>
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Role Information') }}
                            </h2>
                        </header>
                        <dl>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ucwords($role->name)}} </dd>
                            </div>
                        </dl>
                    </section>
                </div>
            </div>
            @if($role->name === 'super admin')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section class="space-y-6">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Permissions') }}
                                </h2>
                                <p class="mt-4 text-sm text-sky-800">
                                    "Super Admin" role responds true to all permissions, without needing to assign all those permissions to it.
                                </p>
                            </header>
                        </section>
                    </div>
                </div>
            @elseif($role->name === 'writer')
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <section class="space-y-6">
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 mb-4">
                                        {{ __('Permissions') }}
                                    </h2>
                                    <div class="flex flex-wrap space-x-1">
                                        @foreach ($role->permissions->pluck('name') as $roleName)
                                            <span class="text-gray-800 text-sm rounded-full truncate bg-gray-100 px-2 py-0.5 my-0.5 flex flex-row items-center">{{ucwords($roleName)}}</span>
                                        @endforeach
                                    </div>
                                </header>
                            </section>
                        </div>
                    </div>
            @else
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @livewire('select-permissions', ['role' => $role, 'entityName' => App\Enums\Entity::ROLE])
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @livewire('select-users', ['role' => $role, 'entityName' => App\Enums\Entity::ROLE])
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
