<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('New Category') }}
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('admin_category.store') }}" class="mt-4 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('Category')"/>
                                <x-text-input name="name" id="name" class="block mt-1 w-full" type="text" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>

                            </div>
                            <div class="space-y-2">
                                <x-input-label for="active" :value="__('Active')"/>
                                <div class="flex flex-wrap">
                                    <div class="flex items-center mr-4">
                                        <input name="active" type="radio"
                                              checked value="1"
                                               class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                        <label class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input name="active" type="radio"
                                               value="0"
                                               class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                        <label class="ml-2 text-sm font-medium text-gray-900">No</label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <a class="mt-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                   href={{ route('admin_category.index') }}>
                                    {{ __('Cancel') }}
                                </a>
                                <x-primary-button class="ml-3">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>


