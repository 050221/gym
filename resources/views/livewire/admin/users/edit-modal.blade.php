<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Editar Usuario') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="user_id">
                <div class="mb-4 text-gray-500">
                    <x-label value="{{ __('Nombre:') }}" />
                    <x-input type="text" class="w-full" wire:model="name" />
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-wrap text-gray-500">
                    <div class="mb-4 w-full md:w-1/2">
                        <x-label value="{{ __('Apellido paterno:') }}" />
                        <x-input type="text" class="w-full" wire:model="firstname" />
                        @error('firstname')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2">
                        <x-label value="{{ __('Apellido materno:') }}" />
                        <x-input type="text" class="w-full" wire:model="lastname" />
                        @error('lastname')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="mb-4 w-full md:w-1/2 text-gray-500">
                        <x-label value="{{ __('Género:') }}" />
                        <x-forms.select  name="gender"  wire:model="gender" :options="['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Otro' => 'Otro']" />
                        @error('gender')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2 text-gray-500">
                        <x-label value="{{ __('Teléfono:') }}" />
                        <x-input type="text" class="w-full" placeholder="000-000-0000" wire:model="phone" />
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap ">
                    <div class="mb-4 w-full md:w-1/2 text-gray-500">
                        <x-label value="{{ __('Fecha de Nacimiento:') }}" />
                        <x-input type="date" max="2006-02-21" min="1924-02-21" class="w-full"
                            wire:model="birthdate" />
                        @error('birthdate')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2 text-gray-500">
                        <x-label value="{{ __('Correo Electronico:') }}" />
                        <x-input type="email" class="w-full" wire:model="email" />
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                   
                </div>
                <x-input type="hidden" class="w-full" wire:model="status" />
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="resetError" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="update" wire:loading.attr="disabled" wire:target="update">
                <span wire:loading.remove wire:target="update"> {{ __('Guardar') }} </span>
                <span wire:loading wire:target="update" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
