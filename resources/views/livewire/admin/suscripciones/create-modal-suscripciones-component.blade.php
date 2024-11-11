<div>
    <button wire:click="$set('open','true')"
    class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
    <i class="material-icons p-auto mr-1">add</i>
    <span class="hidden md:inline">Agregar</span>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Nueva suscripción') }}
        </x-slot>

        <x-slot name="content">

            <div class="mb-4 text-gray-500 w-full">
                <x-label for="user_id" value="{{ __('Teléfono:') }}" />
                <select id="user_id" wire:model.defer="user_id"
                    class=" bg-gray-50  border-gray-400 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                    <option selected>Selecciona al cliente</option>
                    @foreach ($clientes as $cliente)
                        <option class=" focus:outline-none focus:bg-red-500" value="{{ $cliente->id }}">
                            {{ $cliente->name . ' ' . $cliente->firstname . ' ' . $cliente->lastname }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                    <span class="text-red-500">{{ $errors->first('user_id') }}</span>
                @endif

            </div>
            <div class="mb-4 text-gray-500 w-full">
                <x-label for="membresia_id" value="{{ __('Membresia:') }}" />
                <select id="membresia_id" wire:model.defer="membresia_id"
                    class="bg-gray-50 border-gray-400 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Selecciona una membresia</option>
                    @foreach ($membresias as $membresia)
                        <option value="{{ $membresia->id }}">{{ $membresia->nombre_membresia }}</option>
                    @endforeach
                </select>
                @if ($errors->has('membresia_id'))
                    <span class="text-red-500">{{ $errors->first('membresia_id') }}</span>
                @endif
            </div>

            <div class="flex flex-wrap">
                <div class="mb-4 w-full md:w-1/2">
                    <x-label for="fecha_inicio" value="{{ __('Fecha de Inicio:') }}" />
                    <input type="date" name="fecha_inicio" wire:model="fecha_inicio"
                        class="py-2.5 bg-gray-50  border-gray-400 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                    @if ($errors->has('fecha_inicio'))
                        <span class="text-red-500">{{ $errors->first('fecha_inicio') }}</span>
                    @endif
                </div>
                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2">
                    <x-label for="fecha_fin" value="{{ __('Fecha de Finalización:') }}" />
                    <input type="date" name="fecha_fin" wire:model.defer="fecha_fin"
                        class="py-2.5 bg-gray-50  border-gray-400 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    @if ($errors->has('fecha_fin'))
                        <span class="text-red-500">{{ $errors->first('fecha_fin') }}</span>
                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="$set('open', false)">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save">Agregar </x-button>

        </x-slot>
    </x-dialog-modal>

</div>
