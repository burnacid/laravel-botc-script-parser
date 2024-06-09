{{--<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('home') }}">--}}
{{--                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">--}}
{{--                        {{ __('Script Parser') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}

{{--                @auth--}}
{{--                    <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
{{--                        <x-dropdown align="right" width="48">--}}
{{--                            <x-slot name="trigger">--}}
{{--                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                    <div>{{__('Settings')}}</div>--}}

{{--                                    <div class="ms-1">--}}
{{--                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                        </svg>--}}
{{--                                    </div>--}}
{{--                                </button>--}}
{{--                            </x-slot>--}}

{{--                            <x-slot name="content">--}}
{{--                                <x-dropdown-link :href="route('profile.edit')">--}}
{{--                                    {{ __('BotC Roles') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                                <x-dropdown-link :href="route('profile.edit')">--}}
{{--                                    {{ __('BotC Jinxes') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            </x-slot>--}}
{{--                        </x-dropdown>--}}
{{--                    </div>--}}
{{--                @endauth--}}
{{--            </div>--}}

{{--            @auth--}}
{{--                <!-- Settings Dropdown -->--}}
{{--                <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
{{--                    <x-dropdown align="right" width="48">--}}
{{--                        <x-slot name="trigger">--}}
{{--                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                <div>{{ Auth::user()->name }}</div>--}}

{{--                                <div class="ms-1">--}}
{{--                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </button>--}}
{{--                        </x-slot>--}}

{{--                        <x-slot name="content">--}}
{{--                            <x-dropdown-link :href="route('profile.edit')">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </x-dropdown-link>--}}

{{--                            <!-- Authentication -->--}}
{{--                            <form method="POST" action="{{ route('logout') }}">--}}
{{--                                @csrf--}}

{{--                                <x-dropdown-link :href="route('logout')"--}}
{{--                                                 onclick="event.preventDefault();--}}
{{--                                                    this.closest('form').submit();">--}}
{{--                                    {{ __('Log Out') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            </form>--}}
{{--                        </x-slot>--}}
{{--                    </x-dropdown>--}}
{{--                </div>--}}


{{--                <!-- Hamburger -->--}}
{{--                <div class="-me-2 flex items-center sm:hidden">--}}
{{--                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">--}}
{{--                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @endauth--}}

{{--            @guest--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">--}}
{{--                        {{ __('Login') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            @endguest--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">--}}
{{--                {{ __('Script Parser') }}--}}
{{--            </x-responsive-nav-link>--}}

{{--            <x-responsive-dropdown>--}}
{{--                <x-slot name="trigger">--}}
{{--                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">--}}
{{--                        <div>{{ __("Settings") }}</div>--}}

{{--                        <div class="ms-1">--}}
{{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </button>--}}
{{--                </x-slot>--}}

{{--                <x-slot name="content">--}}
{{--                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #1</a>--}}
{{--                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #2</a>--}}
{{--                    <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Link #3</a>--}}
{{--                </x-slot>--}}
{{--            </x-responsive-dropdown>--}}
{{--        </div>--}}

{{--        @auth--}}
{{--            <!-- Responsive Settings Options -->--}}
{{--            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">--}}
{{--                <div class="px-4">--}}
{{--                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>--}}
{{--                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--                </div>--}}

{{--                <div class="mt-3 space-y-1">--}}
{{--                    <x-responsive-nav-link :href="route('profile.edit')">--}}
{{--                        {{ __('Profile') }}--}}
{{--                    </x-responsive-nav-link>--}}

{{--                    <!-- Authentication -->--}}
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}

{{--                        <x-responsive-nav-link :href="route('logout')"--}}
{{--                                               onclick="event.preventDefault();--}}
{{--                                            this.closest('form').submit();">--}}
{{--                            {{ __('Log Out') }}--}}
{{--                        </x-responsive-nav-link>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endauth--}}

{{--        @guest--}}

{{--        @endguest--}}
{{--    </div>--}}
{{--</nav>--}}


<div class="text-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 w-full dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">

            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">

            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Script Parser') }}
            </x-nav-link>

            @auth

                <x-dropdown align="right" width="48" :active="request()->routeIs('settings.botcroles')">
                    <x-slot name="trigger">
                        {{__('Settings')}}
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('settings.botcroles')" :active="request()->routeIs('settings.botcroles')">
                            {{ __('BotC Roles') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('BotC Jinxes') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

            <x-dropdown align="right" width="48"  :active="request()->routeIs('profile.*')">
                <x-slot name="trigger">
                    {{ Auth::user()->name }}
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" :active="request()->routeIs('logout')">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            @endauth

            @guest
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
            @endguest
        </nav>
    </div>
</div>
