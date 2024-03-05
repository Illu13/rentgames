<div class="col-span-1 rounded shadow-lg card">
    <img class="w-full object-cover" src="{{asset($game->photo)}}" alt="Photo of {{$game->name}}">
    <div class="px-6 py-4 w-full">
        <div class="font-bold text-xl mb-2">{{$game->name}}</div>
        <p class="text-gray-700">
            {{$game->description}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <input id="rentGameButton" wire:click="returnGame"
               class=" text-black focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600"
               type="submit" value="Devolver juego">
        <input type="hidden" name="game_id" value="{{ $game->id }}">
    </div>


</div>
