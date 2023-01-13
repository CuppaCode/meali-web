<nav id="mobile-navigation" class="fixed top-0 left-0 bottom-0 right-0 backdrop-blur-sm z-10"
    :class="openMenu ? 'visible' : 'invisible' " x-cloak>
        <div class="absolute top-0 left-0 bottom-0 w-7/12 py-4 bg-orange-500 text-white drop-shadow-2xl z-10 transition-all"
        :class="openMenu ? '-translate-x-0' : '-translate-x-full'">
        <div class="h-full flex justify-between flex-col px-6">
            <div class="mt-10 p-4">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="flex grow">
                <ul class="w-full">
                    <nav x-data="{ open: false }" class="relative flex flex-col px-4">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Dashboard
                        </x-nav-link>
                        <x-nav-link :href="route('listings')" :active="request()->routeIs('listing')">
                            Listings
                        </x-nav-link>   
                    </nav>
                </uL>
            </div>
            <div class="flex flex-end">
                <ul class="w-full">
                    <li class="">
                        <a href="#" class="block p-2" aria-current="true">Settings</a>
                    </li>
                    <li class="">
                        <a class="block p-2" href="{{ route('logout.perform') }}">
                            {{ __('Log Out') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

        <!-- Close Button -->
        <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
        aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 absolute top-4 left-8 z-20 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        </button>

  </nav>
    {{-- <nav x-data="{ open: false }" class="relative flex flex-col py-4 items-center">
        
    </nav> --}}


