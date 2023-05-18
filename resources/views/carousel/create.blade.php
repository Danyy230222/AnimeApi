<x-app-layout title="Crear Articulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear Carousel
        </h2>
        <form action="{{route('carousel.store')}}" method="post">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Titulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese el nombre del Articulo" id="titulo" name="titulo">
                        <x-jet-input-error for="titulo" />
                </label>



                




                





                <div class="flex mt-6 text-sm ">
                    <a href="{{route('carousel.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
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
