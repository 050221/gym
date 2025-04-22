<div class="mt-16 mb-3 mx-4">
    <div class="flex flex-wrap ">
        <div class="w-1/2">
            <h1 class="mb-0 sm:mb-3 text-4xl font-bold text-gray-400">Clientes</h1>
        </div>
        <div class="w-1/2">
            <div class="flex flex-row-reverse ">
                @livewire('user.create-modal-users-component')
            </div>
        </div>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap mt-4 ">
        <div class="w-full md:w-6/12 mt-3 ">
            <x-forms.search-bar wire:model.live.debounce.250ms="search" placeholder="Buscar usuarios..." />
        </div>
        <div class="flex justify-end gap-2 w-full md:w-6/12 mt-3 lg:mt-0 ">
            <div class="w-[120px]">
                <x-forms.select name="status" :options="['' => 'Todos', 'Activo' => 'Activos', 'Inactivo' => 'Inactivos']" wire:model.live="status" />
            </div>
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
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('name')">
                        Nombre completo
                        @if ($sortField === 'name')
                            <i
                                class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('status')">
                        Estado
                        @if ($sortField === 'status')
                            <i
                                class="material-icons text-sm">{{ $sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward' }}</i>
                        @endif
                    </th>
                    <th class="px-4 py-2">Telefono</th>
                    <th class="px-4 py-2">Correo Electronico</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($users as $key => $user)
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">{{ $user->row_number }}</th>
                            <td class="px-4 py-2">{{ $user->full_name }}</td>
                            <td class="px-4 py-2">
                                <x-forms.status-button :status="$user->status" />
                            </td>
                            <td class="px-4 py-2">{{ $user->phone }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>

                            <td class="px-4 py-2">
                                <form class="delete-form" action="{{ url('/clientes/' . $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" wire:click="$dispatch('viewUser', { id: {{ $user->id }} })"
                                        data-bs-toggle="modal" title="Ver Cliente">
                                        <i class="material-icons text-blue-500">visibility</i>
                                    </a>

                                    <a href="#" wire:click="$dispatch('editUser', { id: {{ $user->id }} })"
                                        data-bs-toggle="modal" title="Editar Cliente">
                                        <i class="material-icons text-yellow-500">edit</i>
                                    </a>

                                    <button type="button" onclick="confirmDelete(this)" title="Eliminar Cliente">
                                        <i class="material-icons text-red-500">delete</i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @livewire('user.edit-modal')
        @livewire('user.view-cliente-modal')
    </div>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
