<div>
   <x-table>
    <div class="px-6 py-4">
       
        <x-jet-input class="w-full" placeholder="Escriba el anime" type="text" wire:model="search"/>
    </div>
    <div class="w-full overflow-x-auto">
        @if ($anime->count())
            <table class="w-full ">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Titulo</th>
                        {{-- <th class="px-4 py-3">Sinopsis</th> --}}
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3">Lanzamiento</th>
                        <th class="px-4 py-3">Estudio</th>
                        <th class="px-4 py-3">Trailer</th>
                        <th class="px-4 py-3">Calificación</th>
                        <th class="px-4 py-3">Logo</th>
                        <th class="px-4 py-3">PortadaWeb</th>
                        <th class="px-4 py-3">PortadaMovil</th>
                        <th class="px-4 py-3">Temporadas</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                       

                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($anime as $item)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">

                                    <div>
                                        <p class="font-semibold">{{ $item->id }}</p>

                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->Titulo }}
                            </td>
                            {{-- <td class="px-4 py-3 text-sm ">
                                <p class="text-truncate" > {{ $item->Sinopsis }}</p>
                            </td> --}}
                            <td class="px-4 py-3 text-sm">
                                {{ $item->Tipo }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $item->YearLanzamiento }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->EstudioAnimacion }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->Trailer }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $item->Calificacion }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <img src="{{ $item->Logo }}" alt="{{ $item->Logo }}" >
                            </td>
                            <td class="px-4 py-3 text-sm">
                               <img src="{{ $item->PortadaWeb }}" alt="{{ $item->PortadaWeb }}"> 
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <img src="{{ $item->PortadaMovil }}" alt="{{ $item->PortadaMovil }}">
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $item->Temporadas()->count() }}
                            </td>
                            

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{route('anime.edit', $item->id)}}">
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
                                    <a href="{{route('detalle.show', $item->id)}}">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Temporada">
                                            <p>Detalles</p>
                                        </button>
                                    </a>
                                    <a href="{{route('temporada.show', $item->id)}}">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Temporada">
                                            <p>Listar Temporadas</p>
                                        </button>
                                    </a>
                                    <form action="{{route('anime.destroy', $item->id)}}" method="post" onsubmit="return confirm('Seguro desea eliminar el articulo? Perdera todos los archivos en ella')">
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
    @if ($anime->hasPages())
<div class="px-6 py-3 dark:bg-gray-700">
    {{$anime->links('vendor.pagination.tailwind')}}
</div>
@endif
            
            
       
        </x-table>
   
</div>
