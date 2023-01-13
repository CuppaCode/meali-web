<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            
        </h2> 
        
    </x-slot>

    <!-- Main content -->
    <div class="max-w-7xl container mx-auto items-center mt-6 py-4">

        <div class="w-full">

            <div class="relative bg-white rounded-2xl h-min my-4 shadow-xl p-4">
                <div class="flex flex-row justify-between">

                    
                    <div class="-mt-[1px]">
                        <div class="block w-full font-bold text-lg">{{ $listing->title }}</div>

                        {{-- @foreach ($listing->restaurants as $restaurant)

                            <div class="font-light -mt-[2px]">{{ $restaurant->name }}</div>

                        @endforeach --}}
                    </div>
                    <div class="flex gap-2 flex-row">
                        <a href="{{ route('listing.edit', ['id' => $listing->id ]) }}" class="z-8">

                            <x-heroicons::outline.pencil class="cursor-pointer w-5 h-5"/>

                        </a>

                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">
                                <button>
                                    <div>
                                        <x-heroicons::outline.trash class="cursor-pointer w-5 h-5 z-12"/>

                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <div class="px-4 py-2">Are you sure?</div>
                                <a href="{{ route('delete.listing', ['id' => $listing->id ])}}">
                                    <div class="-mb-1 inline-flex w-full px-4 py-2 text-sm rounded-b-md border border-transparent bg-red-600 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Yes, I'm sure</div>
                                </a>
                            </x-slot>
                        </x-dropdown>
                                
                    </div>
                    
                </div>
                <div class="w-full mt-4">
                    <form class="w-full"  method="POST" action="{{ route('update.listing', ['id' => $listing->id ]) }}">
                        @csrf
                    
                        @if ($listing->id)
                        
                        <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                        
                        @endif
                    
                        <!-- title -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-full">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="title" :value="__('Title')" />
                                </label>
                            </div>
                            <div class="md:w-full">
                                <x-text-input id="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="title" value="{{ $listing->title }}" required autofocus />
                            </div> 
                    
                            
                    
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    
                        <!-- description -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-full">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="description" :value="__('Description')" />
                                </label>
                            </div>
                            <div class="md:w-full">
                                <x-textarea-input id="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="textarea" name="description" content="{{ $listing->description }}" autofocus />
                            </div>        
                    
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>                    
                    
                        <div class="flex items-center justify-end mt-4">
                            
                            <x-primary-button class="ml-4">
                                {{ __('Edit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
                    
        </div>

    </div>

    <!-- Back to listing -->
    <div class="absolute top-2/4 -left-7">
        <a href="{{ route('listing', $listing->id) }}">
            <div class="text-white flex items-center absolute rounded-full pl-10 py-6 pr-2 shadow-xl bg-orange-400 -left-3 top-3">
                <x-heroicons::outline.chevron-left class="cursor-pointer w-5 h-5"/>
            </div>
        </a>
    </div>

</x-app-layout>