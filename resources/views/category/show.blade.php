<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="/categories" class="ml-1 text-sm font-medium text-gray-700 hover:text-sky-700 md:ml-2">Categories</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ucwords($category->name)}}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-screen-xl">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-8">
                        {{$category->name}}
                    </h2>
                    <ul class="grid gap-5 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                        @forelse ($category->publishedGuides->sortBy('topic') as $guide)
                            <li>
                                <a href={{ route('guide.show', ['slug' => $guide->slug]) }}>
                                    <article class="bg-slate-100 h-full rounded-lg border border-gray-100 p-4 shadow-sm transition hover:shadow-xl sm:p-6 transition duration-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        <h3 class="mt-0.5 text-xl font-semibold text-gray-900 line-clamp-1">
                                            {{ucwords($guide->topic)}}
                                        </h3>
                                        <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-2">
                                            {{strip_tags($guide->content)}}
                                        </p>
                                        <div class="group mt-4 inline-flex items-center gap-1 text-base font-medium text-sky-600">
                                            <span>Find out more</span>
                                            <span aria-hidden="true" class="block transition group-hover:translate-x-0.5">&rarr;</span>
                                        </div>
                                    </article>
                                </a>
                            </li>
                        @empty
                            <li>Currently, no guides are under this category.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="" class="inline-flex mt-10 text-gray-600 hover:underline fixed bottom-1">
        <svg color="gray" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Back to top
    </a>
</x-app-layout>
