<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blood on the Clocktower Night Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{route("nightorder")}}">
                        @csrf
                        <div class="grid grid-cols-4">
                        @foreach($roles as $role)
                            <div>
                                {{--                                    <img class="role-icon h-24 align-middle inline-block" src="{{ asset('storage/roles/'.$role->image) }}" >--}}
                                <input name="roles[]" id="{{$role->id}}" value="{{$role->id}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                <label for="{{$role->id}}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$role->name}}</label>
                            </div>
                        @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
<?php
