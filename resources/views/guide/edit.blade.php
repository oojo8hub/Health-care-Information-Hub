<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('guide.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                    Guides
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{$guide->topic}}
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
                                {{ __('Edit Guide') }}
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('guide.update', $guide->slug) }}" class="mt-4 space-y-6">
                            @csrf
                            @method('patch')

                            <input name="previousUrl" type="hidden" value="{{ url()->previous() }}">
                            <div>
                                <x-input-label for="topic" :value="__('Topic')"/>
                                <x-text-input name="topic" id="topic"
                                              :value="old('topic', $guide->topic)"
                                              class="block mt-1 w-full" type="text" required autofocus/>
                                <x-input-error :messages="$errors->get('topic')" class="mt-2"/>
                            </div>

                            <div>
                                <div class="mt-4">
                                    <x-input-label for="category_id" :value="__('Category')"/>
                                    <select name="category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        <option selected value="" disabled>--Choose a category--</option>
                                        @foreach($categories as $category)
                                            <option
                                                {{ old('category_id', $guide->category->id) == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                                </div>
                            </div>

                            <div>
                                <x-input-label for="content" :value="__('Content')"/>
                                <textarea id="myeditorinstance" name="content" rows="20" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    {{$guide->content}}
                                </textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                            </div>


                            @can('publish guides')
                                <div class="space-y-2">
                                    <x-input-label for="published" :value="__('Published')"/>
                                    <div class="flex flex-wrap">
                                        <div class="flex items-center mr-4">
                                            <input name="published" type="radio"
                                                   {{ $guide->published == 1 ? 'checked' : '' }}
                                                   value="1" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                            <label class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input name="published" type="radio"
                                                   {{ $guide->published != 1 ? 'checked' : '' }}
                                                   value="0" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                            <label class="ml-2 text-sm font-medium text-gray-900">No</label>
                                        </div>
                                    </div>
                                </div>
                            @endcan


                            <div>
                                <a  class="mt-6 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                    href="{{ url()->previous() }}">
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


