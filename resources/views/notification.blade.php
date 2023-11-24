<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="max-w-screen-xl">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <div class="bg-white rounded-lg divide-y">
                                @forelse($notifications as $notification)
                                    <div class=" bg-gray-50 p-6 flex items-center space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    @if($notification->type === 'App\Notifications\GuideCreated')
                                                        <span class="text-gray-800">A new guide </span>
                                                        <a href={{ route('guide.show', ['slug' => $notification->data['slug']]) }} class="hover:underline">
                                                            <span class="text-lg text-sky-700 font-semibold">{{ $notification->data['topic'] }}</span>
                                                        </a>
                                                    @elseif($notification->type === 'App\Notifications\NurseCreated')
                                                        <span class="text-gray-800">A new nurse application </span>
                                                        <a href={{ route('admin_nurse.index') }} class="hover:underline">
                                                            <span class="text-lg text-sky-700 font-semibold">{{ $notification->data['name'] }}</span>
                                                        </a>
                                                    @elseif($notification->type === 'App\Notifications\ContactCreated')
                                                        <span class="text-gray-800">A new message from </span>
                                                        <a href={{ route('contact.show', ['id' => $notification->data['contact_id']]) }} class="hover:underline">
                                                            <span class="text-lg text-sky-700 font-semibold">{{ $notification->data['email'] }}</span>
                                                        </a>
                                                    @endif


                                                    <small class="ml-1 text-sm text-gray-600">created at  {{ $notification->created_at->format('j M Y, g:i a') }}</small>
                                                </div>

                                                <form method="POST" action="{{ route('notification.markAsRead', $notification) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <a href="{{route('notification.markAsRead', $notification)}}"  onclick="event.preventDefault(); this.closest('form').submit();" class="hover:text-gray-400 block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" >
                                                        <span class="sr-only">Mark as read</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                            <title>Mark as read</title>
                                                        </svg>
                                                    </a>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                @empty

                                    <p class="flex items-center mt-4 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                        <span class="ml-1">You have no notifications. </span>
                                    </p>
                                @endforelse
                            </div>
                        </div>

                        @if($notifications->count())
                        <div class="border-l-2">
                            <div class="sticky top-6">
                                <div class="mb-4 font-semibold text-center">
                                    <a class="uppercase tracking-widest inline-flex items-center text-xs rounded-md border border-slate-600 px-8 py-3 font-bold text-slate-600 hover:bg-slate-500 hover:text-white focus:outline-none focus:ring active:bg-slate-500 transition ease-in-out duration-150"
                                       href="{{ route('notification.markAllRead') }}"
                                       onclick="event.preventDefault(); document.getElementById('mark-all-read-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                        </svg>
                                        <span class="ml-1">{{ __('Mark All as Read') }}</span>
                                    </a>
                                    <form id="mark-all-read-form" action="{{ route('notification.markAllRead') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
