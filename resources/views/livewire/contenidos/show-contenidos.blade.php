<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contenido
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-2 py-5">
        <x-table>
            <div class="bg-gray-200 px-4 py-4 flex items-center">
                @livewire('contenidos.create-contenidos')
                
            </div>

            @if ($contenidos->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Id

                            </th>
                            <th scope="col"
                                class=" bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                URL Imagen

                            </th>
                            {{-- <th scope="col"
                                class="bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider ">
                                URL


                            </th> --}}

                            <th scope="col"
                                class=" bg-green-900 cursor-pointer px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Beacon


                            </th>

                            {{-- <th scope="col"
                                class="w-60 bg-green-900 px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Fecha de Última Modificación
                            </th> --}}

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

                        @foreach ($contenidos as $contenido)


                            <tr>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $contenido->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $contenido->imagen_url }}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $contenido->url }}
                                    </div>
                                </td> --}}

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @foreach ($beacons as $beacon)
                                        @if ($beacon->id == $contenido->beacons_id)
                                            <div class="text-sm text-gray-900">{{ $beacon->nombre }}</div>
                                            @foreach ($instituciones as $institucion)

                                                @if ($institucion->id == $beacon->instituciones_id)
                                                    <div class="text-sm text-gray-500">{{ $institucion->nombre }}
                                                    </div>
                                                @endif

                                            @endforeach
                                        @endif

                                    @endforeach

                                </td>

                                {{-- <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $contenido->updated_at }}
                                    </div>
                                </td> --}}

                                <td class="px-6 py-4 text-sm text-gray-500">

                                    @if ($contenido->estado == 1)
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

                                    <a class="btn btn-green" wire:click="edit({{ $contenido }})">
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

        </x-table>

    </div>

</div>
