<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $listing->title }}
        </h2> 
        
    </x-slot>

    <!-- Main content -->
    <div class="max-w-7xl container mx-auto items-center mt-6 py-4">

        <div class="w-full">

                @if ( count( $listing->recipes ) > 0 ) 

                    @foreach ($listing->recipes as $recipe)

                        <div class="relative bg-white rounded-2xl h-14 my-4 shadow-xl">

                            <div class="text-white flex items-center absolute rounded-full py-2 px-3 shadow-xl bg-orange-400 -left-3 top-3">
                                @foreach ($recipe->reviews as $review)

                                <span class="text-xs">{{ $review->rating }}</span>

                                @endforeach
                            </div>

                            <div class="flex flex-row justify-between py-4 pl-8">

                                <a href="#" class="z-8">

                                    <p class="font-medium text-lg -mt-[1px]">{{ $recipe->title }}</p>

                                </a>
                                
                                <div class="pr-4 flex gap-2 flex-row">
                                    

                                    @foreach ($recipe->restaurants as $restaurant)

                                    <span class="font-light"><x-heroicons::outline.map-pin class="inline-block -mt-2 w-5 h-5"/> {{ $restaurant->name }}</span>

                                    @endforeach

                                            
                                </div>
                                
                            </div>
                        </div>

                    @endforeach
                @endif
                    
        </div>

        <div id="add-Listings" class="fixed w-full -bottom-80 left-0 right-0 px-3 transition-all duration-300" :class="aListings ? '-translate-y-0' : '-translate-y-72'">

            <div class="w-full bg-white rounded-t-2xl h-96 py-10 shadow-xl flex flex-col justify-center items-center drop-shadow-xl transition-all">

                <button class="text-white flex object-top top-0 items-center absolute rounded-full py-6 px-6 shadow-xl bg-orange-400 -mt-8" @click="aListings = !aListings"
                :aria-expanded="aListings" aria-controls="aListings" aria-label="Add Listing">
                    <x-heroicons::outline.plus x-show="aListings" class="cursor-pointer w-5 h-5"/>
                    <x-heroicons::outline.x-mark x-show="!aListings" class="cursor-pointer w-5 h-5"/> 
                </button>

                <x-modal-create entity='recipe' listing_id='{{ $listing->id }}' />

            </div>

        </div>

    </div>

    <div class="absolute top-2/4 -left-7">
        <a href="{{ route('listings'); }}">
            <div class="text-white flex items-center absolute rounded-full pl-10 py-6 pr-2 shadow-xl bg-orange-400 -left-3 top-3">
                <x-heroicons::outline.chevron-left class="cursor-pointer w-5 h-5"/>
            </div>
        </a>
    </div>

</x-app-layout>