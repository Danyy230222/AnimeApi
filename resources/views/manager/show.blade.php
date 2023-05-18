<x-app-layout title="Gestor de Archivos">
    <div class="container grid px-6 mx-auto">


        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Gestor de archivos
                </h2>

            </div>

        </div>






        <section class="text-gray-600 body-font ">
            <div class="container   mx-auto ">
                @if ($article->count())
                    <div class="lg:flex lg:items-center lg:justify-between">
                        <div class="flex-1 min-w-0 mb-4">
                            <button onclick="window.location='{{ URL::route('manager.index') }}'"  type="button"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200">
                           
                            <svg class="-ml-1 mr-2 h-5 w-5 text-white dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                            Regresar
                        </button>

                        </div>

                        <div class="mt-5 flex lg:mt-0 lg:ml-4 mb-3">
                            <span class="sm:block">
                                <button @click="openModal" type="button"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200">
                                    <!-- Heroicon name: solid/pencil -->
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-200"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Subir archivos en esta carpeta
                                </button>
                            </span>



                        </div>
                    </div>



                    <div class="flex flex-wrap -m-4 ">
                        @foreach ($article as $item)
                            <div class="lg:w-1/6 sm:w-1/2 p-4">
                                <div class="flex relative">
                                    <button
                                        class="border border-gray-200 rounded-lg bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 ">
                                        <div class="flex justify-center items-center text-gray-500 pt-1">


                                            <svg class="w-24 h-24 dark:text-gray-200" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="text-center pb-2">
                                            <h1 class="font-bold text-gray-700 text dark:text-gray-200">
                                                {{ $item->titulo }}</h1>

                                        </div>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                <div class="flex-1 min-w-0 mb-5">
                    <button onclick="window.location='{{ URL::route('manager.index') }}'"  type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200">
                   
                    <svg class="-ml-1 mr-2 h-5 w-5 text-white dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                    Regresar
                </button>

                </div>
                    <div class="px-4 py-3 mb-8 bg-red-500  rounded-lg shadow-md ">
                        <h4 class="mb-4 font-semibold text-white">
                            No hay carpetas
                        </h4>
                        <p class="text-white">
                            No hay carpetas creadas, favor de ir a la opción CRUD y crear las carpetas en orden
                        </p>
                    </div>
                @endif
            </div>
        </section>
    </div>
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Subir archivos
                </p>
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                    eligendi repudiandae voluptatem tempore!
                </p>
                <form class="flex items-center space-x-6">
                    <div class="shrink-0">
                      <img class="h-16 w-16 object-cover rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
                    </div>
                    <label class="block">
                      <span class="sr-only">Choose profile photo</span>
                      <input type="file" class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-violet-50 file:text-violet-700
                        hover:file:bg-violet-100
                      "/>
                    </label>
                  </form>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancelar
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Aceptar
                </button>
            </footer>
        </div>
    </div>
</x-app-layout>