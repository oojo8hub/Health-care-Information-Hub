<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurse Application Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Nurse Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Fill in your registration information.") }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('nurse.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <!-- Register Number-->
                            <div>
                                <x-input-label for="registration_number" :value="__('Register Number')"/>
                                <x-text-input id="registration_number" class="block mt-1 w-full" type="text" name="registration_number" :value="old('registration_number')" required autofocus/>
                                <x-input-error :messages="$errors->get('registration_number')" class="mt-2"/>
                            </div>

                            <!-- Province -->
                            <div class="mt-4">
                                <x-input-label for="province" :value="__('Province')"/>
                                <select name="province" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option selected value="" disabled>--Choose a province--</option>
                                    @foreach(App\Enums\Province::values() as $key=>$value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('province')" class="mt-2"/>
                            </div>


                            <!-- Registration Class -->
                            <div class="mt-4">
                                <x-input-label for="registration_class_id" :value="__('Registration Class')"/>
                                <select name="registration_class_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option selected value="" disabled>--Choose a registeration class--</option>
                                    @foreach($registerClasses as $registerClass)
                                        <option value="{{ $registerClass->id }}">{{ $registerClass->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('registration_class')" class="mt-2"/>
                            </div>

                            <!-- Effective From -->
                            <div class="mt-4">
                                <x-input-label for="effective_from" :value="__('Effective From')"/>
                                <input type="date" id="effective_from" name="effective_from" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <x-input-error :messages="$errors->get('effective_from')" class="mt-2"/>
                            </div>

                            <!-- Expiration Date -->
                            <div class="mt-4">
                                <x-input-label for="expiration_date" :value="__('Expiration Date')"/>
                                <input type="date" id="expiration_date" name="expiration_date" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <x-input-error :messages="$errors->get('expiration_date')" class="mt-2"/>
                            </div>

                            <a  class="mt-6 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                                href="{{ url()->previous() }}">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button class="ml-3">
                                {{ __('Send') }}
                            </x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

