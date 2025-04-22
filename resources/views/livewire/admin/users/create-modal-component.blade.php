<div>

    <button wire:click="$set('open','true')"
        class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
        <i class="material-icons p-auto mr-1">add</i>
        <span class="hidden md:inline">Agregar Cliente</span>
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Registrar Nuevo Cliente') }}
            <p class="text-sm text-gray-500 mb-4">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios.
            </p>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-gray-500 ">
             <div class="flex">
                <x-label value="{{ __('Nombre(s):') }}" />
                <span class="text-red-500">*</span>
             </div>
                <x-input type="text" class="w-full" wire:model="name" />
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="flex flex-wrap text-gray-500">
                <div class="mb-4 w-full md:w-1/2 ">
                    <x-label value="{{ __('Apellido paterno:') }}" />
                    <x-input type="text" class="w-full" wire:model="firstname" />
                    @if ($errors->has('firstname'))
                        <span class="text-red-500">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2">
                    <x-label value="{{ __('Apellido materno:') }}" />
                    <x-input type="text" class="w-full" wire:model="lastname" />
                    @if ($errors->has('lastname'))
                        <span class="text-red-500">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="mb-4 w-full md:w-1/2 text-gray-500 ">
                    <div class="flex">
                        <x-label value="{{ __('Género:') }}" />
                    <span class="text-red-500">*</span>
                    </div>
                    <x-forms.select name="gender" wire:model="gender" :options="[
                        '' => 'Selecciona un genero',
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                        'Otro' => 'Otro',
                    ]" />
                    @if ($errors->has('gender'))
                        <span class="text-red-500">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2 text-gray-500">
                    <x-label value="{{ __('Teléfono:') }}" />
                    <x-input type="text" class="w-full" maxlength="12" placeholder="000-000-0000"
                        wire:model="phone" />

                    @if ($errors->has('phone'))
                        <span class="text-red-500">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-4 text-gray-500">
                <div class="flex">
                    <x-label value="{{ __('Correo Electronico:') }}" />
                    <span class="text-red-500">*</span>
                </div>
                <x-input type="email" class="w-full" wire:model="email" />
                @if ($errors->has('email'))
                    <span class="text-red-500">{{ $errors->first('email') }}</span>
                @endif

            </div>
            <div class="mb-4 text-gray-500">
                <x-label value="{{ __('Fecha de Nacimiento:') }}" />
                <x-input type="date" max="{{ now()->subYears(18)->format('Y-m-d') }}" min="1924-02-21"
                    class="w-full" wire:model="birthdate" />
                @if ($errors->has('birthdate'))
                    <span class="text-red-500">{{ $errors->first('birthdate') }}</span>
                @endif
            </div>

            {{--
             <div class="mb-4 text-gray-500"  >
                <x-label value="{{ __('Contraseña:') }}" />
                <x-input type="password" class="w-full" wire:model.defer="password" />
                @if ($errors->has('password'))
                    <span class="text-red-500">{{ $errors->first('password') }}</span>
                @endif

            </div> --}}

        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="resetForm" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save" wire:loading.attr="disabled" wire:target="save">
                <span wire:loading.remove wire:target="save"> {{ __('Agregar Cliente') }} </span>
                <span wire:loading wire:target="save" class="animate-spin">⏳</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
