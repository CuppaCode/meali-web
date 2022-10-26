<form method="POST" action="{{ route('create.listing') }}">
    @csrf

    <!-- title -->
    <div>
        <x-input-label for="title" :value="__('Title')" />

        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />

        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- description -->
    <div>
        <x-input-label for="description" :value="__('Description')" />

        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        
        <x-primary-button class="ml-4">
            {{ __('Add listing') }}
        </x-primary-button>
    </div>
</form>