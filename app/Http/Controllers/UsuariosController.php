<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\suscripciones;


class UsuariosController extends Controller
{
    // Método para mostrar la lista de las suscripciones
    public function index()
    {
        return view('admin.clientes.tabla-clientes');
    }

    // Método para mostrar el formulario de edición de la suscripcion)
    public function edit($id)
    {
        $user = User::where("id", $id)->first();

        return view('admin.clientes.edit-cliente', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {

    }

    // Método para eliminar una suscripcion
    public function destroy($id)
    {

        $user = User::find($id);
        // Verificar si el usuario tiene suscripciones activas
        $suscripcion = $user->suscripciones()->count();

        if ($suscripcion > 0) {
            // Mostrar un mensaje de advertencia o realizar alguna acción alternativa
            return redirect()->back()->with('danger', 'No se puede eliminar este usuario porque tiene una suscripción activa.');
        } else {
            $user->delete();
            return redirect()->route('clientes')->with('success', 'Se ha eliminado correctamente');
        }
    }


}
