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
                        <div class="block w-full font-bold text-lg">{{ $recipe->title }}</div>

                        @foreach ($recipe->restaurants as $restaurant)

                            <div class="font-light -mt-[2px]">{{ $restaurant->name }}</div>

                        @endforeach
                    </div>
                    <div class="flex gap-2 flex-row">
                        <a href="{{ route('recipe.edit', ['id' => $recipe->id ]) }}" class="z-8">

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
                                <a href="{{ route('delete.recipe', ['id' => $recipe->id ])}}">
                                    <div class="-mb-1 inline-flex w-full px-4 py-2 text-sm rounded-b-md border border-transparent bg-red-600 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Yes, I'm sure</div>
                                </a>
                            </x-slot>
                        </x-dropdown>
                                
                    </div>
                    
                </div>
                <div class="w-full mt-4">
                    <form class="w-full"  method="POST" action="{{ route('update.recipe', ['id' => $recipe->id ]) }}">
                        @csrf
                    
                        @if ($recipe->id)
                        
                        <input type="hidden" name="listing_id" value="{{ $recipe->listing_id }}">
                        
                        @endif
                    
                        <!-- title -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-full">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="title" :value="__('Title')" />
                                </label>
                            </div>
                            <div class="md:w-full">
                                <x-text-input id="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500" type="text" name="title" value="{{ $recipe->title }}" required autofocus />
                            </div> 
                    
                            
                    
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- restaurant -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="name" :value="__('Restaurant')" />
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <x-text-input id="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500" type="text" name="name" value="{{ $recipe->restaurants->first()->name }}" required autofocus />
                            </div>        

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <!-- rating -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="rating" :value="__('Rating')" />
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <x-text-input id="rating" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500" type="number" name="rating" min="0" max="10" step="0.1" value="{{ $recipe->review->rating }}" required autofocus />

                            </div>        

                            <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                        </div>
                    
                        <!-- description -->
                        <div class="md:flex md:items-center mb-2">
                            <div class="md:w-full">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    <x-input-label for="description" :value="__('Description')" />
                                </label>
                            </div>
                            <div class="md:w-full">
                                <x-textarea-input id="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange-500" type="textarea" name="description" content="{{ $recipe->description }}" autofocus />
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
        <a href="{{ route('listing', $recipe->listing_id) }}">
            <div class="text-white flex items-center absolute rounded-full pl-10 py-6 pr-2 shadow-xl bg-orange-400 -left-3 top-3">
                <x-heroicons::outline.chevron-left class="cursor-pointer w-5 h-5"/>
            </div>
        </a>
    </div>

</x-app-layout>