<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurse Application Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session()->has('nurse-updated'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('nurse-updated') }}</span>
                    </div>
                </div>
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Nurse Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your application information.") }}
                            </p>
                        </header>
                        <form method="POST" action="{{ route('nurse.update', $nurse) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="registration_number" :value="__('Register Number')"/>
                                <x-text-input id="registration_number" class="block mt-1 w-full" type="text"
                                              name="registration_number"
                                              :value="old('registration_number', $nurse->registration_number)" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('registration_number')" class="mt-2"/>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="province" :value="__('Province')"/>
                                <select name="province" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option selected value="" disabled>--Choose a province--</option>
                                    @foreach(App\Enums\Province::values() as $key=>$value)
                                        <option
                                            {{ old('province', $nurse->province->value) == $value ? 'selected' : '' }}
                                            value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('province')" class="mt-2"/>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="registration_class_id" :value="__('Registration Class')"/>
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
                            </div>

                            <div class="mt-4">
                                <x-input-label for="effective_from" :value="__('Effective From')"/>
                                <input type="date" id="effective_from" name="effective_from" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                       value="{{old('effective_from', optional($nurse->effective_from)->format('Y-m-d'))}}">
                                <x-input-error :messages="$errors->get('effective_from')" class="mt-2"/>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="expiration_date" :value="__('Expiration Date')"/>
                                <input type="date" id="expiration_date" name="expiration_date" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                       value="{{old('expiration_date', optional($nurse->expiration_date)->format('Y-m-d'))}}">
                                <x-input-error :messages="$errors->get('expiration_date')" class="mt-2"/>
                            </div>

{{--                            <div class="flex items-center gap-4">--}}
                                <a  class="mt-6 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                    href="{{ route('profile.edit') }}#nurse-section">
                                    {{ __('Cancel') }}
                                </a>
                                <x-primary-button class="ml-3">
                                    {{ __('Save') }}
                                </x-primary-button>
{{--                                @if (session('status') === 'nurse-updated')--}}
{{--                                    <p--}}
{{--                                        x-data="{ show: true }"--}}
{{--                                        x-show="show"--}}
{{--                                        x-transition--}}
{{--                                        x-init="setTimeout(() => show = false, 2000)"--}}
{{--                                        class="text-sm text-green-700"--}}
{{--                                    >{{ __('Saved.') }}</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <a href="{{ route('profile.edit') }}#nurse-section" class="underline font-medium text-gray-700 hover:text-gray-500">--}}
{{--                                    <span>Go Back</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
