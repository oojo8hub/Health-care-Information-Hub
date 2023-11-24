<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi bold text-xl text-gray-800 leading-tight">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin/permissions" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                            Permissions
                        </a>
                    </li>

                    <li ria-current="page" >
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a class="ml-1 text-sm font-medium text-gray-500 ">Edit Permission</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{ucwords($permission->name)}}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Permission Information') }}
                            </h2>
                        </header>
                        <dl>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ucwords($permission->name)}} </dd>
                            </div>
                        </dl>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @livewire('select-roles', ['permission' => $permission, 'entityName' => App\Enums\Entity::PERMISSION])
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Users') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                A list of users associated with this permission.
                            </p>
                        </header>

                        <div class="flex flex-wrap space-x-1">
                            @forelse(\App\Models\User::permission($permission->name)->pluck('name') as $permissionName)
                                <span class="text-gray-800 text-sm rounded-full truncate bg-gray-100 px-2 py-0.5 my-0.5 flex flex-row items-center">{{$permissionName}}</span>
                            @empty
                                <span class="text-sky-800">Currently, this permission has not been assigned to any user.</span>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
