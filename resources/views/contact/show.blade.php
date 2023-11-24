<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                        Messages
                    </a>
                </li>

                <li ria-current="page" >
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a class="ml-1 text-sm font-medium text-gray-500 ">View Message</a>
                    </div>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                            {{$contact->email}}
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Contact Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Message details.") }}
                            </p>
                        </header>
                        <dl>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$contact->email}}</dd>
                            </div>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Subject</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$contact->subject}}</dd>
                            </div>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Message</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$contact->message}}</dd>
                            </div>
                        </dl>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
