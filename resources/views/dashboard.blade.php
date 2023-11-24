<x-app-layout>
    <div class="py-12 bg-white shadow h-full scroll-smooth">
        <div class="bg-sky-50 mx-auto px-4 py-16 text-center lg:py-32 border-b-1">
            <h1 class="text-sky-900 text-4xl font-bold text-gray-900 sm:text-6xl">WebNP</h1>
            <h2 class="mt-4 text-gray-700">Evidence-informed guidelines and tools for Canadian Nurse Practitioners</h2>
            <p class="mx-auto mt-4 max-w-lg text-sm leading-relaxed text-gray-500">
               WebNP is where to go for reliable and up-to-date information in clinical practice.
                We do our best to find content that is relevant to Canadian care providers.
            </p>
            <a href={{ route('category.index')}}>
                <x-primary-button class="ml-3 rounded-full mt-11">
                    {{ __('Check out our guide') }}
                </x-primary-button>
            </a>
        </div>


        <!--popular guides-->

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                <section class="mt-8 max-w-screen-xl">
                    <div class="flex items-center">
                        <span class="rounded-full border-2 border-green-700">
                            <svg color="darkgreen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                        </svg>
                        </span>


                        <p class="font-semibold text-gray-900 ml-1">Trending on WebNP</p>
                    </div>

                    <div class="mt-2 grid grid-cols-3 gap-4">
                        @forelse ($trendingGuides as $trendingGuide)
                            <article class="flex bg-white transition">
                                <div>
                                    <span class="tracking-wide text-gray-300 text-2xl font-extrabold">{{0 . $loop->iteration}}</span>
                                </div>

                                <div>
                                    <div class="mt-1 ml-4 flex flex-1 flex-col justify-between space-y-3">
                                        <span class="text-sm font-extralight">{{$trendingGuide->category->name}}</span>
                                        <a href={{ route('guide.show', ['slug' => $trendingGuide->slug]) }}>
                                            <h3 class="text tracking-wide font-bold uppercase text-gray-900 line-clamp-2 hover:underline">
                                                {{$trendingGuide->topic}}
                                            </h3>
                                        </a>
                                        <span class="text-xs text-gray-400">{{$trendingGuide->updated_at->format('M j, Y')}}</span>
                                    </div>
                                </div>


                            </article>
                        @empty

                        @endforelse

                    </div>
                </section>
            </div>
        </div>

        <!--recent guides-->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-t-2">
            <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                <section class="mt-8 max-w-screen-xl">
                    <div class="mt-2 grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <svg color="darkblue"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                                <p class="font-semibold text-gray-900 ml-1">Recent Guides</p>
                            </div>
                            <div class="max-w-full">
                                @forelse ($recentGuides as $recentGuide)
                                    <article class="bg-white h-full py-2 sm:py-4 transition transition duration-900">
                                        <h3 class="text-lg font-bold sm:text-xl">
                                            <a href={{ route('guide.show', ['slug' => $recentGuide->slug]) }} class="hover:underline"> {{$recentGuide->topic}} </a>
                                        </h3>

                                        <p class="mt-2 text-sm font-semibold leading-relaxed text-gray-700 line-clamp-2">
                                            {{strip_tags($recentGuide->content)}}
                                        </p>

                                        <div class="mt-2 sm:flex sm:flex-wrap sm:items-center sm:gap-2">
                                            <div class="flex items-center gap-1 text-gray-500">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p class="text-xs font-medium">{{Str::wordCount($recentGuide->content)}} words</p>
                                            </div>
                                            <span class="hidden sm:block" aria-hidden="true">&middot;</span>
                                            <p class="mt-2 text-xs font-medium text-gray-700 sm:mt-0">
                                                Written by  <span class="underline">{{ $recentGuide->user->name }}</span>
                                            </p>
                                            <a href={{ route('category.show', ['id' => $recentGuide->category->id]) }}>
                                                <span class="ml-1 bg-gray-50 px-1 tracking-wider rounded-full border border-slate-300 text-xs font-medium text-gray-600 sm:mt-10">
                                                    {{ $recentGuide->category->name }}
                                                </span>
                                            </a>
                                            @livewire('favorite', ['myguide' => $recentGuide])

                                        </div>
                                    </article>
                                @empty

                                @endforelse
                            </div>
                        </div>

                        <div>
                            <div class="sticky top-6">
                                <h2 class="mb-4 font-semibold">Discover more topics</h2>
                                <div class="flex flex-wrap">
                                    @foreach($randomGuides as $randomGuide)
                                        <a href={{ route('guide.show', ['slug' => $recentGuide->slug]) }}>
                                            <div class="tracking-wide mb-2 text-gray-500 text-sm font-medium mr-2 px-2.5 py-0.5 rounded-lg border border-gray-300">
                                                {{$randomGuide->topic}}
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>



        <div class="mx-auto border-t-2 max-h-full mt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 sm:rounded-lg">
                    <footer class="max-w-screen-xl">
                        <a href="#">
                            <span class="tracking-wide text-lg inline-flex gap-1.5  font-bold text-sky-900">WebNP</span>
                        </a>
                        <nav aria-label="Footer Nav" class="mt-8 flex justify-between">
                            <ul class="flex flex-wrap  gap-6 md:gap-8 lg:gap-12">
                                <li><a class="text-gray-700 transition hover:text-slate-700/75" href={{ route('A-Z-guide.index') }}>Guides</a></li>

                                <li><a class="text-gray-700 transition hover:text-slate-700/75" href={{ route('category.index')}}>Categories</a></li>

                                <li><a class="text-gray-700 transition hover:text-slate-700/75" href={{ route('about')}}>About</a></li>

                                <li><a class="text-gray-700 transition hover:text-slate-700/75" href={{ route('contact.create')}}>Contact</a></li>
                            </ul>

                            <ul class="flex gap-6">
                                <li>
                                    <a
                                        href="https://www.instagram.com/webnpdevteam/"
                                        rel="noreferrer"
                                        target="_blank"
                                        class="text-gray-700 transition hover:text-gray-700/75"
                                    >
                                        <span class="sr-only">Instagram</span>
                                        <svg
                                            class="h-6 w-6"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.linkedin.com/in/webnp-d-b44406271/"
                                        rel="noreferrer"
                                        target="_blank"
                                        class="text-gray-700 transition hover:text-gray-700/75"
                                    >
                                        <span class="sr-only">LinkedIn</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-6 w-6" viewBox="0 0 24 24">
                                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="mt-8 leading-relaxed text-xs text-gray-500">
                            Disclaimer: This is the personal blog of Dr Gail Macartney, RN(NP), PhD, CON(C). The resources found on these pages are intended to inform NP students and care providers. Healthcare professionals should also consider other sources of up to date information, their own clinical judgment and the preferences of their patients in their decisions.
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
