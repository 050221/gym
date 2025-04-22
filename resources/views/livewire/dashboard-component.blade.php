<div class="mx-4 my-5">
    @can('admin.dashboard')
        <div>
            <p class="text-3xl text-gray-700 font-semibold">Panel de Gestión del Gimnasio</p>
            <hr class="border-2 rounded border-gray-300 mt-2" />
        </div>

        <div class="flex flex-wrap-reverse ">
            <div class="w-full md:w-3/4 ">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8 ">
                    <!-- Tarjeta: Número de Clientes -->
                    <div
                        class="p-5 bg-lime-500 text-white rounded-lg shadow-md transform transition-transform hover:scale-105">
                        <i class="material-icons text-4xl">groups</i>
                        <h3 class="text-2xl font-bold">Número de Clientes</h3>
                        <p class="text-xl">{{ $total_usuarios }}</p>
                        <p class="mt-1 text-sm">Total de clientes registrados</p>
                    </div>

                    <!-- Tarjeta: Clientes Activos -->
                    <div
                        class="p-5 bg-sky-500 text-white rounded-lg shadow-md transform transition-transform hover:scale-105">
                        <i class="material-icons text-4xl">check_circle</i>
                        <h3 class="text-2xl font-bold">Clientes Activos</h3>
                        <p class="text-xl">{{ $total_usuarios_activos }}</p>
                        <p class="mt-1 text-sm">Clientes con suscripción activa</p>
                    </div>

                    <!-- Tarjeta: Ventas Totales -->
                    <div
                        class="p-5 bg-yellow-500 text-white rounded-lg shadow-md transform transition-transform hover:scale-105">
                        <i class="material-icons text-4xl">shopping_cart</i>
                        <h3 class="text-2xl font-bold">Ventas Totales</h3>
                        <p class="text-xl">{{ $ventas_totales_año_formt, 2 }}</p>
                        <p class="mt-1 text-sm">Total generado en el año</p>
                    </div>

                    <!-- Tarjeta: Nuevas Suscripciones -->
                    <div
                        class="p-5 bg-purple-500 text-white rounded-lg shadow-md transform transition-transform hover:scale-105">
                        <i class="material-icons text-4xl">subscriptions</i>
                        <h3 class="text-2xl font-bold">Nuevas Suscripciones</h3>
                        <p class="text-xl">{{ $total_suscripciones_mes }}</p>
                        <p class="mt-1 text-sm">Clientes inscritos este mes</p>
                    </div>
                </div>

                <!-- Gráfica de Ventas -->
                <div wire:ignore>
                    <p class="mt-8 text-xl text-gray-700 font-semibold">Ventas Mensuales del Año</p>
                    <div class="chart-container flex justify-center" style="height: 50vh;">
                        <canvas id="totalVentasDeCadaMes"></canvas>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/4 px-4 md:px-4 mt-4 md:mt-0">
                <h2 class="text-2xl font-bold text-gray-700 mb-6 text-right">Suscripciones próximas <br> a vencer</h2>
                @livewire('components.suscripciones-proximas-vencer')
            </div>
        </div>



















        @assets
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets

        @script
            <script>
                const ctx = document.getElementById('totalVentasDeCadaMes');
                const total_ventas_meses = $wire.total_ventas_meses;

                const labels = total_ventas_meses.map(item => item.Day);
                const values = total_ventas_meses.map(item => item.Value);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Ventas por mes',
                            data: values,
                            backgroundColor: '#f97316',
                            borderColor: '#f97316',
                            borderWidth: 2,
                            hoverBackgroundColor: '#ff8c42',
                            hoverBorderColor: '#cc5803',
                            borderRadius: 5,
                            barThickness: 20,
                            maxBarThickness: 50,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#000',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(200, 200, 200, 0.2)'
                                },
                                ticks: {
                                    stepSize: 500,
                                    color: '#000',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    color: '#000',
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                enabled: true,
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                callbacks: {
                                    label: function(context) {
                                        return `Ventas: $${context.raw.toLocaleString('es-MX', { minimumFractionDigits: 2 })}`;
                                    }
                                }
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

                    <div class="w-full sm:w-1/2">
                        <div
                            class="block p-4 m-8 bg-lime-500 dark:bg-lime-600 rounded-lg shadow-md hover:shadow-lg transform transition-transform hover:scale-105">
                            <h3 class="text-2xl font-bold text-gray-200 dark:text-gray-600">Detalles de la Suscripción</h3>
                            <div class="mt-3 mb-3">
                                <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Fecha de
                                    inicio:</label>
                                <p class="text-lg  text-gray-600 dark:text-gray-100 ">
                                    {{ \Carbon\Carbon::parse($suscrip->fecha_inicio)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="block text-xl font-bold text-gray-100 dark:text-gray-200">Fecha de
                                    finalización:</label>
                                <p class="text-lg  text-gray-600 dark:text-gray-100">
                                    {{ \Carbon\Carbon::parse($suscrip->fecha_fin)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                                </p>
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
