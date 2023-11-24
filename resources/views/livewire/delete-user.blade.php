<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete User') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once the user is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete User') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete the user?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Are you sure you want to delete <span class="font-black text-gray-800">{{$user->name}}</span>? This action cannot be undone.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button wire:click="deleteUser" class="ml-3">
                    {{ __('Delete User') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</section>
