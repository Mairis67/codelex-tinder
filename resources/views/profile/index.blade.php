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
                    @foreach($data as $user)

                        @if(Auth::user()->email === $user->email)
                            <h3>Name: {{ $user->name }} {{ $user->surname }}</h3>
                            <h3>Age: {{ $user->age }}</h3>
                            <h3>Gender: {{ $user->gender }}</h3>
                            <h3>Description: {{ $user->description }}</h3>
                            <h3>Email: {{ $user->email }}</h3>
                            @if($user->search_male === '1' && $user->search_female === '1')
                                <h3>Looking For: Male or Female</h3>
                            @elseif($user->search_female === '0')
                                <h3>Looking For: Male</h3>
                            @elseif($user->search_male === '0')
                                <h3>Looking For: Female</h3>
                            @endif
                        @endif
                    @endforeach

                    <div class="mt-4">
                        <a class="underline" href="{{ route('upload') }}">Upload Picture</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
