<x-app-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        {{-- <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Gestor de Archivos
        </h2> --}}
        <div class="grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
                <h2 class="intro-y text-lg font-medium mr-auto mt-2 dark:text-gray-200">
                    File Manager
                </h2>
                <!--File Menu-->
                <div class="intro-y box p-5 mt-6 bg-gray-200 rounded-md dark:border-gray-600 dark:bg-gray-700">
                    <div class="mt-1">
                        <a href="" class="flex items-center px-3 py-2 rounded-md  text-white font-medium bg-purple-600"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-image w-4 h-4 mr-2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg> Images </a>
                       
                        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md font-medium dark:text-gray-200"> <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg> Documents </a>
                       
                        
                    </div>
                </div>
                <!--Final File Menu-->
            </div>
            
            <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
                <!--File Manager-->
                <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                    <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                        
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Buscar Achivo">
                            {{-- <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down dropdown-toggle w-4 h-4 cursor-pointer text-gray-700"><polyline points="6 9 12 15 18 9"></polyline></svg> 
                                <div class="inbox-filter__dropdown-box dropdown-box mt-10 absolute top-0 left-0 z-20">
                                    <div class="dropdown-box__content box p-5">
                                        <div class="grid grid-cols-12 gap-4 row-gap-3">
                                            <div class="col-span-6">
                                                <div class="text-xs">File Name</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Type the file name">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Shared With</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="example@gmail.com">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Created At</div>
                                                <input type="text" class="input w-full border mt-2 flex-1" placeholder="Important Meeting">
                                            </div>
                                            <div class="col-span-6">
                                                <div class="text-xs">Size</div>
                                                <select class="input w-full border mt-2 flex-1">
                                                    <option>10</option>
                                                    <option>25</option>
                                                    <option>35</option>
                                                    <option>50</option>
                                                </select>
                                            </div>
                                            <div class="col-span-12 flex items-center mt-3">
                                                <button class="button w-32 justify-center block bg-gray-200 text-gray-600 ml-auto">Create Filter</button>
                                                <button class="button w-32 justify-center block bg-theme-1 text-white ml-2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                       
                    </div>
                    <div class="w-full sm:w-auto flex ">
                       
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <!-- Heroicon name: solid/check -->
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Publish
                          </button>
                        {{-- <div class="dropdown relative">
                            <button class="dropdown-toggle button px-2 box text-gray-700">
                                <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-4 h-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
                            </button>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Share Files </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings w-4 h-4 mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>
                 <!--Final File Manager-->

                 <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input class="input border border-gray-500" type="checkbox">
                            </div>
                            <a href="" class="w-3/5 file__icon file__icon--file mx-auto">
                                <div class=" top-0 left-0 absolute m-auto right-0 bottom-0 flex items-center justify-center">
                                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                   
                                    
                                </div>
                                
                            </a>
                            
                            <div class="text-gray-600 text-xs text-center ">2.2 MB</div>
                            <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical w-5 h-5 text-gray-500"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg> </a>
                                {{-- <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                    <div class="dropdown-box__content box p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users w-4 h-4 mr-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Share File </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash w-4 h-4 mr-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete </a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                 </div>

            </div>
           
        </div>


    </div>
</x-app-layout>
