<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    @if ($errors->any())       
                        <div class="alert alert-warning" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>       
                                @endforeach
                            </ul>
                        </div> 
                    @endif
                    <div>
                        <h1 class="text-3xl font-bold text-gray-600  mt-5 mb-4">Editar datos</h1>
                        <hr class="border-2 mb-4">
                    </div>
                    <form action="{{ route('clientes.update', ['id' => $user->id]) }}">
                        @method("PUT")
                        @csrf
                    
                        <div class="flex flex-wrap">
                            <div class="mb-3 w-full md:w-4/12">
                                <label for="name" class="block mb-1">Nombre:</label>
                                <x-forms.input name="name" type="text" value="{{ $user->name }}" required class="w-full " />
                            </div>
                            <div class="mb-3 pl-0 md:pl-3 w-full md:w-4/12">
                                <label for="firstname" class="block mb-1">Apellido paterno:</label>
                                <x-forms.input name="firstname" type="text" value="{{ $user->firstname }}" required class="w-full " />
                            </div>
                            <div class="mb-3 pl-0 md:pl-3 w-full md:w-4/12">
                                <label for="lastname" class="block mb-1">Apellido materno:</label>
                                <x-forms.input name="lastname" type="text" value="{{ $user->lastname }}" required class="w-full " />
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="mb-3  w-full md:w-1/2">
                                <label for="gender" class="block mb-1">Género:</label>
                                <x-forms.input name="gender" type="text" value="{{ $user->gender }}" required class="w-full " />
                            </div>
                            <div class="mb-3 pl-0 md:pl-3  w-full md:w-1/2">
                                <label for="phone" class="block mb-1">Teléfono:</label>
                                <x-forms.input name="phone" type="text" value="{{ $user->phone }}" required class="w-full " />
                            </div>
                            <div class="mb-3  w-full md:w-1/2">
                                <label for="email" class="block mb-1">Correo electrónico:</label>
                                <x-forms.input name="email" type="email" value="{{ $user->email }}" required class="w-full " />
                            </div>
                            <div class="mb-3 pl-0 md:pl-3 w-full md:w-1/2">
                                <label for="password" class="block mb-1">Contraseña:</label>
                                <x-forms.input name="password" type="password" value="{{ $user->password }}" required class="w-full " />
                            </div>
                        </div>
                        
                        <div class="flex justify-end my-3">
                            <x-forms.button-exit href="{{ route('clientes') }}" text="Cancelar" />
                            <x-forms.button text="Guardar" />
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>