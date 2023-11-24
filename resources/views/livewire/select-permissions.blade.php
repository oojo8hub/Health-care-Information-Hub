<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            @if($entityName === App\Enums\Entity::USER)
                {{ __('Direct Permissions') }}
            @else
                {{ __('Permissions') }}
            @endif
        </h2>

        <p class="mt-1 text-sm text-gray-600">
           Assign permissions to the {{$entityName}} or remove permissions from the {{$entityName}}.
        </p>

        @if($entityName === App\Enums\Entity::USER)
            <p class="mt-1 text-sm text-gray-600">
                Note: direct permissions are <span class="font-black text-black">directly</span> assigned to or removed from the user, not via role.
            </p>
        @endif
    </header>

    <div>
        <x-select-search :data="$permissions" wire:model="values" placeholder="Select permissions" multiple/>
    </div>


    <div class="flex items-center gap-4">
        <x-primary-button wire:click="syncPermissions">{{ __('Save') }}</x-primary-button>


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
