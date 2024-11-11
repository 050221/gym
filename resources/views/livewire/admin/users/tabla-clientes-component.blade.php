<div id="tablas">
    <div class="flex flex-wrap ">
        <div class="w-1/2">
            <h1 class="mb-0 sm:mb-3 text-4xl font-bold text-gray-400">Clientes</h1>
        </div>
        <div class="w-1/2">
            <div class="flex flex-row-reverse ">
                @livewire('create-modal-component')
            </div>
        </div>
        <div class="w-full ">
            <center>
                <hr class="border-2 my-3">
            </center>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="w-full md:w-6/12 pt-3 ">
            <input wire:model.live='search' type="text"
            class="p-2.5 w-full text-base  rounded-md border border-gray-300 shadow-md hover:bg-gray-200 focus:ring-offset-2 focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all duration-300 "
            placeholder="Buscar...">
        </div>
        <div class="pl-0 md:pl-3 pt-3 md:pt-3 w-1/2 md:w-3/12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                    wire:model.live="status" value="Activo">
                <label class="form-check-label" for="flexRadioDefault1">Activos</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                    wire:model.live="status" value="Inactivo">
                <label class="form-check-label" for="flexRadioDefault2">Inactivos</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                    wire:model.live="status" value="">
                <label class="form-check-label" for="flexRadioDefault3">Todos</label>
            </div>
        </div>
        <div class="pt-3 md:pt-3 w-1/2 md:w-3/12  ">
            <div class="flex flex-row-reverse">
                <select name="" id="" wire:model.live ='numberRows'
                    class=" w-1/2 md:w-1/3 p-2.5  border-gray-200 text-gray-900 text-base rounded-lg focus:border-1 focus:ring-orange-500 focus:border-orange-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover mt-10 ">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th class="btn-sss">Acción</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                    <tr>
                        <td colspan="12">
                            <center>No hay resultados</center>
                        </td>
                    </tr>
                @else
                    @foreach ($users as $key => $user)
                        <tr>
                            <th>{{ $key + 1 + $users->perPage() * ($users->currentPage() - 1) }}</th>
                            <td>{{ $user->name . ' ' . $user->firstname . ' ' . $user->lastname }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td><button
                                    class="{{ $user->status === 'Activo' ? 'bg-verde' : 'bg-rojo' }}">{{ $user->status }}</button>
                            </td>
                            <td>
                                <form id="deleteForm" action="{{ url('/clientes/' . $user->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ url('/clientes/' . $user->id . '/edit') }}"><i
                                            class="material-icons icon-edit">edit</i></a>
                                    <button
                                        type=""onclick="return confirm('Estas seguro de eliminar ha este usuario?');"><i
                                            class="material-icons icon-delete">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="w-full ">
        {{ $users->links() }}
    </div>


</div>
