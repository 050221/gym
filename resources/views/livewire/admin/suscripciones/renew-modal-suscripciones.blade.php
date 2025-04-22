<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Renovar Suscripción') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="renew">
                <input type="hidden" wire:model="suscripcion_id">

                <div class="w-full flex mb-6">
                    <div class="p-2 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-blue-600 text-4xl">person</i>
                    </div>
                    <div>
                        <x-label value="Nombre del Cliente" />
                    <span class="w-full text-lg ">{{ $user_name }}</span>
                    </div>
                </div>
                

                <div class="w-full mb-6">
                    <x-label value="Nombre de la Membresía" />
                    <x-forms.select name="membresia_id" :options="$membresias ? $membresias->pluck('nombre', 'id') : []" :selected="$membresia_id" wire:model.live="membresia_id" />

                    @error('membresia_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-6">
                    <x-label value="Fecha de inicio" />
                    <x-input type="date" class="w-full" min="{{ $date_now }}" wire:model.live="fecha_inicio" />
                    @error('fecha_inicio')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-6">
                    <x-label value="Fecha de finalización" />
                    <x-input type="date" class="w-full" min="{{ $fecha_inicio ?? $date_now }}"
                        wire:model.live="fecha_fin" />
                    @error('fecha_fin')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    {{$date_now}}
                </div>
                <div class="w-full flex mb-6">
                    <x-label value="{{ __('Estado') }}" />
                    <x-forms.switchStatus :status="$status" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="closeModal" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="renew" wire:loading.attr="disabled" wire:target="renew">
                <span wire:loading.remove wire:target="renew"> {{ __('Renovar Membresía') }} </span>
                <span wire:loading wire:target="renew" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
