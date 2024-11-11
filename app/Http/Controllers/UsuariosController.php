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

    // Método para actualizar la información de la suscripcion solo el status a ccancelada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'gender' => 'required|max:255',
            'phone' => 'required|max:12|unique:users,phone,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ], [
            'phone.unique' => 'El número de teléfono ya está en uso.',
            'email.unique' => 'El correo electrónico ya está en uso.',
        ]);
        

        $suscripcion = User::find($id);
        $suscripcion->name = $request->input('name');
        $suscripcion->firstname = $request->input('firstname');
        $suscripcion->lastname = $request->input('lastname');
        $suscripcion->gender = $request->input('gender');
        $suscripcion->phone = $request->input('phone');
        $suscripcion->email = $request->input('email');

        $suscripcion->save();
        return redirect()->route('clientes')->with('success', 'El usuario ha sido modificado correctamente');
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
