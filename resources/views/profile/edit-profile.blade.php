<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Edit Profile") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-center text-xl">Edit your profile!</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input id="name" value="{{ $user->profile->name }}" class="block mt-1 w-full" type="text"
                                     name="name" required
                                     autofocus/>
                        </div>

                        <!-- Surname -->
                        <div>
                            <x-label for="surname" :value="__('Surname')"/>

                            <x-input id="surname" value="{{ $user->profile->surname }}" class="block mt-1 w-full"
                                     type="text" name="surname" required
                                     autofocus/>
                        </div>

                        <!-- Age -->
                        <div class="mt-4">
                            <x-label for="age" :value="__('Age')"/>

                            <x-input value="{{ $user->profile->age }}" id="age" class="block mt-1 w-full" type="number"
                                     name="age" required/>
                        </div>

                        <!-- Description -->
                        <div>
                            <x-label for="description" :value="__('Description')"/>

                            <x-input value="{{ $user->profile->description }}" id="description"
                                     class="block mt-1 w-full" type="text" name="description" required autofocus/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
