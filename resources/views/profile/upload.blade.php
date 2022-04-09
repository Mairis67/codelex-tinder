<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("User Profile") }}
        </h2>
    </x-slot>

    <div class="mt-4">
        <h1 class="text-xl font-semibold text-center">Upload pictures</h1>

        <form class="mt-8" method="post" action="/profile/upload" enctype="multipart/form-data">
            @csrf

            <input type="file" name="picture">
            <button type="submit">Upload</button>
        </form>
    </div>
</x-app-layout>
