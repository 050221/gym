<div class="mt-16 mb-3 mx-4">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2">
            <p class="text-4xl font-bold text-gray-400">Suscripciones</p>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex flex-row-reverse ">
                @livewire('suscripcion.create-modal-suscripciones-component')
            </div>
        </div>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap mt-4 ">
        <div class="w-full md:w-6/12 mt-3 ">
            <x-forms.search-bar wire:model.live.debounce.250ms="search" placeholder="Buscar ..." />
        </div>
        <div class="flex justify-end gap-2 w-full md:w-6/12 mt-3 lg:mt-0">
            <div class="w-[140px]">
                <x-forms.select name="status" :options="['' => 'Todas', 'Activa' => 'Activas',  'Cancelada' => 'Canceladas', 'Expirada' => 'Expiradas']" wire:model.live="status" />
            </div>
           <div class="w-[80px]">
            <x-forms.select name="numberRows"  :options="['10' => '10', '25' => '25', '50' => '50']" wire:model.live="numberRows" />
           </div>
        </div>
    </div>

    <div class="w-full overflow-x-auto rounded-sm mt-10">
        <table class="w-full text-md text-left">
            <thead class="text-gray-700 bg-gray-200">
                <tr class="border-b border-gray-500 border-opacity-50">
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('id')">
                        # 
                        @if($sortField === 'id')
                            <i class="material-icons text-sm ">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2">
                        Cliente
                    </th>
                    <th class="px-4 py-2" >
                        Membresía
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('status')">
                        Estado
                        @if($sortField === 'status')
                            <i class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_inicio')">
                        Fecha de inicio
                        @if($sortField === 'fecha_inicio')
                            <i class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_fin')">
                        Fecha de finalización
                        @if($sortField === 'fecha_fin')
                            <i class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($suscripciones->isEmpty())
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($suscripciones as $key => $suscripcion)
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">
                                {{ $loop->iteration + ($suscripciones->perPage() * ($suscripciones->currentPage() - 1)) }}
                            </th>
                            <td class="px-4 py-2">{{ $suscripcion->user->name }} {{ $suscripcion->user->firstname }}
                                {{ $suscripcion->user->lastname }}</td>
                            <td class="px-4 py-2">{{ $suscripcion->membresia->nombre }}</td>
                            <td class="px-4 py-2">
                                <x-forms.status-button :status="$suscripcion->status" />
                            </td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($suscripcion->fecha_inicio)->isoFormat('D MMM YYYY') }}</td>
                            <td class="px-4 py-2">
                                {{ \Carbon\Carbon::parse($suscripcion->fecha_fin)->isoFormat('D MMM YYYY') }}</td>
                            <td class="px-4 py-2">
                                <form id="deleteForm" action="{{ url('suscripciones/' . $suscripcion->id) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#"
                                        wire:click="$dispatch('renewSuscripcion', { id: {{ $suscripcion->id }} })"
                                        data-bs-toggle="modal" title="Renovar Suscripción">
                                        <i class="material-icons text-blue-500">autorenew</i>
                                    </a>
                                    <a href="#"
                                        wire:click="$dispatch('editSuscripcion', { id: {{ $suscripcion->id }} })"
                                        data-bs-toggle="modal" title="Editar Suscripción">
                                        <i class="material-icons text-yellow-500 ">edit</i>
                                    </a>
                                    <a href="{{ url('suscripciones/' . $suscripcion->id) }}" title="Cancelar Suscripción">
                                        <i class="material-icons text-gray-500 ">cancel</i>
                                    </a>
                                    <button type="button" class="text-red-500" title="Eliminar Suscripción de forma permanente"
                                    onclick="confirmDeleteSuscripcion(this)">
                                    <i class="material-icons">delete</i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @livewire('suscripcion.edit-modal-suscripcion')
        @livewire('suscripcion.renew-modal-suscripcion')

    </div>
    <div class="mt-3">
        {{ $suscripciones->links() }}
    </div>

</div>
