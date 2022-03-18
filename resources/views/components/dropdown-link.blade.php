<li>
    <a
        {{ $attributes->merge(['class' => 'block w-full px-4 py-1 pt-2 text-lg text-gray-600 focus:bg-blue-500 focus:text-white whitespace-nowrap hover:text-blue-500']) }}>
        {{ $slot }}
    </a>
</li>
