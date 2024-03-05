<section class="bg-white userInputs mt-20 max-w-fit rounded-md">
    @if($errors->any())
        <x-alertaerrores :fails="$errors"/>
    @endif
    <div class="px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Añadir un juego nuevo</h2>
        <form action="{{ route('games.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-4 text-xl font-bold text-black">Añadir un juego nuevo</h2>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <input id="photo" name="photo"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       aria-describedby="file_input_help" type="file" :value="old('photo')">
                <p class="mt-1 text-sm text-black" id="file_input_help">La foto debe de estar en PNG, JPG o JPEG</p>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                        juego</label>
                    <x-text-input type="text" name="name" id="name"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="Escriba el nombre del producto" required=""
                                  :value="old('name')"></x-text-input>
                </div>
                <div class="w-full">
                    <label for="developer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desarrolladora</label>
                    <x-text-input type="text" name="developer" id="developer"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="Ponga la desarrolladora" value="{{Auth::user()->name}}"
                                  disabled></x-text-input>

                </div>
                <div class="w-full">
                    <label for="rental_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                        de
                        alquiler</label>
                    <x-text-input type="number" name="rental_price" id="rental_price"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="10€" required="" :value="old('rental_price')"></x-text-input>
                </div>
                <div class="">
                    <label for="category_id"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                    <select name="category_id" id="category_id" :value="old('category_id')"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option disabled>Selecciona una categoría</option>
                        @if(!empty(old('category_id')))
                            @foreach ($categories as $category)
                                @if($category->id == old('category_id'))
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de
                        lanzamiento</label>
                    <x-text-input type="number" name="year" id="year" :value="old('year')"
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="2000" required=""></x-text-input>
                </div>
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                        del juego</label>
                    <textarea name="description" id="description" rows="8"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="¿De qué va el juego?">{{old('description')}}</textarea>
                </div>
            </div>
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg botonEnviar">
                Añadir juego
            </button>
        </form>
    </div>
</section>
