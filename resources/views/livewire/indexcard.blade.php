<div class="col-span-1 rounded shadow-lg card">
    <img class="w-full object-cover" src="{{asset($game->photo)}}" alt="Photo of {{$game->name}}">
    <div class="px-6 py-4 w-full">
        <div class="font-bold text-xl mb-2">{{$game->name}}</div>
        <p class="text-gray-700">
            {{$game->description}}

        <p class="text-gray-700">
            Precio de alquiler: {{$game->rental_price}}€
        </p>
        <p class="text-gray-700">
            Año de salida: {{$game->year}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <span
            class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{\App\Models\Category::find($game->category_id)->name}}</span>
        <form method="GET" action="{{ route('games.show', $game->id) }}" class="mt-10">
        <input id="updateProductButton"
                class=" text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black"
                type="submit" value="Ver juego">
        </form>
    </div>

</div>
