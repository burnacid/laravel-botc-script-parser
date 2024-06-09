@props(['active'])

@php
$classes = ($active ?? false)
            ? 'items-center px-4 py-2 mt-2 text-sm font-semibold text-left bg-indigo-600 rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-100 focus:text-gray-100 hover:bg-gray-950 focus:bg-indigo-600 focus:outline-none focus:shadow-outline'
            : 'items-center px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-100 focus:text-gray-100 hover:bg-gray-950 focus:bg-indigo-600 focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
