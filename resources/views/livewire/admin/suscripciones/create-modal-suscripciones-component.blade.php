<div>
    <button wire:click="$set('open','true')"
        class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
        <i class="material-icons p-auto mr-1">add</i>
        <span class="hidden md:inline">Agregar Suscripción</span>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Registrar Nueva Suscripción') }}
            <p class="text-sm text-gray-500 mb-4">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios.
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-gray-500 w-full">
                <div class="flex">
                    <x-label for="user_id" value="{{ __('Cliente:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-forms.select name="user_id" :options="$clientes->pluck('name', 'id')" :selected="$user_id" wire:model="user_id"
                    defaultOption="Selecciona un cliente" />
                @if ($errors->has('user_id'))
                    <span class="text-red-500">{{ $errors->first('user_id') }}</span>
                @endif
            </div>

            <div class="mb-4 text-gray-500 w-full">
                <div class="flex">
                    <x-label for="membresia_id" value="{{ __('Membresía:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-forms.select name="membresia_id" :options="$membresias->pluck('nombre', 'id')" :selected="$membresia_id" wire:model.live="membresia_id"
                    defaultOption="Selecciona una membresía" />
                @if ($errors->has('membresia_id'))
                    <span class="text-red-500">{{ $errors->first('membresia_id') }}</span>
                @endif
            </div>

            <div class="flex flex-wrap">
                <div class="mb-4 w-full md:w-1/2">
                    <div class="flex">
                    <x-label for="fecha_inicio" value="{{ __('Inicio de la membresía:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                    <x-input type="date" name="fecha_inicio" wire:model.live="fecha_inicio" />
                    @if ($errors->has('fecha_inicio'))
                        <span class="text-red-500">{{ $errors->first('fecha_inicio') }}</span>
                    @endif
                </div>

                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2">
                    <div class="flex">
                        <x-label for="fecha_fin" value="{{ __('Fin de la membresía:') }}" />
                        <span class="text-red-500">*</span>
                    </div>
                    <x-input type="date" name="fecha_fin" min="{{ $fecha_inicio ?? $date_now }}" wire:model.live="fecha_fin" />
                    @if ($errors->has('fecha_fin'))
                        <span class="text-red-500">{{ $errors->first('fecha_fin') }}</span>
                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="resetForm" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                <span wire:loading.remove wire:target="save"> {{ __('Agregar Suscripción') }} </span>
                <span wire:loading wire:target="save" class="animate-spin">⏳</span>
            </x-button>

        </x-slot>
    </x-dialog-modal>
</div>
