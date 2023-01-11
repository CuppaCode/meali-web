<x-app-layout>

    <!-- Header -->
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listings') }}
        </h2> 
        
    </x-slot>

    <!-- Main content -->
    <div class="max-w-7xl container mx-auto items-center mt-3 py-4">

        <div class="w-full">

                @if ( count( $listings ) > 0 )

                    @foreach ($listings as $listing)

                        <div class="relative bg-white rounded-2xl h-14 my-8 shadow-xl">

                            <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-orange-400 left-4 -top-6">

                                <x-heroicons::outline.list-bullet class="text-white w-5 h-5"/>

                            </div>

                            <div class="flex flex-row justify-between py-4 pl-20">

                                <a href="{{ route('listing', ['id' => $listing->id ]) }}" class="z-8">

                                    <p class="text-black ">{{ $listing->title }}</p>

                                </a>
                                
                                <div class="pr-4 flex gap-2 flex-row">

                                    <a href="{{ route('listing.edit', ['id' => $listing->id ]) }}" class="z-8">

                                        <x-heroicons::outline.pencil @click="open = ! open" class="cursor-pointer w-5 h-5"/>

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
                        </div>

                    @endforeach
                @endif
                    
        </div>

        <div id="add-Listings" class="fixed w-full -bottom-56 left-0 right-0 px-3 transition-all duration-300" :class="aListings ? '-translate-y-0' : '-translate-y-52'">

            <div class="w-full bg-white rounded-t-2xl h-72 shadow-xl flex flex-col justify-center items-center drop-shadow-xl transition-all">

                <button class="text-white flex object-top top-0 items-center absolute rounded-full py-6 px-6 shadow-xl bg-orange-400 -mt-8" @click="aListings = !aListings"
                :aria-expanded="aListings" aria-controls="aListings" aria-label="Add Listing">
                    <x-heroicons::outline.plus x-show="aListings" class="cursor-pointer w-5 h-5"/>
                    <x-heroicons::outline.x-mark x-show="!aListings" class="cursor-pointer w-5 h-5"/> 
                </button>

                <x-modal-create entity='listing'/>

            </div>

        </div>

    </div>

</x-app-layout>
