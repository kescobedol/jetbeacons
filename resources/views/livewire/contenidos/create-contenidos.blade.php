<div>
    <x-jet-button wire:click="$set('open', true)">
        Nuevo Contenido
    </x-jet-button>

    <x-jet-dialog-modal wire:model='open'>
        <x-slot name='title'>
            Crear Contenido
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="URL de Imagen" />
                <x-jet-input type="text" class="w-full" wire:model="imagen_url" />
                <x-jet-input-error for="imagen_url" />
            </div>

            <div class="mb-4">
                <x-jet-label value="URL" />
                <x-jet-input type="text" class="w-full" wire:model="url" />
                <x-jet-input-error for="url" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Beacon" />
                <select type="text" wire:model="beacons_id" class="form-control">
                    <option value=null>--Seleccione un Beacon--</option>
                    @foreach ($beacons as $beacon)
                        <option value="{{ $beacon->id }}">{{ $beacon->nombre }}</option>

                        @foreach ($instituciones as $institucion)
                            @if ($institucion->id == $beacon->instituciones_id)
                                <x-jet-label value={{ $institucion->nombre }} />
                            @endif

                        @endforeach

                    @endforeach

                </select>
                <x-jet-input-error for="beacons_id" />
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

            <button id="upload_widget" class="cloudinary-button">Upload files</button>

            <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

            <script type="text/javascript">
                var myWidget = cloudinary.createUploadWidget({
                    cloudName: 'nacionesunidas',
                    uploadPreset: 'my_preset'
                }, (error, result) => {
                    if (!error && result && result.event === "success") {
                        console.log('Done! Here is the image info: ', result.info);
                    }
                })

                document.getElementById("upload_widget").addEventListener("click", function() {
                    myWidget.open();
                }, false);
            </script>










        </x-slot>

    </x-jet-dialog-modal>


</div>
