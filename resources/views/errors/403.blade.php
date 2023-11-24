<x-page-layout>
    <x-slot:title>
        Web NP 403 Error
        </x-slot>
    <div class="flex items-center h-screen justify-center p-5 w-full bg-white">
        <div class="text-center">
            <div class="inline-flex rounded-full bg-sky-100 p-4">
                <div class="rounded-full stroke-sky-600 bg-sky-200 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
            </div>
            <h1 class="mt-5 text-[36px] font-bold text-slate-800 lg:text-[50px]">Error 403: Access Denied</h1>
            <p class="text-slate-600 mt-5 lg:text-lg mb-10">Sorry, you do not have permission to this page or resource.</p>
            <a onclick="window.history.back();">
                <x-primary-button>Go back</x-primary-button>
            </a>

        </div>

    </div>
</x-page-layout>
