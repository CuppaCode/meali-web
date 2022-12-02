<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-orange-400 hover:bg-orange-500 border border-transparent font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center']) }}>
    {{ $slot }}
</button>
