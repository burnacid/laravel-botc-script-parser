<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__("Edit")}} jinx for {{ $jinx->role->name }} and {{$jinx->withRole->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('settings.botcjinx.edit',[$jinx->role,$jinx->withRole]) }}" enctype="multipart/form-data" class="w-full">

                @if (session('success'))
                    <x-alert-success>
                        {{ session('success') }}
                    </x-alert-success>
                @endif

                @if (session('failure'))
                    <x-alert-error>
                        {{ session('failure') }}
                    </x-alert-error>
                @endif

                @csrf
                <div class="mb-5">
                    <x-input-label for="id" :value="__('Jinx')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" name="jinx" :value="old('jinx',$jinx->jinx)" autofocus />
                    <x-input-error :messages="$errors->get('jinx')" class="mt-2" />
                </div>

                <div class="flex items-center mb-4">
                    <input id="history" type="checkbox" name="history" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked>
                    <label for="history" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__("Move current jinx to History")}}</label>
                </div>

                <div class="mb-5">
                    <x-primary-button>{{__("Update")}}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-front-layout>
