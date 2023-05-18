<x-app-layout title="Crear Articulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear Carousel
        </h2>
        <form action="{{route('imagencarousel.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Sinopsis</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la Sinopsis" id="Sinopsis" name="Sinopsis">
                        <x-jet-input-error for="Sinopsis" />
                </label>
                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-700 dark:text-gray-400 mt-4">Logo</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                      <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex text-sm leading-6 text-gray-700 dark:text-gray-400">
                          <label for="file-upload" class="relative cursor-pointer rounded-md  font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="Logo" id="Logo" type="file" >
                          </label>
                          <p class="pl-1 text-gray-700 dark:text-gray-400">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-700 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                      </div>
                    </div>
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
