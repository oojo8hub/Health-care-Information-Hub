<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">About</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-l">
                <h2 class="text-xl font-bold tracking-wide">Our Goal</h2>
                <p class="mt-4 text-gray-600 leading-relaxed">This website was curated due to the inefficiency and lack of a proper structured information retrieval system for nurse practitioners. This concern was brought to my attention by an NP student named Jodi, who stated, "It is complicated knowing where to go for reliable information in clinical practise." Having been a student of the medical educational system myself, I can relate to this ongoing dilemma. Our goal for this website is to create a community of like-minded individuals who seek evidence-informed guidelines in the hopes of accessing them quickly while providing swift and accurate care to patients.</p>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-7xl">
                <h2 class="text-xl font-bold tracking-wide mb-4">Some of our Features</h2>
                <ul class="grid gap-10 lg:grid-cols-2 sm:grid-cols-2">
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">Canadian Content</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">We do our best to find content that is relevant to Canadian care providers.</p>
                    </li>
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">Evidence Informed</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">We take our time to ensure that resources are reliable and credible.</p>
                    </li>
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">Up To Date</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">We strive to keep this a living site with regular updates.</p>
                    </li>
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">One Click Away</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">Simplicity is key. We offer easy links to reliable information and reference material.</p>
                    </li>
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">A Community of NP Practise</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">With your input, we can tailor this site into a valuable repository for nurse practitioners.</p>
                    </li>
                    <li>
                        <h3 class="flex items-center font-bold text-sky-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>
                            <span class="ml-1 tracking-wide text-lg">Easy-To-Use Interface</span>
                        </h3>
                        <p class="mt-2 ml-1 text-sm text-gray-600 leading-relaxed">Adapt to your desktop, tablet, or phone.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-l">
                <figure class="md:flex bg-slate-100 rounded-xl p-8">
                    <img class="w-24 h-24 rounded-full mx-auto" src="{{asset('images/gail.jpg')}}" alt="" width="384" height="512">
                    <div class="pt-6 md:p-8 md:text-left text-center space-y-4">
                        <blockquote>
                            <p class="font-medium text-gray-600 leading-relaxed">
                                Dr Gail Macartney is a Nurse Practitioner with an extensive nursing background in clinical practice, education and research with expertise in pediatric, adolescent and adult patient populations in the community, ambulatory care and inpatient settings. Gail is a Certified Oncology Nurse with expertise in pediatric and adult oncology. Her clinically-based interdisciplinary research program is focused on understanding and optimizing the symptom experience of concussed youth and adults.
                            </p>
                        </blockquote>
                        <figcaption>
                            <a href="https://www.islandscholar.ca/people/gmacartney">
                                <div class="text-sky-700 hover:underline font-semibold ">
                                Gail Macartney
                                </div>
                            </a>

                            <div class="text-slate-700 text-sm leading-relaxed">
                                RN(NP), PhD, Assistant Professor, UPEI Faculty of Nursing
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </div>
        </div>

    </div>
</x-app-layout>
