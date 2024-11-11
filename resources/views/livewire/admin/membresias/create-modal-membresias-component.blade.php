<div>
    <button wire:click="$set('open','true')"
        class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
        <i class="material-icons p-auto mr-1">add</i>
        <span class="hidden md:inline">Agregar</span>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Nueva membresia') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-gray-500 ">
                <x-label value="{{ __('Membresia:') }}" />

                <x-input type="text" class="w-full" wire:model.defer="nombre_membresia" />
                @if ($errors->has('nombre_membresia'))
                    <span class="text-red-500">{{ $errors->first('nombre_membresia') }}</span>
                @endif

            </div>
            <div class="mb-4 text-gray-500">
                <x-label value="{{ __('Descripción:') }}" />
                <x-input type="text" class="w-full" wire:model.defer="descripcion" />
                @if ($errors->has('descripcion'))
                    <span class="text-red-500">{{ $errors->first('descripcion') }}</span>
                @endif

            </div>
            <div class="mb-4 text-gray-500">
                <x-label value="{{ __('Duración de la membresía:') }}" />
                <select wire:model.defer="duracion"
                    class="bg-gray-50 border-gray-300 text-gray-900 text-base rounded-lg focus:border-2 focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Selecciona una opción</option>
                    <option value="1 Mes">1 Mes</option>
                    <option value="3 Meses">3 Meses</option>
                    <option value="6 Meses">6 Meses</option>
                    <option value="12 Meses">12 Meses</option>
                    <option value="18 Meses">18 Meses</option>
                    <option value="24 Meses">24 Meses</option>
                </select>
                @if ($errors->has('duracion'))
                    <span class="text-red-500">{{ $errors->first('duracion') }}</span>
                @endif
            </div>
            <div class="mb-4 text-gray-500">
                <x-label value="{{ __('Precio:') }}" />
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="number" name="precio" wire:model.defer="precio"
                        class="block rounded-md  pl-6 pr-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-2
                        focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600
                         shadow-sm"
                        placeholder="0.00">
                </div>
                @if ($errors->has('precio'))
                    <span class="text-red-500">{{ $errors->first('precio') }}</span>
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="$set('open', false)" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save">Agregar </x-button>

        </x-slot>
    </x-dialog-modal>

</div>
