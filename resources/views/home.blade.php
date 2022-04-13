<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Search Other Half") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if($otherUser === null)
                        <h2 class="text-center text-xl">There are no profiles to show</h2>
                    @else
                        <p>There should be other user</p>

                        <p>Name: {{ $otherUser->profile->name }} {{ $otherUser->profile->surname }}</p>
                        <p>Age: {{ $otherUser->profile->age }}</p>
                        <p>Gender: {{ ucfirst($otherUser->profile->gender) }}</p>
                        <p>Description: {{ $otherUser->profile->description }}</p>
                        <p>Email: {{ $otherUser->email }}</p>

                        @foreach($otherUser->picture->all() as $picture)
                            {{--                        <p>{{ $a->path }}</p>--}}
                            <img src="{{ url('/storage/pictures/' . $picture->path) }}" width="500" height="500"/>
                        @endforeach

                        <form method="post" action="{{ route('like', $otherUser->id) }}">
                            @csrf

                            <button type="submit">Like</button>
                        </form>

                        <form method="post" action="{{ route('dislike', $otherUser->id) }}">
                            @csrf

                            <button type="submit">Dislike</button>
                        </form>
                    @endif




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
