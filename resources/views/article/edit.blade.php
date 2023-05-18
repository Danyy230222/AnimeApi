<x-app-layout title="Editar Articulo">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Editar Articulo
        </h2>

        <form action="{{route('article.update',$article->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Titulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{$article->titulo}}" id="titulo" name="titulo">
                        <x-jet-input-error for="titulo" />
                </label>


                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        A que año pertenece
                    </span>
                    <select name="year_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        
                        @foreach ($year as $item)
                             <option value="{{$item->id}}" @if( $item->id === $article->year_id ) selected @endif >{{$item->year}}</option>
                        @endforeach
                        
                       
                    </select>
                    <x-jet-input-error for="year" />
                </label>
                

                <div class="flex mt-4 text-sm ">
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