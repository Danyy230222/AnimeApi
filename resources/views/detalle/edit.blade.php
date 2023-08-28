<x-app-layout title="Detalles ">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Editar Detalles  de {{$anime->Titulo}}
        </h2>
        <form action="{{route('detalle.update', $detalle->id)}}" method="post">
            @csrf
             {{ method_field('PUT') }}
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Emisión</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese Emisión si esta en Emisión o Finalizado y el anime ha terminado " id="Emision" name="Emision" value="{{$detalle->Emision}}">
                        <x-jet-input-error for="Nombre" />
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Proximo Capitulo</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingrese la fecha en formato DD-MM-YY si el anime sigue en emisión" id="Nombre" name="ProximoCapitulo" value="{{$detalle->ProximoCapitulo}}">
                        <x-jet-input-error for="FechaInicio" />
                </label>

              

               

                
                

                <label for="countries" class="block mb-2 text-sm text-gray-700 dark:text-gray-400">Seleciona el anime</label>
                <select id="countries" name="anime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                    
                        <option selected value="{{$anime->id}}">{{$anime->Titulo}}</option>
                   
                </select> 




                <div class="flex mt-6 text-sm ">
                    <a href="{{route('anime.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        
                            
                            Cancelar
                        
                    </a>
                    <button type="submit"
                        class=" ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Editar
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
