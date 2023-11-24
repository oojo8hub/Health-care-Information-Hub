<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Guides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session()->has('guide-message'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('guide-message') }}</span>
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="max-w-screen-xl">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <div class="bg-white rounded-lg divide-y">
                                @foreach ($guides as $guide)
                                    <div class="p-6 flex space-x-2">
                                        @if($guide->published)
                                            <svg xmlns="http://www.w3.org/2000/svg" color="darkgreen" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        @endif

                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <span class="text-gray-800">{{ $guide->user->name }}</span>
                                                    <small class="ml-2 text-sm text-gray-600">{{ $guide->created_at->format('j M Y, g:i a') }}</small>
                                                    @unless ($guide->created_at->eq($guide->updated_at))
                                                        <small class="text-sm text-slate-600"> &middot; {{ __('edited') }}</small>
                                                    @endunless
                                                </div>
                                                @if ($guide->user->is(auth()->user()))
                                                    <x-dropdown>
                                                        <x-slot name="trigger">
                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                </svg>
                                                            </button>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <x-dropdown-link :href="route('guide.edit', $guide)">
                                                                {{ __('Edit') }}
                                                            </x-dropdown-link>
                                                            <form method="POST" action="{{ route('me.guide.destroy', $guide) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <x-dropdown-link :href="route('me.guide.destroy', $guide)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    {{ __('Delete') }}
                                                                </x-dropdown-link>
                                                            </form>
                                                        </x-slot>
                                                    </x-dropdown>
                                                @endif
                                            </div>
                                            <a href={{ route('guide.show', ['slug' => $guide->slug]) }} class="hover:underline">
                                                <p class="mt-4 text-lg text-gray-900">{{ $guide->topic }}</p>
                                            </a>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="border-l-2">
                            <div class="sticky top-6">
                                <div class="mb-4 font-semibold text-center">
                                    <a href="{{route('guide.create')}}" class="uppercase tracking-widest inline-flex items-center text-xs rounded-md border border-green-600 px-12 py-3 font-bold text-green-600 hover:bg-green-600 hover:text-white focus:outline-none focus:ring active:bg-green-500 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <span class="ml-1">
                                            Write a guide
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</x-app-layout>
