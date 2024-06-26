<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__("Add")}} jinx
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('settings.botcjinx.add') }}" enctype="multipart/form-data" class="w-full">

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
                    <x-input-label for="role_id" :value="__('Jinx From')" />
                    <x-select-input id="role_id" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(old('role_id') == $role->id) selected @endif>{{$role->name}}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="jinx_with" :value="__('Jinx On')" />
                    <x-select-input id="jinx_with" name="jinx_with">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(old('jinx_with') == $role->id) selected @endif >{{$role->name}}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error :messages="$errors->get('jinx_with')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="id" :value="__('Jinx')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" value="{{ old('jinx') }}" name="jinx" autofocus />
                    <x-input-error :messages="$errors->get('jinx')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-primary-button>{{__("Add")}}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-front-layout>
