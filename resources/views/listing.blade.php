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
                                                    <x-primary-button class="mt-4 ml-4 bg-red-500">
                                                        {{ __('Remove') }}
                                                    </x-primary-button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-primary-button class="mt-4 bg-green-600">
                {{ __('Add Listing') }}
            </x-primary-button>
        </div>
    </div>
</x-app-layout>
