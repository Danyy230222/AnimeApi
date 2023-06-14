<x-app-layout title="Crear Articulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear Carousel
        </h2>
        <form action="{{route('imagencarousel.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Titulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la Sinopsis" id="Titulo" name="Titulo">
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
                  <span class="text-gray-700 dark:text-gray-400">Year</span>
                  <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Ingrese la Sinopsis" id="Year" name="Year">
                      <x-jet-input-error for="Year" />
              </label>
                <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tipo</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Ingrese la Sinopsis" id="Tipo" name="Tipo">
                    <x-jet-input-error for="Tipo" />
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">Subtitulado</span>
                  <input
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Ingrese la Sinopsis" id="Subtitulado" name="Subtitulado">
                      <x-jet-input-error for="Subtitulado" />
                  </label>
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Doblado</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la Sinopsis" id="Doblado" name="Doblado">
                        <x-jet-input-error for="Doblado" />
                    </label>
                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">Logo</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="Logo" type="file" name="Logo">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">ImagenWeb</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="ImagenMovil" type="file" name="ImagenWeb">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">ImagenMovil</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="ImagenMovil" type="file" name="ImagenMovil">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-4" for="file_input">Carousel</label>
                <div class="mt-2">
                  @foreach ($carouselid as $item)

                  <select id="country" name="carousel_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                    <option value="{{$item->id}}">{{$item->titulo}}</option>
                    
                  </select>
                  @endforeach
                </div>



                 


                <div class="flex mt-6 text-sm ">
                    <a href="{{route('imagencarousel.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
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
