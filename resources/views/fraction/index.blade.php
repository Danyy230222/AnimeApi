<x-app-layout title="Articulos">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Listar Fracción
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

        <a href="{{ route('fraction.create') }}">
            <button type="button"
                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150  w-3/12 mb-4"
                wire:click="$set('open', true)">
                Crear nueva Fracción
            </button>
        </a>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                @if ($fraction->count())
                    <table class="w-full ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Titulo</th>
                                <th class="px-4 py-3">Url</th>
                                <th class="px-4 py-3">Articulo al que pertenece</th>
                                <th class="px-4 py-3">fecha de creación</th>
                               

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($fraction as $item)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">

                                            <div>
                                                <p class="font-semibold">{{ $item->titulo }}</p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ Storage::url($item->path) }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->article->titulo }} perteneciente al año {{$item->article->year->year}}
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->updated_at }}
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
    </div>
</x-app-layout>