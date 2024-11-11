<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    @if ($errors->any())
                        <div class="alert alert-warning" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold text-gray-600  mt-5 mb-4">Editar suscripción</h1>
                        <hr class="border-2 mb-5">
                    </div>
                    <form action="{{ route('suscripciones.update', ['id' => $suscripcion->id]) }}">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-wrap">
                            <div class="w-full md:full px-3 mb-6">
                                <label class="block mb-1">Cliente:</label>
                                <input type="text" class="pointer-events-none border rounded-md py-2 px-3 bg-gray-200 text-gray-500 leading-tight focus:outline-none w-full"  value="{{ $suscripcion->nombre_cliente}}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block mb-1">Membresia:</label>
                                <input type="text" class="pointer-events-none border rounded-md py-2 px-3 bg-gray-200 text-gray-500 leading-tight focus:outline-none w-full"  value=" {{ $suscripcion->nombre_membresia }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block mb-1"">Estado:</label>
                                <select name="status" id="status"
                                    class="bg-gray-50 border-gray-400 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    required>
                                    <option value="{{ $suscripcion->status }}" selected>{{ $suscripcion->status }}
                                    </option>
                                    <option value="Cancelada">Cancelar</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block mb-1">Fecha inicio:</label>
                                <input type="date" class="pointer-events-none border rounded-md py-2 px-3 bg-gray-200 text-gray-500 leading-tight focus:outline-none w-full"  value="{{ $suscripcion->fecha_inicio }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block mb-1">Fecha terminal:</label>
                                <input type="date" class="pointer-events-none border rounded-md py-2 px-3 bg-gray-200 text-gray-500 leading-tight focus:outline-none w-full"  value="{{ $suscripcion->fecha_fin }}">
                            </div>
                           
                        </div>
                        <div class="flex justify-end my-3">
                            <x-forms.button-exit href="{{ route('suscripciones') }}" text="Cancelar" />
                            <x-forms.button text="Guardar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
