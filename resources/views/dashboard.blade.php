<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welkom: <span class="font-bold">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <a href="dashboard/listings">
            <div class="relative bg-orange-400 active:bg-orange-300 py-6 px-6 rounded-3xl h-48 my-4 shadow-xl">
                <div class="text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-white left-4 -top-6">
                    <x-heroicons::outline.list-bullet class="text-black w-5 h-5"/>
                </div>
                <div class="py-12 text-center">
                    <p class="text-xl text-white font-semibold my-2">Listings</p>
                    
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
