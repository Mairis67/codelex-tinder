<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Edit Settings") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-center text-xl">Edit your settings!</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="/profile/editSettings" enctype="multipart/form-data">
                    @csrf
                    <!-- Looking For -->

                        <div class="mt-4">
                            <x-label for="gender" :value="__('Looking For')"/>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="search_male"
                                           id="search_male" value="1"
                                           @if($user->settings->search_male == 1)
                                           checked
                                        @endif>

                                    <label class="form-check-label" for="search_male">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="search_female"
                                           id="search_female" value="1"
                                           @if($user->settings->search_female == 1)
                                           checked
                                        @endif>
                                    <label class="form-check-label" for="search_female">Female</label>
                                </div>

                            </div>
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
