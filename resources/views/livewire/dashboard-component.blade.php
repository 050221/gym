<div class="mx-4 my-5 ">
    @can('admin.dashboard')
        <div>
            <p class="text-3xl text-gray-400 font-medium">Panel de Gestión del Gimnasio </p>
            <hr class="border-3 rounded border-zinc-400 mt-2 h-1" />
        </div>

        <div class="flex flex-wrap mt-8">

            <div class="w-full sm:w-1/2">
                <div class="block p-2 m-3 bg-lime-500 rounded-lg transform transition-transform hover:scale-105">
                    <h3 class="text-2xl font-bold text-white dark:text-gray-700">Número de clientes</h3>
                    <p class="text-gray-200 dark:text-gray-200 text-xl">{{ $total_usuarios }}</p>
                    <p class="mt-2 text-gray-100 dark:text-gray-200 text-sm">Total de clientes registrados.</p>


                </div>
            </div>

            <div class="w-full sm:w-1/2">
                <div class="block p-2 m-3 bg-sky-500 rounded-lg transform transition-transform hover:scale-105">
                    <h3 class="text-2xl font-bold text-white dark:text-gray-700">Clientes activos</h3>
                    <p class="text-gray-200 dark:text-gray-200 text-xl">{{ $total_usuarios_activos }}</p>
                    <p class="mt-2 text-gray-100 dark:text-gray-200 text-sm">Total clientes con una suscripción.</p>
                </div>
            </div>

            

        </div>

        <div wire:ignore>
            <p class=" mt-8 text-xl text-gray-400 font-medium">Ventas Mensuales del Año Actual</p>
            <div class="chart-container flex justify-center" style="position: relative; height:50vh; ">
                <canvas id="totalVentasDeCadaMes"></canvas>
            </div>
            
        </div>

        @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets

        @script
        <script>
            const ctx = document.getElementById('totalVentasDeCadaMes');
            const total_ventas_meses=$wire.total_ventas_meses;

           const labels=total_ventas_meses.map(item=>item.Day);
           const values=total_ventas_meses.map(item=>item.Value);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# Ventas por mes',
                        data: values,
                        borderColor: '#f97316',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        @endscript




     

    @endcan

    @can('user.dashboard')
        <div class="flex flex-wrap">

            <div class="w-full ">
                <p class="text-4xl font-bold text-gray-500 dark:text-gray-600 ">Suscripción</p>
                <center>
                    <hr class="border-2 mt-2 border-gray-600">
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
                <div class="w-full mt-4 ">
                    <input wire:model.live='search' type="text"
                        class="p-2.5 rounded-md border border-gray-300 shadow-md hover:bg-gray-200 focus:ring-offset-2 focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all duration-300 "
                        placeholder="Buscar...">
                </div>
            </div>

            <div class="w-full sm:w-1/2">
                <div class="flex flex-row-reverse mt-4">
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
                                    <td>{{ $historialSuscripcion->nombre_membresia }}</td>
                                    <td>$ {{ $historialSuscripcion->precio }}</td>
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
    @endcan
</div>
