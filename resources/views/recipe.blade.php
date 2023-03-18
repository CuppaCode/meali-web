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
                    {{ $recipe->description }}
                </div>
                
                @if ($recipe->image)

                    <div class="mt-12 grid grid-cols-1 gap-4">
                        <div><img class="object-contain rounded-xl md:block" src="{{ asset($recipe->image->url) }}"></div>
                    </div>

                @endif
                
                <div class="created-at text-sm pt-4">
                    This recipe has been added on {{ $recipe->created_at; }}
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