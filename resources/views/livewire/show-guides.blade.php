<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Guides Management') }}
    </h2>
</x-slot>



<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Guides') }}
                </h2>
            </header>
            <div class="flex items-center justify-between pb-4 mt-4">
                <div class="pb-4 bg-white">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="text" id="table-search" wire:model="search" class="inline-block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for guides">
                    </div>
                </div>

                @can('create guides')
                <a href={{ route('guide.create') }}>
                    <x-primary-button class="inline-flex items-center bg-slate-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-500 active:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Add Guide') }}
                    </x-primary-button>
                </a>
                @endcan
            </div>

            @if (session()->has('guide-deleted'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex p-2 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">{{ session('guide-deleted') }}</span>
                    </div>
                </div>
            @endif

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>Topic</span>
                                    <a wire:click="sortBy('topic')">
                                           <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'topic')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                               @elseif ($sortDirection === 'desc' && $sortColumn === 'topic')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @else
                                                   <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>Author</span>
                                    <a wire:click="sortBy('users.name')">
                                           <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                               @elseif ($sortDirection === 'desc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @else
                                                   <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>category</span>
                                    <a wire:click="sortBy('categories.name')">
                                           <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                               @elseif ($sortDirection === 'desc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @else
                                                   <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>published</span>
                                    <a wire:click="sortBy('published')">
                                           <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                               @elseif ($sortDirection === 'desc' && $sortColumn === 'category.name')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @else
                                                   <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>created</span>
                                    <a wire:click="sortBy('created_at')">
                                            <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'created_at')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                                @elseif ($sortDirection === 'desc' && $sortColumn === 'created_at')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                                @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex space-x-1 items-center">
                                    <span>last updated</span>
                                    <a wire:click="sortBy('updated_at')">
                                           <span>
                                                @if ($sortDirection === 'asc' && $sortColumn === 'updated_at')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                               @elseif ($sortDirection === 'desc' && $sortColumn === 'updated_at')
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @else
                                                   <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="opacity-0 hover:opacity-100 transition-opacity duration-300 w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" /></svg>
                                               @endif
                                             </span>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>

                    </thead>
                    <tbody>
                    <tr class="font-light text-xs">
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
{{--                            <x-text-input wire:model="category" placeholder="Category" class="text-xs font-medium block mt-1 w-full" type="text" required autofocus/>--}}
                            <select wire:model="category" class="text-xs font-medium block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option selected value="">--Select--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
                            <select wire:model="published" class="text-xs font-medium block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option selected value="">--Select--</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
{{--                            <x-text-input placeholder="Created" class="text-xs font-light block mt-1 w-full" type="text" required autofocus/>--}}
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
{{--                            <x-text-input placeholder="Last Updated" class="text-xs font-light block mt-1 w-full" type="text" required autofocus/>--}}
                        </th>
                        <th scope="col" class="px-2 pb-2 bg-slate-100">
                        </th>
                    </tr>
                    @foreach ($guides as $guide)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-semibold">
                                {{ucwords($guide->topic)}}
                            </td>
                            <td class="px-6 py-4">
                                {{$guide->user->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$guide->category->name}}
                            </td>
                            <td class="px-6 py-4">
                                @if($guide->published)
                                    <span class="inline-flex items-center px-2 py-0.1 rounded text-xs leading-4 text-emerald-800 bg-emerald-100 border border-emerald-100">
                                        Yes
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.1 rounded text-xs leading-4 text-amber-800 bg-amber-100 border border-amber-100">
                                        No
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{$guide->created_at->format('M d, Y')}}
                            </td>
                            <td class="px-6 py-4">
                                {{$guide->updated_at->format('M d, Y')}}
                            </td>
                            <td class="flex px-6 py-4 space-x-4">
                                <a href={{ route('guide.show', ['slug' => $guide->slug]) }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <title>View</title>
                                    </svg>
                                </a>

                                <a href={{ route('guide.edit', ['slug' => $guide->slug]) }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        <title>Edit</title>
                                    </svg>
                                </a>


                                @can('delete guides')
                                    @if($confirmingId === $guide->id)
                                        <span wire:click="cancelDelete('{{ $guide->id }}')" class="hover:cursor-pointer">
                                            <svg color="darkred" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                <title>Cancel</title>
                                            </svg>
                                        </span>

                                        <span wire:click="deleteGuide('{{ $guide->id }}')" class="hover:cursor-pointer">
                                          <svg color="darkgreen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                              <title>Confirm</title>
                                          </svg>
                                        </span>

                                    @else
                                        <span wire:click="doSomething('{{ $guide->id }}')" class="hover:cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                <title>Delete</title>
                                            </svg>
                                        </span>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $guides->links() }}

        </div>
    </div>
</div>



