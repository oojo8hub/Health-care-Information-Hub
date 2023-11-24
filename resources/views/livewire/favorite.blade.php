<span>
    @auth
    <span wire:click="toggleFavorite" class="hover:cursor-pointer">
        @if($saved)
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="rg">
                <path d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z" fill="#000"></path>
            </svg>
        @else
            <svg width="25" height="25" viewBox="0 0 25 25" fill="fill" class="mb">
                <path d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z" fill="#808080"></path>
            </svg>
        @endif
    </span>

    @else
        <a
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', '{{$myguide->topic}}')"
        >
            <svg width="25" height="25" viewBox="0 0 25 25" fill="fill" class="mb">
                <path d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z" fill="#808080"></path>
            </svg>
        </a>
        <x-modal name='{{$myguide->topic}}' focusable>
            <div class="p-6 mt-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ __('Create an account to bookmark this guide.') }}
                </h2>

                <p class="mt-4 text-gray-600">
                    {{ __('Save guides to your personalized bookmarks and access them anytime, anywhere.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <a href="{{ route('register') }}">
                        <x-primary-button class="ml-3">
                            {{ __('Create Account') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
        </x-modal>
    @endauth
</span>
