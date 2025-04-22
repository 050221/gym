<div class="mt-16 mb-3 mx-4">
    <div>
        <h1 class="text-4xl font-bold text-gray-400">Historial suscripciones</h1>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2 mt-4">
            <x-forms.search-bar wire:model.live.debounce.250ms="search" placeholder="Buscar suscripciones..." />
        </div>
        <div class="flex justify-end w-full md:w-6/12 mt-3 lg:mt-0 ">
            <div class="w-[80px]">
                <x-forms.select name="numberRows" :options="['10' => '10', '25' => '25', '50' => '50']" wire:model.live="numberRows" />
            </div>
        </div>
    </div>

    <div class="w-full overflow-x-auto rounded-sm mt-10">
        <table class="w-full text-md text-left">
            <thead class="text-gray-700 bg-gray-200">
                <tr class="border-b border-gray-500 border-opacity-50">
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('id')">
                        #
                        @if ($sortField === 'id')
                            <i
                                class="material-icons text-sm ">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2">Cliente</th>
                    <th class="px-4 py-2 ">
                        Membresía
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('estado_anterior')">
                        Estado anterior
                        @if ($sortField === 'estado_anterior')
                            <i
                                class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_inicio')">
                        Fecha de inicio
                        @if ($sortField === 'fecha_inicio')
                            <i
                                class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_fin')">
                        Fecha de finalización
                        @if ($sortField === 'fecha_fin')
                            <i
                                class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2">
                        Fecha de creación
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($historialSuscripciones->isEmpty())
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($historialSuscripciones as $key => $historialSuscripcion)
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">
                                {{ $key + 1 + $historialSuscripciones->perPage() * ($historialSuscripciones->currentPage() - 1) }}
                            </th>
                            <td class="px-4 py-2">{{ $historialSuscripcion->user->full_name }}</td>
                            <td class="px-4 py-2">{{ $historialSuscripcion->membresia->nombre }}</td>
                            <td class="px-4 py-2">
                                <x-forms.status-button :status="$historialSuscripcion->estado_anterior" />

                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($historialSuscripcion->fecha_inicio)->isoFormat('DD-MMMM-YYYY') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($historialSuscripcion->fecha_fin)->isoFormat('DD-MMMM-YYYY') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $historialSuscripcion->created_at->isoFormat(' DD-MMMM-YYYY / hh:mm:ss A') }}
                            </td>
                        </tr>
                    @endforeach

                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $historialSuscripciones->links() }}
    </div>
</div>
