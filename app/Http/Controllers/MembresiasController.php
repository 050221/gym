<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\membresias;

class MembresiasController extends Controller
{
    // Método para mostrar la lista de las membresias
    public function index()
    {
        return view('admin.membresias.tabla-membresias');
    }

    // Método para mostrar el formulario de edición de una membresia
    public function edit($id){
        $membresia = membresias::where ("id",$id)->first();

        return view('admin.membresias.edit-membresias', ['membresia' => $membresia]);
    }

    // Método para actualizar la información de la suscripcion solo el status a ccancelada
    public function update(Request $request, $id){
        $request->validate([
            'nombre_membresia' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'duracion' => 'required|max:255',
            'precio' => 'required|max:255',
           
        ],[
            'email.unique' => 'El correo electrónico ya está en uso',
        ]);
            $membresia = membresias::find($id);
            $membresia->nombre_membresia = $request->input('nombre_membresia');
            $membresia->descripcion = $request->input('descripcion');
            $membresia->duracion = $request->input('duracion');
            $membresia->precio = $request->input('precio');
           
            $membresia->save();
            return redirect()->route('membresias')->with('success', 'La membresia ha sido modificado correctamente');
    }

    // Método para eliminar una suscripcion
    public function destroy($id){
        $suscripcion = membresias::find($id);
        $suscripcion->delete();
        return redirect()->route('membresias')->with('success', 'Se ha eliminado correctamente');
    }
}
