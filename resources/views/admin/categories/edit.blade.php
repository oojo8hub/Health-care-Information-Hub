<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin_category.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                       Categories
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{$admin_category->name}}
                            </span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Category') }}
                            </h2>
                        </header>

                        <form method="POST" action="{{route('admin_category.update',$admin_category->id)}}" class="mt-4 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input name="name" id="name"
                                              :value="old('name', $admin_category->name)"
                                              class="block mt-1 w-full" type="text" required autofocus/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>



                            <div class="space-y-2">
                                <x-input-label for="active" :value="__('Active')"/>
                                <div class="flex flex-wrap">
                                    <div class="flex items-center mr-4">
                                        <input name="active" type="radio"
                                               {{ $admin_category->active == 1 ? 'checked' : '' }}
                                               value="1"
                                               class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                        <label class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input name="active" type="radio"
                                               {{ $admin_category->active != 1 ? 'checked' : '' }}
                                               value="0" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
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
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </form>

                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>


