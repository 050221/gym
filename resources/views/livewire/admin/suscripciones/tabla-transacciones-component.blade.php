<div id="tablas">
    <div class="flex flex-wrap ">
        <div class="w-full">
            <p class="text-4xl font-bold text-gray-400">Transacciones</p>
            <center>
                <hr class="border-2 my-3">
            </center>
        </div>

        <div class="w-full md:w-1/2 mt-4">
            <input wire:model.live='search' type="text"
                class="p-2.5 w-full text-base  rounded-md border border-gray-300 shadow-md hover:bg-gray-200 focus:ring-offset-2 focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all duration-300 "
                placeholder="Buscar...">
        </div>
        <div class="w-full md:w-1/2 mt-4 ">
            <div class="flex flex-row-reverse ">
                <select name="" id="" wire:model.live ='numberRows'
                    class="w-1/6 p-2  border-gray-200 text-gray-900 text-base rounded-lg focus:border-1 focus:ring-orange-500 focus:border-orange-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-responsive w-full">
        <table class="table table-hover mt-10 ">
            <thead class="table-light">
                <tr>

                    <th>Cliente</th>
                    <th>Membresia</th>
                    <th>Estado</th>
                    <th>Monto</th>
                    <th>Fecha de pago</th>
                </tr>
            </thead>
            <tbody>
                @if ($transacciones->isEmpty())
                    <tr>
                        <td colspan="12">
                            <center>No hay resultados</center>
                        </td>
                    </tr>
                @else
                    @foreach ($transacciones as $key => $transaccion)
                        <tr>
                            <td>{{ $transaccion->nombre_cliente }}</td>
                            <td>{{ $transaccion->nombre_membresia }}</td>
                            <td>{{ $transaccion->status }}</td>
                            <td>$ {{ $transaccion->monto }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaccion->fecha_pago)->isoFormat(' DD-MM-YYYY') }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="w-full">
        {{ $transacciones->links() }}
    </div>
</div>
