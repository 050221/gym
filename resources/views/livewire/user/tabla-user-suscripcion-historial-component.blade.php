<div id="tablas">

    <div class="flex flex-wrap">

        <div class="w-full ">
            <p class="text-4xl font-bold text-gray-500 dark:text-gray-600 ">Suscripcion</p>
            <center>
                <hr>
            </center>
        </div>

        @if ($suscripcion !== null && $suscripcion->count() > 0)
            @foreach ($suscripcion as $suscrip)
                <div class="w-full sm:w-1/2">
                    <div
                        class="block p-3 m-8 bg-sky-500 dark:bg-sky-600 shadow-lg rounded-lg  transform transition-transform hover:scale-110">

                        <h3 class="text-2xl font-bold text-gray-200 dark:text-gray-600 ">Detalles de la Membresía</h3>
                        <div class="mt-3 mb-3">
                            <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Nombre de la
                                membresia:</label>
                            <p class="text-lg  text-gray-600 dark:text-gray-100">
                                {{ $suscrip->nombre_membresia }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Descripción:</label>
                            <p class="text-lg  text-gray-600 dark:text-gray-100">
                                {{ $suscrip->descripcion }}</p>
                        </div>
                        <div class="mb-2">
                            <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Precio:</label>
                            <p class="text-lg text-gray-600  dark:text-gray-100">
                                {{ $suscrip->precio }}</p>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/2" ">
                    <div class="block p-4 m-8 bg-lime-500 dark:bg-lime-600 rounded-lg shadow-md hover:shadow-lg transform transition-transform hover:scale-105">

                        <h3 class="text-2xl font-bold text-gray-200 dark:text-gray-600">Detalles de la Suscripción</h3>
                        <div class="mt-3 mb-3">
                            <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Fecha de inicio:</label>
                            <p class="text-lg  text-gray-600 dark:text-gray-100 ">
                                {{ \Carbon\Carbon::parse($suscrip->fecha_inicio)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Fecha de finalización:</label>
                            <p class="text-lg  text-gray-600 dark:text-gray-100">
                                {{ \Carbon\Carbon::parse($suscrip->fecha_fin)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
                        </div>
                    </div>
                    
                    
                </div>
     @endforeach
                @else
                    <p class="text-lg text-red-600">No tienes una suscripción actualmente.</p>
            @endif

    </div>


    <div class="flex flex-wrap mt-12">
        <div class="w-full ">
            <p class="text-3xl font-bold text-gray-500 dark:text-gray-600 ">Mi Historial</p>
        </div>


        <div class="w-full sm:w-1/2">
            <div class="w-1/2 center-content">
                <input wire:model.live='search' type="text" class="btn-busqueda" placeholder="Buscar..."">
            </div>
        </div>

        <div class="w-full sm:w-1/2">
            <div class="flex flex-row-reverse mt-3">
                <select name="" id="" wire:model.live ='numberRows'
                    class="w-1/4 p-2.5  border-gray-200 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
            </div>

        </div>



        <div class="table-responsive w-full">
            <table class="table table-hover mt-10 ">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Membresia</th>
                        <th>Costo</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($historialSuscripciones->isEmpty())
                        <tr>
                            <td colspan="12">
                                <center>No hay resultados</center>
                            </td>
                        </tr>
                    @else
                        @foreach ($historialSuscripciones as $key => $historialSuscripcion)
                            <tr>
                                <th>{{ $key + 1 + $historialSuscripciones->perPage() * ($historialSuscripciones->currentPage() - 1) }}
                                </th>
                                <td>{{ $historialSuscripcion->nombre_membresia }}</td>
                                <td>{{ $historialSuscripcion->precio }}</td>
                                <td>{{ \Carbon\Carbon::parse($historialSuscripcion->fecha_inicio)->format('d/m/Y') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($historialSuscripcion->fecha_fin)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="w-full">
            {{ $historialSuscripciones->links() }}
        </div>

    </div>
</div>
