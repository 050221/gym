<div>
    <button wire:click="$set('open', 'true')"
        class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
        <i class="material-icons p-auto mr-1">add</i>
        <span class="hidden md:inline">Nueva Membresía</span>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Registrar Nueva Membresía') }}
            <p class="text-sm text-gray-500 mb-4">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios.
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-gray-500">
                <div class="flex">
                    <x-label value="{{ __('Nombre de la Membresía:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-input type="text" class="w-full" wire:model="nombre" placeholder="Ej. Membresía Premium" />
                @if ($errors->has('nombre'))
                    <span class="text-red-500">{{ $errors->first('nombre') }}</span>
                @endif
            </div>

            <div class="mb-4 text-gray-500">
                <div class="flex">
                    <x-label value="{{ __('Descripción:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-forms.text-area name="descripcion" wire:model="descripcion" placeholder="Escribe una descripción..."
                    rows="5" class="bg-gray-100" />
                @if ($errors->has('descripcion'))
                    <span class="text-red-500">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>

            <div class="mb-4 text-gray-500">
                <div class="flex">
                    <x-label value="{{ __('Duración de la Membresía:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-forms.select name="duracion_meses" :options="[
                    '' => 'Selecciona una duración',
                    'Visita' => 'Visita Única',
                    '1' => '1 mes',
                    '3' => '3 meses',
                    '6' => '6 meses',
                    '12' => '1 año',
                    '18' => '1 año y medio',
                    '24' => '2 años',
                ]" wire:model="duracion_meses" />
                @if ($errors->has('duracion_meses'))
                    <span class="text-red-500">{{ $errors->first('duracion_meses') }}</span>
                @endif
            </div>

            <div class="mb-4 text-gray-500">
                <div class="flex">
                    <x-label value="{{ __('Precio de la Membresía:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <x-input type="number" class="pl-6 pr-1" name="precio" min="0" wire:model="precio"
                        placeholder=" Ej. 500" />

                </div>
                @if ($errors->has('precio'))
                    <span class="text-red-500">{{ $errors->first('precio') }}</span>
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="resetForm" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                <span wire:loading.remove wire:target="save"> {{ __('Registrar Membresía') }} </span>
                <span wire:loading wire:target="save" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
