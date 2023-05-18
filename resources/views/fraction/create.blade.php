<x-app-layout title="Crear Articulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crear Fracción
        </h2>
        <form action="{{route('fraction.store')}}" method="post">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Titulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese el nombre del Articulo" id="titulo" name="titulo">
                        <x-jet-input-error for="titulo" />
                </label>



                <label  class="block text-sm mt-4 ">
                    <span class="text-gray-700 dark:text-gray-400">Path</span>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                            class=" dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray inline-flex items-center px-3 py-1 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm ">
                            http://transparencia/#AÑO#/ </span>
                        <input type="text" 
                            class="dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input flex-1 block w-full rounded-none rounded-r-md sm:text-sm text-sm"
                            placeholder="Se genera automaticamente con el nombre del titulo" disabled>
                            
                    </div>
                    <x-jet-input-error for="path" />
                </label>




                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        A que Articulo pertenece
                    </span>
                    <select name="article_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        
                        @foreach ($article as $item)
                             <option value="{{$item->id}}">{{$item->titulo}} perteneciente al año {{$item->year->year}}</option>
                        @endforeach
                        
                       
                    </select>
                    <x-jet-input-error for="article_id" />
                </label>




                <div class="flex mt-6 text-sm ">
                    <a href="{{route('article.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
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
