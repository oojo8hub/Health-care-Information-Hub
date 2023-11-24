<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span class=text-gray-500>Search results for:</span>  {{$query}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="text-base  text-gray-500 h-full p-4 transition sm:p-6">
                    <span class="text-gray-900 font-semibold">{{$guides->count()}}</span> results
                </div>
                <div class="grid gap-5 lg:grid-cols-1 sm:max-w-sm sm:mx-auto lg:max-w-full">
                    @forelse ($guides as $guide)
                        <article class="bg-white border-t-2 border-slate-100 h-full p-4 transition sm:p-6 transition duration-900">
                            <span class="tracking-wider rounded-full border border-slate-500 px-3 py-1.5 text-[10px] font-medium text-base">
                                {{ $guide->category->name }}
                            </span>

                            <h3 class="mt-4 text-lg font-bold sm:text-xl">
                                <a href={{ route('guide.show', ['slug' => $guide->slug]) }} class="hover:underline"> {{$guide->topic}} </a>
                            </h3>

                            <p class="mt-2 text-sm font-semibold leading-relaxed text-gray-700 line-clamp-2">
                                {{strip_tags($guide->content)}}
                            </p>



                            <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                <div class="flex items-center gap-1 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-xs font-medium">{{Str::wordCount($guide->content)}} words</p>
                                </div>
                                <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                                <p class="mt-2 text-xs font-medium text-gray-700 sm:mt-0">
                                    Written by  <span class="underline">{{ $guide->user->name }}</span>
                                </p>

                                @livewire('favorite', ['myguide' => $guide])

                            </div>
                        </article>
                    @empty
                        <article class="text-gray-500 bg-white border-t-2 border-slate-100 h-full p-4 transition sm:p-6">
                            <p>Make sure all words are spelled correctly.</p>
                            <p>Try different keywords.</p>
                            <p>Try more general keywords.</p>
                        </article>

                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
