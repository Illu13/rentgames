<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-rows-1">
                        <div class="grid grid-cols-2">
                            <div>
                                <img src="{{ asset($game->photo) }}">
                            </div>
                            <div class="ml-5">
                                <p>{{ $game->name }}</p>
                                <p>Precio de alquiler: {{ $game->rental_price }}</p>
                                <p>Desarrollador: "{{ $game->user->name }}"</p>
                                <p>{{ $game->description }}</p>
                                @if(Auth::user() && !Auth::user()->games->contains('id', $game->id))
                                <form method="POST" action="{{route('games.rentgame')}}" class="mt-5">
                                    @csrf
                                        <input id="rentGameButton"
                                               class=" text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black"
                                               type="submit" value="Alquilar juego">
                                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                                </form>
                                @endif
                                @if(Auth::user() && Auth::user()->games->contains('id', $game->id))
                                    <form method="POST" action="{{route('games.returngame')}}" class="mt-5">
                                        @csrf
                                        <input id="rentGameButton"
                                               class=" text-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-white"
                                               type="submit" value="Devolver juego">
                                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
