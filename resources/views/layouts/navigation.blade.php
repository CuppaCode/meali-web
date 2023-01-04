<nav id="mobile-navigation" class="fixed top-0 left-0 bottom-0 right-0 backdrop-blur-sm z-10"
    :class="openMenu ? 'visible' : 'invisible' " x-cloak>
        <div class="absolute top-0 left-0 bottom-0 w-9/12 py-4 bg-orange-500 text-white drop-shadow-2xl z-10 transition-all"
        :class="openMenu ? '-translate-x-0' : '-translate-x-full'">
        <div class="mx-auto p-4">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <li class="border-b border-inherit">
            <a href="#" class="block p-4" aria-current="true">Home</a>
        </li>
        <li class="border-b border-inherit">
            <a href="#" class="block p-4">Dashboard</a>
        </li>
        <li class="border-b border-inherit">
            <a href="#" class="block p-4">Listings</a>
        </li>
        <li class="border-b border-inherit">
            <a href="#" class="block p-4">Contact</a>
        </li>

    </div>

        <!-- Close Button -->
        <button class="absolute top-0 right-0 bottom-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
        aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 right-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        </button>

  </nav>
    {{-- <nav x-data="{ open: false }" class="relative flex flex-col py-4 items-center">
        
    </nav> --}}


