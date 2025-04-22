<div>
    <div class="w-full space-y-4">
        @if ($suscripciones->count() > 0)
            @foreach ($suscripciones as $index => $suscripcion)
                <div
                    class="rounded-lg shadow-md border border-gray-300 overflow-hidden bg-white hover:shadow-lg transition-shadow">
                    {{-- Encabezado del acordeón --}}
                    <button wire:click="togglePanel({{ $index }})"
                        class="w-full flex justify-between items-center p-2 text-left font-medium transition-all duration-300 
                    {{ $openPanel === $index ? 'bg-orange-50 text-orange-700' : 'hover:bg-gray-100' }}"
                        aria-expanded="{{ $openPanel === $index ? 'true' : 'false' }}"
                        aria-controls="panel-{{ $index }}">
                        <p class="text-base font-semibold">
                            {{ $suscripcion->user->fullname ?? 'Miembro desconocido' }}
                        </p>
                        <div class="flex items-center">
                            @if ($openPanel === $index)
                                {{-- Flecha hacia arriba (indicando que está abierto) --}}
                                <i class="material-icons text-orange-600 text-4xl">keyboard_arrow_up</i>
                            @else
                                {{-- Flecha hacia abajo (indicando que se puede expandir) --}}
                                <i class="material-icons text-orange-600 text-4xl">keyboard_arrow_down</i>
                            @endif
                        </div>
                    </button>

                    {{-- Panel del acordeón --}}
                    @if ($openPanel === $index)
                        <div id="panel-{{ $index }}"
                            class="p-6 bg-gray-50 text-gray-700 transition-all duration-300 ease-in-out">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Membresia:</span>
                                    <span>{{ $suscripcion->membresia->nombre ?? 'No especificado' }}</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Fecha de Vencimiento:</span>
                                    <span>{{ \Carbon\Carbon::parse($suscripcion->fecha_fin)->isoFormat('DD-MMMM-YYYY') }}</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Estado:</span>
                                    <span>{{ $suscripcion->status }}</span>
                                </li>
                                {{-- Aquí puedes agregar más detalles según tus necesidades 
                                <li class="flex items-center justify-end mt-4">
                                    <a href=""
                                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg shadow-md hover:shadow-lg hover:from-orange-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 flex items-center gap-2 transition-all duration-300"
                                        aria-label="Ver detalles de la suscripción de {{ $suscripcion->user_id ?? 'miembro desconocido' }}">
                                       
                                        <span class="material-icons material-symbols-outlined ">
                                            info
                                        </span>
                                        Ver detalles
                                    </a>
                                </li>
                                --}}
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="text-center text-gray-500 bg-gray-100 p-6 rounded-lg">
                <p class="text-lg font-medium">No hay suscripciones próximas a vencer</p>
                <p class="text-sm">Verifica más tarde para ver actualizaciones.</p>
            </div>
        @endif
    </div>
    <div class="mt-4">
        {{ $suscripciones->links() }}
    </div>
</div>
