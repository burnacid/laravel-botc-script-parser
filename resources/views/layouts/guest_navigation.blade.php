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

            @auth()
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Script Parser') }}
            </x-nav-link>
            @endauth

            <x-nav-link :href="route('jinxes')" :active="request()->routeIs('jinxes')">
                {{ __('Jinx Lookup') }}
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
                        <x-dropdown-link :href="route('settings.botcjinx')" :active="request()->routeIs('settings.botcjinx')">
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
