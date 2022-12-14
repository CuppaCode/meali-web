<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $listing->title }}
        </h2>
    </x-slot>

    <div class="breadcrumbs">
        <div class="text-sm pb-2 border-b border-grey">
            <a class="" href="{{ route('dashboard') }}">Dashboard </a> /
            <a class="" href="{{ route('listings') }}">Listings</a> /
                {{ $listing->title }}
            </a>
        </div>
        <div class="bto py-1"> 
            <a class="text-sm font-bold" href="{{ route('listings') }}">Back to overview</a>
        </div>
    </div>

    <div class="max-w-7xl container space-x-4 flex items-center mt-0 py-4">
        
        <div class="w-full md:w-3/4 flex flex-col">
         


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-grey dark:bg-white-800">
                        {{ $listing->title }}
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $listing->description }}</p>
                    </caption>
                        @if ( count( $listing->recipes ) > 0 ) 
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-grey-100 dark:text-gray-800">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    #
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    {{ __('Description') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($listing->recipes as $recipe)
                            <tr class="bg-white dark:bg-white-800 dark:border-gray-700">
                                <td class="py-4 px-6">
                                    
                                    {{ $loop->index + 1 }}
                                    
                                </td>
                                <td class="py-4 px-6">
                                    
                                    {{ $recipe->title }}
                                    
                                </td>
                                <td class="py-4 px-6">
                                    
                                    {{ $recipe->description }}
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            
                                    
                                                       
                <div class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-grey dark:bg-white-800" x-data="{ open: false }" class="ml-3">
                    <button type="button" @click="open = ! open" class="text-white bg-orange-400 hover:bg-orange-500 border border-transparent font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Add new recipe
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5"" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>

                        <x-modal-create entity='recipe' listing_id='{{ $listing->id }}' />
                    
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