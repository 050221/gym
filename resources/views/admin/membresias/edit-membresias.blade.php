<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    @if ($errors->any())
                        <div class="alert alert-warning mt-2" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold text-gray-600  mt-5 mb-4">Editar información</h1>
                        <hr class="border-2 mb-5">
                    </div>
                    <form action="{{ route('membresias.update', ['id' => $membresia->id]) }}">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-wrap">
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="mb-1">Membresia:</label>
                                <x-forms.input name="nombre_membresia" type="text"
                                    value="{{ $membresia->nombre_membresia }}" required />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="mb-1">Descripción:</label>
                                <x-forms.input name="descripcion" type="text" value="{{ $membresia->descripcion }}"
                                    required />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="mb-1">Duración:</label>
                                <x-forms.input name="duracion" type="text" value="{{ $membresia->duracion }}"
                                    required />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="mb-1">Precio:</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="precio" value="{{ $membresia->precio }}"
                                        class="block rounded-md  pl-6 pr-1 w-full border-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-2
                                        focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600
                                         shadow-sm"
                                        placeholder="0.00">
                                </div>
                            </div>
                            <div class="w-full flex justify-end my-3">
                                <x-forms.button-exit href="{{ route('membresias') }}" text="Cancelar" />
                                <x-forms.button text="Guardar" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
