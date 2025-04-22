<div class="mt-16 mb-3 mx-4">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2">
            <h1 class="text-4xl font-bold text-gray-400">Membresias</h1>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex flex-row-reverse ">
                @livewire('membresia.create-modal-membresias-component')
            </div>
        </div>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap mt-4 ">
        <div class="w-full md:w-6/12 mt-3 ">
            <x-forms.search-bar wire:model.live.debounce.250ms="search" placeholder="Buscar ..." />
        </div>
        <div class="flex justify-end gap-2 w-full md:w-6/12 mt-3 lg:mt-0">
            <div class="w-[80px]">
                <x-forms.select name="numberRows" classes="w-[80px]" :options="['10' => '10', '25' => '25', '50' => '50']" wire:model.live="numberRows" />
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
                    <th class="px-4 py-2">Nombre de la Membresía</th>
                    <th class="px-4 py-2">Duracion</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($membresias->isEmpty())
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($membresias as $key => $membresia)
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">
                                {{ $loop->iteration + $membresias->perPage() * ($membresias->currentPage() - 1) }}
                            </th>
                            <td class="px-4 py-2">{{ $membresia->nombre }}</td>
                            <td class="px-4 py-2">{{ $membresia->duracion_meses }} Meses</td>
                            <td class="px-4 py-2">${{ $membresia->precio }}</td>
                            <td class="px-4 py-2">
                                <form id="deleteForm" action="{{ url('/membresias/' . $membresia->id) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf

                                    <a href="#"
                                        wire:click="$dispatch('editMembresia', { id: {{ $membresia->id }} })"
                                        data-bs-toggle="modal" title="Editar Membresía">
                                        <i class="material-icons text-yellow-500 ">edit</i>
                                    </a>
                                    <button type="button" onclick="confirmDelete(this)" title="Eliminar Membresía">
                                        <i class="material-icons text-red-500 ">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @livewire('membresia.edit-modal-membresia')
    </div>
    <div class="mt-3">
        {{ $membresias->links() }}
    </div>

</div>
