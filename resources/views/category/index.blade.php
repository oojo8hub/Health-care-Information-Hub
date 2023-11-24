<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid gap-5 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                    @foreach($categories as $category)
                        <a class="bg-gray-50 mb-4 hover:shadow-xl relative flex items-start justify-between rounded-lg hover:-translate-x-1 hover:-translate-y-1 p-4 shadow-md sm:p-6 lg:p-8"
                           href={{ route('category.show', ['id' => $category->id]) }}>
                            <div class="pt-4 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                                </svg>
                                <h3 class="mt-4 text-lg font-bold text-sky-900 sm:text-xl">
                                    {{$category->name}}
                                </h3>
                                <p class="mt-2 hidden text-sm sm:block line-clamp-2">
                                    {{$category->description}}
                                </p>
                            </div>
                            <span class="rounded-full bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-blue-400">
                                {{$category->guides_count}}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
