<div>

    <button wire:click="$set('open','true')" 
    class="inline-flex items-center mx-1 bg-orange-500 dark:bg-orange-400 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-0.5">
    <i class="material-icons p-auto mr-1">add</i>
    <span class="hidden md:inline">Agregar</span>
    </button>

    <x-dialog-modal wire:model="open" >
        <x-slot name="title">
            {{ __('Nuevo usuario') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 text-gray-500 " >
               <x-label value="{{ __('Nombre:') }}" />
               <x-input type="text" class="w-full" wire:model.defer="name" />
               @if ($errors->has('name'))
               <span class="text-red-500">{{ $errors->first('name') }}</span>
               @endif
            </div>

            <div class="flex flex-wrap text-gray-500">
                <div class="mb-4 w-full md:w-1/2 " >  
                    <x-label value="{{ __('Apellido paterno:') }}" />
                  <x-input type="text" class="w-full" wire:model.defer="firstname" />
                  @if ($errors->has('firstname'))
                    <span class="text-red-500">{{ $errors->first('firstname') }}</span>
                  @endif
                </div>
                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2" >
                  <x-label value="{{ __('Apellido materno:') }}" />
                  <x-input type="text" class="w-full" wire:model.defer="lastname" />
                  @if ($errors->has('lastname'))
                    <span class="text-red-500">{{ $errors->first('lastname') }}</span>
                  @endif
                </div>
              </div>

              <div class="flex flex-wrap">
                <div class="mb-4 w-full md:w-1/2 text-gray-500 " >
                    <x-label value="{{ __('Género:') }}" />
                    <select id="gender" wire:model.defer="gender" class="py-2 w-full bg-gray-50 border-gray-400 text-gray-900 text-base rounded-lg focus:border-1 focus:ring-orange-500 focus:border-orange-500 block  p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option class="mr-4" selected>Selecciona</option>
                        <option class="mr-4" value="masculino">Masculino</option>
                        <option class="mr-4" value="femenino">Femenino</option>
                        <option class="mr-4" value="Otro">Otro</option>
                    </select>
                    @if ($errors->has('gender'))
                    <span class="text-red-500">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                <div class="mb-4 pl-0 md:pl-3 w-full md:w-1/2 text-gray-500" >
                    <x-label value="{{ __('Teléfono:') }}" />
                    <x-input type="text" class="w-full" placeholder="000-000-0000" wire:model.defer="phone" />
                    @if ($errors->has('phone'))
                    <span class="text-red-500">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
             <div class="mb-4 text-gray-500" >
                <x-label value="{{ __('Correo:') }}" />
                <x-input type="email" class="w-full" wire:model.defer="email" />
                @if ($errors->has('email'))
                <span class="text-red-500">{{ $errors->first('email') }}</span>
                 @endif

             </div>
             <div class="mb-4 text-gray-500"  >
                <x-label value="{{ __('Contraseña:') }}" />
                <x-input type="password" class="w-full" wire:model.defer="password" />
                @if ($errors->has('password'))
                    <span class="text-red-500">{{ $errors->first('password') }}</span>
                @endif

            </div>
            
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="$set('open', false)" class="mx-1">Cancelar</x-buttonExit>
            <x-button type="submit" wire:click="save">Agregar </x-button>
            
        </x-slot>
    </x-dialog-modal>
    
</div>

