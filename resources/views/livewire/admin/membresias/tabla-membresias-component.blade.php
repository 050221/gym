<div id="tablas">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2">
            <h1 class="text-4xl font-bold text-gray-400">Membresias</h1>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex flex-row-reverse ">
                @livewire('create-modal-membresias-component')
            </div>
        </div>
        <div class="w-full ">
            <center>
                <hr class="border-2 my-3">
            </center>
        </div>
        <div class="w-full md:w-1/2 mt-4 ">
            <input wire:model.live='search' type="text"
                class="p-2.5 w-full text-base  rounded-md border border-gray-300 shadow-md hover:bg-gray-200 focus:ring-offset-2 focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all duration-300 "
                placeholder="Buscar...">
        </div>
        <div class="w-full md:w-1/2 mt-4 ">
            <div class="flex flex-row-reverse">
                <select name="" id="" wire:model.live ='numberRows'
                    class="w-1/6 p-2.5  border-gray-200 text-gray-900 text-base rounded-lg focus:border-1 focus:ring-orange-500 focus:border-orange-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="table-responsive w-full">
            <table class="table table-hover mt-10 ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tipo membresia</th>
                        <th>Duracion</th>
                        <th>Precio</th>
                        <th class="btn-sss">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($membresias->isEmpty())
                        <tr>
                            <td colspan="12">
                                <center>No hay resultados</center>
                            </td>
                        </tr>
                    @else
                        @foreach ($membresias as $key => $membresia)
                            <tr>
                                <th>{{ $key + 1 + $membresias->perPage() * ($membresias->currentPage() - 1) }}</th>
                                <td>{{ $membresia->nombre_membresia }}</td>
                                <td>{{ $membresia->duracion }} Meses</td>
                                <td>${{ $membresia->precio }}</td>
                                <td>
                                    <form id="deleteForm" action="{{ url('/membresias/' . $membresia->id) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ url('/membresias/' . $membresia->id . '/edit') }}"><i
                                                class="material-icons icon-edit">edit</i></a>
                                        <button
                                            type=""onclick="return confirm('¿Deseas eliminar esta palabra?');"><i
                                                class="material-icons icon-delete">delete</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="w-full">
            {{ $membresias->links() }}
        </div>

    </div>
