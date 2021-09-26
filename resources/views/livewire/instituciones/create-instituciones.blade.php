<div>
    <x-jet-button wire:click="$set('open', true)">
        Nueva Institución
    </x-jet-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name='title'>
            Crear Institución
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />
                <x-jet-input-error for="nombre" /> 
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción" />
                <x-jet-input type="text" class="w-full" wire:model="descripcion" />
                <x-jet-input-error for="descripcion" /> 
            </div>

            <div class="mb-4">
                <x-jet-label value="Estado" />
                <select wire:model="estado" class="form-control">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>


        </x-slot>
        <x-slot name='footer'>

            <x-jet-button wire:click="save">
                Crear
            </x-jet-button>

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>


        </x-slot>

    </x-jet-dialog-modal>
</div>
