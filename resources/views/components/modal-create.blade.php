@props([
  'entity' => null,
  'listing_id' => null
])


{{-- <x-create-listing-form entity={{ $entity }}/> --}}
<form class="w-full max-w-sm" x-show="!aListings" method="POST" action="{{ route('create.'.$entity) }}">
    @csrf

    @if ($listing_id)
    
    <input type="hidden" name="listing_id" value="{{ $listing_id }}">
    
    @endif


    <!-- title -->
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                <x-input-label for="title" :value="__('Title')" />
            </label>
        </div>
        <div class="md:w-2/3">
            <x-text-input id="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="title" :value="old('title')" required autofocus />
        </div> 

        

        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- description -->
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                <x-input-label for="description" :value="__('Description')" />
            </label>
        </div>
        <div class="md:w-2/3">
            <x-text-input id="description" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="description" :value="old('description')" required autofocus />
        </div>        

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        
        <x-primary-button class="ml-4">
            {{ __('Add listing') }}
        </x-primary-button>
    </div>
</form>
                    