<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="max-w-screen-xl">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <div class="flex items-center mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>
                                <p class="ml-1 tracking-wide text-xl font-medium text-gray-900">My Favorites</p>
                            </div>

                            <span class="text-slate-800 mb-10 text-sm font-medium">{{$count}} guides</span>


                            <div class="max-w-full">
                                @forelse ($favoriteGuides as $favoriteGuide)
                                    <article class="bg-white h-full py-2 sm:py-4 transition transition duration-900">
                                        <h3 class="font-semibold sm:text-xl">
                                            <a href={{ route('guide.show', ['slug' => $favoriteGuide->slug]) }} class="hover:underline"> {{$favoriteGuide->topic}} </a>
                                        </h3>

                                        <p class="mt-2 text-sm font-semibold leading-relaxed text-gray-700 line-clamp-2">
                                            {{strip_tags($favoriteGuide->content)}}
                                        </p>

                                        <div class="mt-2 sm:flex sm:flex-wrap sm:items-center sm:gap-2">
                                            <div class="flex items-center gap-1 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p class="text-xs font-medium">{{Str::wordCount($favoriteGuide->content)}} words</p>
                                            </div>
                                            <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                                            <p class="mt-2 text-xs font-medium text-gray-700 sm:mt-0">
                                                Written by  <span class="underline">{{ $favoriteGuide->user->name }}</span>
                                            </p>
                                            <a href={{ route('category.show', ['id' => $favoriteGuide->category->id]) }}>
                                                <span class="ml-1 bg-gray-50 px-1 tracking-wider rounded-full border border-slate-300 text-xs font-medium text-gray-600 sm:mt-10">
                                                    {{ $favoriteGuide->category->name }}
                                                </span>
                                            </a>
                                            @livewire('favorite', ['myguide' => $favoriteGuide])

                                        </div>
                                    </article>
                                @empty

                                @endforelse
                            </div>
                        </div>

                        <div class="border-l-2">
                            <div class="sticky top-6">
                                <div class="mb-4 font-semibold text-center">
                                    <div class="text-2xl tracking-wide mb-4">{{$user->name}}</div>
                                    <div>
                                        <a href="{{ route('profile.edit') }}" class="hover:underline hover:text-sky-600 text-sky-700">
                                            Edit profile
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <div class="flex flex-wrap justify-center space-x-2">
                                        @foreach ($user->getRoleNames() as $roleName)
                                            <span class="text-gray-800 text-sm rounded-full truncate bg-gray-100 px-2 py-0.5 my-0.5 flex flex-row items-center">{{ucwords($roleName)}}</span>
                                        @endforeach
                                        @foreach ($user->getAllPermissions()->pluck('name')->unique() as $permissionName)
                                            <span class="text-gray-800 text-sm rounded-full truncate bg-sky-100 px-2 py-0.5 my-0.5 flex flex-row items-center">{{ucwords($permissionName)}}</span>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
</x-app-layout>
