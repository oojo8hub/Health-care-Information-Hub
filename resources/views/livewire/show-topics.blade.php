<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('A-Z Topics') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <nav class="mb-10">
                <ul class="inline-flex flex-wrap">
                    <li class="mb-4">
                        <span wire:click="setFilter('')"
                              class="hover:cursor-pointer px-3 py-2 text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-800">
                            All
                        </span>
                    </li>
                    @foreach($letters as $letter)
                        <li class="mb-4">
                            <span wire:click="setFilter('{{ $letter }}')"
                                  class="{{$filter === $letter ? 'bg-slate-200' : 'hover:cursor-pointer'}}  px-3 py-2 text-gray-500 bg-white border border-gray-300">
                                {{$letter}}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="max-w-2xl">
                    @forelse($guides as $guide)
                        <a wire:key="item-{{ $guide->id }}" href={{ route('guide.show', ['slug' => $guide->slug]) }}>
                            <p class="mb-6 font-semibold text-xl text-sky-700 hover:underline">
                                {{ucfirst($guide->topic)}}
                            </p>
                        </a>
                    @empty
                        @if($filter)
                            <p>Currently, no topics are under '{{$filter}}'</p>
                        @else
                            <p>Currently, no topics.</p>
                        @endif
                    @endforelse
            </div>
        </div>
    </div>
</div>


