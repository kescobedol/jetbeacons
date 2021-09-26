<div>
    <x-jet-button wire:click="$set('open', true)">
        Nuevo Beacon
    </x-jet-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name='title'>
            Crear Beacon
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="UUID" />
                <x-jet-input type="text" class="w-full" wire:model="uuid" />
                <x-jet-input-error for="uuid" /> 
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />
                <x-jet-input-error for="nombre" /> 
            </div>

            <div class="mb-4">
                <x-jet-label value="Institución" />
                <select type="text" wire:model="instituciones_id" class="form-control">
                    <option value=null>--Seleccione una institución--</option>
                    @foreach ($instituciones as $institucion)
                        <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="instituciones_id" /> 
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
