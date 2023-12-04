<button {{ $attributes->merge(['class' => 'w-full h-16 outline-none focus:outline-none hover:bg-indigo-700 hover:bg-opacity-20 text-white text-xl font-light']) }}>
    {{ $slot }}
</button>
