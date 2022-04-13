<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-center text-xl">You're logged in!</h2>
                </div>
            </div>
            <div class="relative flex justify-center min-h-screen sm:items-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                <h2 class="text-xl">Welcome to dating app!</h2>
            </div>
        </div>
    </div>


</x-app-layout>
