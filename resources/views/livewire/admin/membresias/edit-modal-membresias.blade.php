<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Edición de la Membresía') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="user_id">

                <div class="w-full mb-6">
                    <x-label value="{{ __('Nombre de la Membresía') }}" />
                    <x-input type="text" class="w-full" wire:model="nombre" />
                    @if ($errors->has('nombre'))
                        <span class="text-red-500">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
                <div class="w-full  mb-6">
                    <x-label value="{{ __('Descripción') }}" />
                    <x-forms.text-area name="descripcion" wire:model="descripcion"
                        placeholder="Escribe una descripción..." rows="5" class="bg-gray-100" />
                    @if ($errors->has('descripcion'))
                        <span class="text-red-500">{{ $errors->first('descripcion') }}</span>
                    @endif
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 mb-4 lg:mb-0">
                        <x-label value="{{ __('Duración en Meses') }}" />
                        <x-forms.select name="duracion_meses" classes="w-full " :options="[
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
                    <div class="w-full mb-4 lg:w-1/2 pl-0 lg:pl-3">
                        <x-label value="{{ __('Precio de la Membresía') }}" />
                        <x-input name="precio" type="number" min="0" wire:model.live="precio" />
                        @if ($errors->has('precio'))
                            <span class="text-red-500">{{ $errors->first('precio') }}</span>
                        @endif
                    </div>
                </div>


            </form>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="$set('open', false)" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                <span wire:loading.remove wire:target="update"> {{ __('Guardar') }} </span>
                <span wire:loading wire:target="update" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
