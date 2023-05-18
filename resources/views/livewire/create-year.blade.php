<div>
    <x-jet-danger-button class=" w-3/12 mb-4" wire:click="$set('open', true)"  >
        Crear nuevo año
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo año 
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Año" />
                <x-jet-input id="name" type="text" class="w-full" wire:model="year" />
                
                <x-jet-input-error for="year" />
               
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                class="disabled:opacity-25; ml-1">
                Crear
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
