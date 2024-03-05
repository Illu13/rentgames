<div>
    <div class="flex items-center justify-center mt-10">
        <select wire:model.live="chosenCategory" name="chosenCategory" id="chosenCategory"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            <option value="0">Selecciona una categoría</option>
            @foreach ($category as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="grid grid-cols-4 gap-20 mt-10 w-full h-full">
        @foreach ($games as $game)
            @livewire('indexcard', ['game' => $game], key($game->id))
        @endforeach
    </div>
</div>
