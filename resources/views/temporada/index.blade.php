<x-app-layout title="Temporadas">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Listar Temporadas de {{$anime->Titulo}}
        </h2>
        @if (session('success'))
            <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                >
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>

            </div>
        @endif

        
        <a href="{{ route('temporada.crear', $anime->id) }}">
            <button type="button"
                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150  w-3/12 mb-4"
                wire:click="$set('open', true)">
                Crear nuevo temporada
            </button>
        </a>
        
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                @if ($temporada->count())
                    <table class="w-full ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Fecha Inicio</th>
                                <th class="px-4 py-3">Fecha Final</th>
                                <th class="px-4 py-3">Cantidad de Capitulos</th>
                                <th class="px-4 py-3">Anime</th>
                                <th class="px-4 py-3">Acciones</th>
                               

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($temporada as $item)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">

                                            <div>
                                                <p class="font-semibold">{{ $item->id }}</p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->Nombre }}
                                    </td>
                                    
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->FechaInicio }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->FechaFin }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->CantidadCapitulos }}
                                    </td>
                                     <td class="px-4 py-3 text-sm">
                                        {{ $item->anime->Titulo }}
                                    </td>
                                    
                                    

                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <a href="{{route('temporada.edit', $item->id)}}">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </a>
                                           
                                            <form action="{{route('temporada.destroy', $item->id)}}" method="post" onsubmit="return confirm('Seguro desea eliminar el articulo? Perdera todos los archivos en ella')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            

                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4 bg-white dark:bg-gray-800 dark:text-gray-400">
                        No existe ningun registro
                    </div>
                @endif
                
            </div>
          
            
        </div>
        <div class="flex mt-6 text-sm ">
            <a href="{{route('anime.index')}}" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                
                    
                    Cancelar
                
            </a>
           
        </div>
    </div>
</x-app-layout>