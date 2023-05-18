<div>
   <x-table>
        @if ($year->count())
           
       
            <table class="w-full ">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Año</th>
                        <th class="px-4 py-3">URL</th>
                        <th class="px-4 py-3">Fecha de creación</th>
                        
                        
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($year as $item)
                        
                   
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                
                                <div>
                                    <p class="font-semibold">{{$item->year}}</p>
                                
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{Storage::url($item->path)}} 
                        </td>
                        
                        <td class="px-4 py-3 text-sm">
                            {{$item->updated_at}}
                        </td>
                       
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
            @else
            <div class="px-6 py-4 bg-white dark:bg-gray-800 dark:text-gray-400" >
                No existe ningun registro
            </div>
        @endif
        @if ($year->hasPages())
        <div class="px-6 py-3 dark:bg-gray-700">
            {{$year->links('vendor.pagination.tailwind')}}
        </div>
        @endif
            
            
       
        </x-table>
   
</div>
