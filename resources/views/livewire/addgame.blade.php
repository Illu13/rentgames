<section class="userInputs">
    @if($errors->any())
        <x-alertaerrores :fails="$errors"/>
    @endif

    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-black">Añadir un juego nuevo</h2>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <input wire:model.live="photo" id="photo" name="photo"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                   aria-describedby="file_input_help" type="file">
            <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                    juego</label>
                <input wire:model.live="name" type="text" name="name" id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="Escriba el nombre del producto" required="">
            </div>
            <div class="w-full">
                <label for="developer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desarrolladora</label>
                <select wire:model.live="developer_id" name="developer_id" id="developer_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option>Selecciona a un desarrollador</option>
                    @foreach ($developer as $d)
                        <option value="{{ $d->id }}">{{ $d->name }} {{$d->surname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full">
                <label for="rental_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio de
                    alquiler</label>
                <input wire:model.live="rental_price" type="number" name="rental_price" id="rental_price"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="10€" required="">
            </div>
            <div class="">
                <label for="category_id"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                <select wire:model.live="category_id" name="category_id" id="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option disabled>Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de
                    lanzamiento</label>
                <input wire:model.live="year" type="number" name="year" id="year"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                       placeholder="2000" required="">
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                    del juego</label>
                <textarea wire:model="description" name="description" id="description" rows="8"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                          placeholder="¿De qué va el juego?"></textarea>
            </div>
        </div>
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg botonEnviar"
                wire:click="addgame">
            Añadir juego
        </button>
    </div>
        @if($incorrecto)
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $incorrecto }}</span>
            </div>
        @endif
</section>
