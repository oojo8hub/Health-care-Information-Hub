<section id="nurse-section" class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('To Be Verified As Nurse?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is verified, you can write guides and share your invaluable experience.') }}
        </p>
    </header>


    <div>
        @if (!$user->nurse)
            <a href={{ route('nurse.create') }}>
                <x-primary-button class="bg-sky-800 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900">{{ __('Verify My Account') }}</x-primary-button>
            </a>
        @elseif (!$user->nurse->verified_at)
            <p class="mb-4 text-lg text-sky-700">
                {{ __('Your account will be verified soon...') }}
            </p>
            <a href={{ route('nurse.edit', ['id' => $user->nurse->id]) }}>
                <x-primary-button class="bg-sky-800 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900">
                    {{ __('Edit Application Form') }}
                </x-primary-button>
            </a>
        @elseif ($user->nurse->verified)
            <p class="mb-4 text-lg text-green-700">
                {{ __('You are a verified nurse!') }}
            </p>
        @else
            <p class="mb-4 text-lg text-red-700">
                Verification failed.
            </p>
        @endif


    </div>

</section>
