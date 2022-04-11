<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- Surname -->
            <div>
                <x-label for="surname" :value="__('Surname')"/>

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required
                         autofocus/>
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-label for="age" :value="__('Age')"/>

                <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')"
                         required/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required/>
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" :value="__('Description')"/>

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required
                         autofocus/>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('Gender')"/>
                <input class="form-check-input" type="radio" name="gender" value="male">
                <label class="form-check-label" for="male">Male</label>

                <input class="form-check-input" type="radio" name="gender" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>

            <!-- Looking For -->

            <div class="mt-4">
                <x-label for="gender" :value="__('Looking For')"/>

                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="search_male"
                               id="search_male" value="1" checked>
                        <label class="form-check-label" for="search_male">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="search_female"
                               id="search_female" value="1" checked>
                        <label class="form-check-label" for="search_female">Female</label>
                    </div>

                </div>
            </div>

            <!-- Profile Picture -->

            <div class="mt-4">
                <x-label for="gender" :value="__('Profile Picture')"/>
                <input type="file" name="picture">
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
