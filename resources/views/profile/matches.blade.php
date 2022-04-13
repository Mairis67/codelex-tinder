<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Your Matches") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(count($matched) === 0)
                        <h2 class="text-center text-xl">You don't have any matches</h2>
                    @endif

                    @foreach($matched as $show)

                            @foreach($user->picture->all() as $picture)
                                <img src="{{ url('/storage/pictures/' . $picture->path) }}" width="400" height="400"/>
                            @endforeach

                                <p><b>Name:</b> {{ $user->profile->name }} {{ $user->profile->surname }}</p>
                                <p><b>Age:</b> {{ $user->profile->age }}</p>
                                <p><b>Gender:</b> {{ ucfirst($user->profile->gender) }}</p>
                                <p><b>Description:</b> {{ $user->profile->description }}</p>
                                <p><b>Email:</b> {{ $user->email }}</p>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
