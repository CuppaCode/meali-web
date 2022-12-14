@props([
  'entity' => null,
  'parent_id' => null,
  'id' => null
])

<div class="relative z-10" @keydown.window.escape="open = false" x-show="open" aria-labelledby="modal-title" x-ref="dialog" role="dialog" aria-modal="true" x-show="open" style=display:none;>


  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200 "
    x-transition:leave-start="opacity-100 "
    x-transition:leave-end="opacity-0 scale-100"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
      x-show="open"
      x-transition:enter="ease-out duration-300" 
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
      x-transition:leave="ease-in duration-200" 
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
      x-description="Modal panel, show/hide based on modal state." 
      @click.away="open = false"
      >
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="sm:flex sm:items-start">
                        {{-- <x-create-listing-form entity={{ $entity }}/> --}}
                        <form class="w-full max-w-sm" method="POST" action="{{ route('update.'.$entity, ['id' => $id ]) }}">
                          @csrf

                          @if ($parent_id)
                            
                            <input type="hidden" name="parent_id" value="{{ $parent_id }}">
                            
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
