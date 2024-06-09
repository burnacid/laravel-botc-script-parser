<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blood on the Clocktower Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <form class="max-w">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" value="{{$q}}" name="q" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

            {{ $roles->withQueryString()->links() }}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ability
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Team
                            </th>
                            <th scope="col" class="px-6 py-3">
                                First<br/>Night
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Other<br />Nights
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    @foreach($roles as $role)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-1 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{asset('storage/roles/'.$role->image)}}" class="h-16" />
                            </th>
                            <td class="px-6 py-4">
                                {{$role->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$role->ability}}
                            </td>
                            <td class="px-6 py-4">
                                {{$role->team}}
                            </td>
                            <td class="px-6 py-4">
                                @if($role->firstNight)
                                    <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($role->otherNight)
                                    <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br />
                                <a href="{{route('settings.botcroles.delete',$role)}}" data-method="delete" onclick="return confirm('Are you sure you like to delete {{$role->name}}?')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{ $roles->withQueryString()->links() }}
        </div>
    </div>
</x-front-layout>
