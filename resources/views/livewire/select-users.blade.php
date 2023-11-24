<section class="space-y-6">
     <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Users') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
          Give the users the current {{$entityName}} or revoke the current {{$entityName}} from the users.
        </p>
    </header>

    <div>
        <x-select-search :data="$users" wire:model="values" placeholder="Select users" multiple/>
    </div>


    <div class="flex items-center gap-4">
        <x-primary-button wire:click="syncUsers">{{ __('Save') }}</x-primary-button>


    @if (session()->has('superadmin'))
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-red-700"
            >{{ session('superadmin') }}</p>
        @elseif(session()->has('message'))
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2500)"
                class="text-sm text-green-700"
            >{{ __('Saved.') }}</p>
        @endif

    </div>
</section>
