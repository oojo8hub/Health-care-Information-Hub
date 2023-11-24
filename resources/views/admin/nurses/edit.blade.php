<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin/nurses"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-700">
                            Nurses
                        </a>
                    </li>

                    <li ria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <a class="ml-1 text-sm font-medium text-gray-500 ">Edit Nurse</a>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                {{$nurse->user->name}}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Nurse Information') }}
                            </h2>
                        </header>
                        <dl>
                            <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                    {{ucwords($nurse->user->name)}}
                                </dd>
                            </div>
                        </dl>

                        <form method="POST" action="{{ route('admin_nurse.update',['id'=> $nurse->id ]) }}"
                              class="mt-4 space-y-6">
                            @csrf
                            @method('patch')

                            <dl>
                                <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="mt-2 text-sm font-medium text-gray-500">Register Number</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <x-text-input id="registration_number" class="block w-full" type="text"
                                                      name="registration_number"
                                                      :value="old('registration_number', $nurse->registration_number)" required autofocus/>
                                        <x-input-error :messages="$errors->get('registration_number')" class="mt-2"/>
                                    </dd>
                                </div>
                            </dl>

                            <dl>
                                <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">Province</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <select name="province" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option selected value="" disabled>--Choose a province--</option>
                                            @foreach(App\Enums\Province::values() as $key=>$value)
                                                <option
                                                    {{ old('province', $nurse->province->value) == $value ? 'selected' : '' }}
                                                    value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('province')" class="mt-2"/>
                                    </dd>
                                </div>
                            </dl>

                            <dl>
                                <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="mt-3 text-sm font-medium text-gray-500">Registration class</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <select name="registration_class_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option selected value="" disabled>--Choose a registration class--</option>
                                            @foreach($registerClasses as $registerClass)
                                                <option
                                                    {{ old('registration_class_id', $nurse->registrationClass->id) == $registerClass->id ? 'selected' : '' }}
                                                    value="{{ $registerClass->id }}">
                                                    {{ $registerClass->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('registration_class_id')" class="mt-2"/>
                                    </dd>
                                </div>
                            </dl>

                            <dl>
                                <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="mt-2 text-sm font-medium text-gray-500">Initial Date on the Province Register</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <input type="date" id="effective_from" name="effective_from" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                               value="{{old('effective_from', optional($nurse->effective_from)->format('Y-m-d'))}}">
                                        <x-input-error :messages="$errors->get('effective_from')" class="mt-2"/>
                                    </dd>
                                </div>
                            </dl>

                            <dl>
                                <div class="content-center bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="mt-2 text-sm font-medium text-gray-500">Expiration Date on the Province Register</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <input type="date" id="expiration_date" name="expiration_date" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                               value="{{old('expiration_date', optional($nurse->expiration_date)->format('Y-m-d'))}}">
                                        <x-input-error :messages="$errors->get('expiration_date')" class="mt-2"/>
                                    </dd>
                                </div>
                            </dl>

                            <dl>
                                <div class="bg-white pr-2 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:pr-6">
                                    <dt class="text-sm font-medium text-gray-800">Verify this user as a nurse?</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center mr-4">
                                                <input name="verified" type="radio"
                                                       {{ $nurse->verified == 1 ? 'checked' : '' }}
                                                       value="1"
                                                       class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                                <label class="ml-2 text-sm font-medium text-gray-900">Yes</label>
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input name="verified" type="radio"
                                                       {{ $nurse->verified != 1 ? 'checked' : '' }}
                                                       value="0"
                                                       class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2">
                                                <label class="ml-2 text-sm font-medium text-gray-900">No</label>
                                            </div>
                                        </div>
                                    </dd>
                                </div>
                            </dl>

                            <div>
                                <a class="mt-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                   href={{ route('admin_nurse.index') }}>
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
