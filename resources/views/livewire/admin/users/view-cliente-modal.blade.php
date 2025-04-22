<div>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ __('Detalles del Cliente') }}
            <hr class="border-3 border-orange-600 mt-3">
        </x-slot>

        <x-slot name="content">

            <div class="grid gap-4 mt-6 grid-cols-1 md:grid-cols-2">
                <div class="flex items-center gap-4">
                    <div class="p-2 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-blue-600 text-4xl">person</i>
                    </div>
                    <div>
                        <x-label value="Nombre del Cliente" />
                        <span class="w-full text-lg ">{{ $name }} {{ $firstname }} {{ $lastname }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="p-2 bg-indigo-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-indigo-600 text-4xl">sentiment_satisfied</i>
                    </div>
                    <div>
                        <x-label value="Género" />
                        <span class="w-full text-lg ">{{ $gender }} </span>
                    </div>
                </div>


                <div class="flex items-center gap-4">
                    <div class="p-2 bg-green-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-green-600 text-4xl">phone</i>
                    </div>
                    <div>
                        <x-label value="Teléfono" />
                        <span class="w-full text-lg ">{{ $phone }} </span>
                    </div>
                </div>


                <div class="flex items-center gap-4">
                    <div class="p-2 bg-yellow-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-yellow-600 text-4xl">cake</i>
                    </div>
                    <div>
                        <x-label value="Fecha de Nacimiento" />
                        <span class="w-full text-lg ">{{ $birthdate }} </span>
                    </div>
                </div>



                <div class="flex items-center gap-4">
                    <div class="p-2 bg-orange-100 rounded-lg flex items-center justify-center mr-2">
                        <i class="material-icons text-orange-600 text-4xl">email</i>
                    </div>
                    <div>
                        <x-label value="Correo Electrónico" />
                        <span class="w-full text-lg ">{{ $email }} </span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="">
                        <div><x-label value="Estado " /></div>
                        <div class="px-4 py-2">
                            <x-forms.status-button status="{{ $status }}" />
                        </div>
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-buttonExit wire:click="cerrar" class="mx-1">Cancelar</x-buttonExit>
        </x-slot>
    </x-dialog-modal>
</div>
