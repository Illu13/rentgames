<div class=" w-fit p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 userInputs">
    @if($errors->any())
        <x-alertaerrores :fails="$errors"/>
    @endif
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Actualizar juego
        </h3>
    </div>
    <!-- Modal body -->
    <form method="post" action="{{ route('games.update', $game->id) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <input id="photoEdit" name="photoEdit"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                    juego</label>
                <input type="text" name="name" id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Escriba el nombre del producto" value="{{$game->name}}" required="">
            </div>
            <div class="w-full">
                <label for="rental_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                    de
                    alquiler</label>
                <input type="number" name="rental_price" id="rental_price"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="10€" required="" value="{{$game->rental_price}}">
            </div>
            <div class="">
                <label for="category_id"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                <select name="category_id" id="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        @if ($category->id == $game->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de
                    lanzamiento</label>
                <input type="number" name="year" id="year"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="2000" value="{{$game->year}}" required="">
            </div>
            <div>
                <label for="developer"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desarrollador</label>
                <input type="text" name="developer" id="developer"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       required="" value="{{Auth::user()->name}}">
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                    del juego</label>
                <textarea name="description" id="description" rows="8"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          placeholder="¿De qué va el juego?">{{$game->description}}</textarea>
            </div>
        </div>
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg botonEnviar">
            Editar juego
        </button>
    </form>
</div>

