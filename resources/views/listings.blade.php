<x-app-layout>
    <div class="max-w-7xl container mx-auto items-center mt-0 py-4">

        <div class="w-full md:w-3/4 space-x-4 ">
                    
                @if ( count( $listings ) > 0 )

                        @foreach ($listings as $listing)
                        <a href="{{ route('listing', ['id' => $listing->id ]) }}" class="mt-1">
                            <div class="relative bg-white rounded-2xl h-14 my-2 shadow-xl">
                                <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-orange-400 left-4 -top-6">
                                    <x-heroicons::outline.list-bullet class="text-white w-5 h-5"/>
                                </div>
                                <div class="flex flex-row justify-between py-4 pl-20 ">
                                    <p class="text-black ">{{ $listing->title }}</p>
                                    
                                    <div class="pr-4 flex gap-2 flex-row">
                                        <x-heroicons::outline.pencil @click="open = ! open" class="cursor-pointer w-5 h-5"/> 
                                        <x-heroicons::outline.trash @click="open = ! open" class="cursor-pointer w-5 h-5"/>     
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </tbody>
                </table>
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
