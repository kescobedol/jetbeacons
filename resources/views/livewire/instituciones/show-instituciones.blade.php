<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Instituciones
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2 py-5">
        <x-table>

            {{-- <div class="px-6 py-4 flex items-center">
                @livewire('instituciones.create-instituciones')
            </div> --}}

            <div class="bg-gray-200 px-4 py-4 flex items-center">
                @livewire('instituciones.create-instituciones')
                <x-jet-input class="flex-1 ml-4 mr-4" placeholder="Texto a buscar" type="text" wire:model="search">
                </x-jet-input>

                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-4 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entradas</span>

                </div>

            </div>

            @if ($instituciones->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                wire:click="order('id')">
                                Id

                                {{-- Ordenamiento --}}
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif


                            </th>
                            <th scope="col"
                                class=" bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"
                                wire:click="order('nombre')">
                                Nombre

                                {{-- Ordenamiento --}}
                                @if ($sort == 'nombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif


                            </th>
                            <th scope="col"
                                class="bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider "
                                wire:click="order('slug')">
                                Descripción

                                {{-- Ordenamiento --}}
                                @if ($sort == 'slug')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif

                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>


                            <th scope="col"
                                class="w-60 bg-green-900 px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Fecha de Última Modificación
                            </th>

                            <th scope="col"
                                class=" bg-green-900 px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Estado
                            </th>

                            <th scope="col" class=" bg-green-900 relative px-6 py-3">
                                <span class="sr-only"></span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($instituciones as $institucion)

                            <tr>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $institucion->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $institucion->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $institucion->descripcion }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $institucion->updated_at }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">

                                    @if ($institucion->estado == 1)
                                        <span class="form-active">
                                            Activo
                                        </span>

                                    @else
                                        <span class="form-inactive">
                                            Inactivo
                                        </span>

                                    @endif

                                </td>


                                <td class="px-6 py-4 text-sm font-medium">

                                    <a class="btn btn-green" wire:click="edit({{ $institucion }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @else
                <div class="px-6 py-4">
                    No existe ningún registro.
                </div>

            @endif

            {{-- Paginación --}}
            @if ($instituciones->hasPages())
                <div class="px-6 py-3">
                    {{ $instituciones->links() }}
                </div>
            @endif


        </x-table>

    </div>

    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Editar Institución 
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input wire:model="institucion.nombre" type="text" class="w-full" />
                <x-jet-input-error for="nombre" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Descripción" />
                <x-jet-input wire:model="institucion.descripcion" type="text" class="w-full" />
                <x-jet-input-error for="slug" />

            </div>

            <div class="mb-4">
                <x-jet-label value="Estado" />
                <select wire:model="institucion.estado" class="form-control">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>

        </x-slot>

        <x-slot name='footer'>

            <x-jet-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-button>

            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>
