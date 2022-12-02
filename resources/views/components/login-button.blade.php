<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-center items-center px-4 py-2 bg-orange-400 hover:bg-orange-500 border border-transparent rounded-md font-semibold text-lg text-white uppercase tracking-widest hover:bg-orange-600 active:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
