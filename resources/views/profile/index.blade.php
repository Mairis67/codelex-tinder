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

                    <p>Name: {{ $user->profile->name }} {{ $user->profile->surname }}</p>
                    <p>Age: {{ $user->profile->age }}</p>
                    <p>Gender: {{ ucfirst($user->profile->gender) }}</p>
                    <p>Description: {{ $user->profile->description }}</p>
                    <p>Email: {{ $user->email }}</p>
                    @if($user->settings->search_male === '1' && $user->settings->search_female === '1')
                        <h3>Looking For: Male or Female</h3>
                    @elseif($user->settings->search_female === '0')
                        <h3>Looking For: Male</h3>
                    @elseif($user->settings->search_male === '0')
                        <h3>Looking For: Female</h3>
                    @endif

                    @foreach($user->picture->all() as $picture)
{{--                        <p>{{ $a->path }}</p>--}}
                        <img src="{{ url('/storage/pictures/' . $picture->path) }}" width="500" height="500"/>
                    @endforeach


                    <div class="mt-4">
                        <a class="underline" href="{{ route('upload') }}">Upload Picture</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
