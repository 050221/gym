<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Editar la Suscripción') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit="update">
                <input type="hidden" wire:model="suscripcion_id">
                <div class="flex flex-wrap ">
                    <div class="w-full flex sm:w-1/2 mb-6">
                        <div class="p-2 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                            <i class="material-icons text-blue-600 text-4xl">person</i>
                        </div>
                        <div>
                            <x-label value="{{ __('Nombre del Cliente ') }}" />
                            <span class="w-full text-lg ">{{ $user_name }}</span>
                        </div>
                    </div>
                    <div class="w-full flex sm:w-1/2 mb-6">
                        <div class="p-2 bg-yellow-100 rounded-lg flex items-center justify-center mr-2">
                            <i class="material-icons text-yellow-600 text-4xl">fitness_center </i>
                        </div>
                        <div>
                            <x-label value="{{ __('Nombre de la Membresía') }}" />
                            <x-input type="hidden" class="w-full" wire:model.live="membresia_id" />
                            <span class="w-full text-lg ">{{ $membresia_name }}</span>
                        </div>
                    </div>
                </div>

                <div class="w-full mb-6">
                    <x-label value="{{ __('Fecha de inicio') }}" />
                    <x-input type="date" class="w-full"  wire:model.live="fecha_inicio" />
                </div>
                <div class="w-full mb-6">
                    <x-label value="{{ __('Fecha de finalización') }}" />
                    <x-input type="date" class="w-full" min="{{ $fecha_inicio ?? $date_now }}"
                        wire:model.live="fecha_fin" />
                </div>
                <div class="flex w-full lg:w-1/2 mb-4 lg:mb-0">
                    <x-label value="{{ __('Estado') }}" />
                    <x-input type="hidden" wire:model="status" />
                    <x-forms.switchStatus :status="$status" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="closeModal" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                <span wire:loading.remove wire:target="update"> {{ __('Editar Suscripción') }} </span>
                <span wire:loading wire:target="update" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
