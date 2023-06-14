<x-app-layout title="Crear anime">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear anime
        </h2>
        <form action="{{route('anime.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Titulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese El titulo" id="Titulo" name="Titulo">
                        <x-jet-input-error for="Titulo" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Sinopsis</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la Sinopsis" id="Sinopsis" name="Sinopsis">
                        <x-jet-input-error for="Sinopsis" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Tipo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese el tipo" id="Tipo" name="Tipo">
                        <x-jet-input-error for="Tipo" />
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Año de lanzamiento</span>
                  <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Ingrese el año de lanzamiento" id="YearLanzamiento" name="YearLanzamiento">
                      <x-jet-input-error for="YearLanzamiento" />
              </label>
                <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Estudio de Animación</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Ingrese el estudio de animación" id="EstudioAnimacion" name="EstudioAnimacion">
                    <x-jet-input-error for="EstudioAnimacion" />
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Subtitulado</span>
                  <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Ingrese Si si es subtitulado" id="Subtitulado" name="Subtitulado">
                      <x-jet-input-error for="Subtitulado" />
                  </label>
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Doblado</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese Si si es doblado" id="Doblado" name="Doblado">
                        <x-jet-input-error for="Doblado" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Trailer</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Ingrese iframe de youtube" id="Trailer" name="Trailer">
                            <x-jet-input-error for="Trailer" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Calificacion</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Ingrese iframe de youtube" id="Calificacion" name="Calificacion">
                            <x-jet-input-error for="Calificacion" />
                    </label>
                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">Logo</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="Logo" type="file" name="Logo">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">PortadaWeb</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="ImagenMovil" type="file" name="PortadaWeb">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">PortadaMovil</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="ImagenMovil" type="file" name="PortadaMovil">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">Genero</label>
                <div class="mt-2">
                 

                  <select id="country" name="generos[]" multiple autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($generos as $item)
                    <option value="{{$item->id}}">{{$item->Nombre}}</option>
                    @endforeach
                  </select>
                  
                </div>



                 


                <div class="flex mt-6 text-sm ">
                    <a href="{{route('anime.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
                            Cancelar
                        
                    </a>
                    <button type="submit"
                        class=" ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Crear
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
