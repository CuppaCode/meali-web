@props(['href'])

<div class="relative z-10" @keydown.window.escape="open = false" x-show="open" aria-labelledby="modal-title" x-ref="dialog" role="dialog" aria-modal="true" x-show="open">


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
                        <x-create-listing-form/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
