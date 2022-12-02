<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl container space-x-4 mx-auto flex items-center mt-0 py-4">

        <div class="w-full md:w-3/4 flex flex-col">
                    
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                @if ( count( $listings ) > 0 ) 
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-grey dark:bg-white-800">
                        Listings
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                    </caption>

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-grey-100 dark:text-gray-800">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Public
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                        <tr class="bg-white dark:bg-white-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-gray-400">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="py-4 px-6">
                                <a href={{ route('listing', ['id' => $listing->id ]) }}>
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                <a href={{ route('listing', ['id' => $listing->id ]) }}>
                                    {{ $listing->description }}
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                {{ $listing->public ? 'Y' : 'N' }}
                            </td>
                            <td class="py-4 px-6">
                                <span x-data="{ open: false }">
                                    <x-heroicons::outline.trash @click="open = ! open" class="cursor-pointer w-5 h-5"/>
                                                                                            
                                    <x-modal-warning href="{{ route('delete.listing', ['id' => $listing->id ])}}"/>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                    
                <div class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-grey dark:bg-white-800" x-data="{ open: false }" class="ml-3">
                    
                    <button type="button" @click="open = ! open" class="text-white bg-orange-400 hover:bg-orange-500 border border-transparent font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Create listing
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5"" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                    <x-modal-create entity='listing'/>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/4 flex flex-col">

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg bg-white">

                test
                
            </div>
        </div>

    </div>
</x-app-layout>
