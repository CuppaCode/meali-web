<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Listings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Listings

                    @if ( count( $listings ) > 0 ) 
                    
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            User
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Description
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Public
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listings as $listing)
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->index + 1 }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $listing->user->name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $listing->title }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4">
                                                    {{ $listing->description }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $listing->public ? 'Yes' : 'No' }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4">
                                                    

                                                    <div x-data="{show:false}">
                                                        <x-primary-button class="ml-4 bg-red-500" @click="show=!show">
                                                            {{ __('Remove') }}
                                                        </x-primary-button>
                                                        
                                                        <template x-if="show">
                                                            <x-modal-warning href="{{ route('delete.listing', ['id' => $listing->id ])}}"/>
                                                        </template>
                                                    </div>
                                                    
                                                    {{-- <x-modal-warning/> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    
                    <div class="flex items-center pt-5">
                        Create new listing

                        <div x-data="{show:false}" class="ml-3">
                            <button type="button" @click="show=!show" class="text-white bg-orange-400 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Icon description</span>
                            </button>

                            <template x-if="show">
                                <x-modal-create/>
                            </template>
                        </div>
                    </div>
                
                </div>
            </div>
            
        </div>

    </div>
</x-app-layout>
