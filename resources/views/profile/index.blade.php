<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("User Profile") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p>Name: {{ Auth::user()->profile->name }} {{ Auth::user()->profile->surname }}</p>
                    <p>Age: {{ Auth::user()->profile->age }}</p>
                    <p>Gender: {{ Auth::user()->profile->gender }}</p>
                    <p>Description: {{ Auth::user()->profile->description }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    @if(Auth::user()->settings->search_male === '1' && Auth::user()->settings->search_female === '1')
                        <h3>Looking For: Male or Female</h3>
                    @elseif(Auth::user()->settings->search_female === '0')
                        <h3>Looking For: Male</h3>
                    @elseif(Auth::user()->settings->search_male === '0')
                        <h3>Looking For: Female</h3>
                    @endif
                    <div class="mt-4">
                        <a class="underline" href="{{ route('upload') }}">Upload Picture</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
