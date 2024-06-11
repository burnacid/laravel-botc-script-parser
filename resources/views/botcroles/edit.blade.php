<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__("Edit")}} {{ $botcRole->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('settings.botcroles.edit',$botcRole) }}" enctype="multipart/form-data" class="w-full max-w-lg">
                @csrf
                <div class="mb-5">
                    <x-input-label for="id" :value="__('Role ID')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id',$botcRole->id)" required autofocus />
                    <x-input-error :messages="$errors->get('id')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="id" :value="__('Role Name')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" name="name" :value="old('name',$botcRole->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="id" :value="__('Ability')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" name="ability" :value="old('ability',$botcRole->ability)" autofocus />
                    <x-input-error :messages="$errors->get('ability')" class="mt-2" />
                </div>

                @if($botcRole->firstNight)
                    <div class="mb-5">
                        <x-input-label for="id" :value="__('First Night Reminder')" />
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="firstNightReminder" :value="old('firstNightReminder',$botcRole->firstNightReminder)" autofocus />
                        <x-input-error :messages="$errors->get('firstNightReminder')" class="mt-2" />
                    </div>
                @endif

                @if($botcRole->otherNight)
                    <div class="mb-5">
                        <x-input-label for="id" :value="__('Other Night Reminder')" />
                        <x-text-input id="id" class="block mt-1 w-full" type="text" name="otherNightReminder" :value="old('otherNightReminder',$botcRole->otherNightReminder)" autofocus />
                        <x-input-error :messages="$errors->get('otherNightReminder')" class="mt-2" />
                    </div>
                @endif

                <div class="mb-5">
                    <x-input-label for="id" :value="__('Team')" />
                    <x-text-input id="id" class="block mt-1 w-full" type="text" name="team" :value="old('team',$botcRole->team)" required autofocus />
                    <x-input-error :messages="$errors->get('team')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Image</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" type="file" name="image">
                </div>

                <div class="mb-5">
                    <x-primary-button>{{__("Update")}}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-front-layout>
