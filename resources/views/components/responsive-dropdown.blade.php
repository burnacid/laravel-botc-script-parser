@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-700'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

{{--<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">--}}
{{--    <div @click="open = ! open">--}}
{{--        {{ $trigger }}--}}
{{--    </div>--}}

{{--    <div x-show="open"--}}
{{--         x-transition:enter="transition ease-out duration-200"--}}
{{--         x-transition:enter-start="opacity-0 scale-95"--}}
{{--         x-transition:enter-end="opacity-100 scale-100"--}}
{{--         x-transition:leave="transition ease-in duration-75"--}}
{{--         x-transition:leave-start="opacity-100 scale-100"--}}
{{--         x-transition:leave-end="opacity-0 scale-95"--}}
{{--         class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"--}}
{{--         style="display: none;"--}}
{{--         @click="open = false">--}}
{{--        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">--}}
{{--            {{ $content }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<div @click.away="open = false" class="relative {{ $alignmentClasses }}" x-data="{ open: false }">
    <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-950 focus:bg-gray-950 focus:outline-none focus:shadow-outline">
        <span>{{ $trigger }}</span>
        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
            {{ $content }}
        </div>
    </div>
</div>
