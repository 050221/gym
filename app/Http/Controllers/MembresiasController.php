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
    public function edit($id)
    {
        $membresia = membresias::where("id", $id)->first();

        return view('admin.membresias.edit-membresias', ['membresia' => $membresia]);
    }


    public function update(Request $request, $id) {}


    public function destroy($id)
    {
        $membresia  = membresias::find($id);

        // Verifica si la membresía existe
        if (!$membresia) {
            return redirect()->route('membresias')->with('error', 'Membresía no encontrada.');
        }

        // Verifica si existen suscripciones asociadas a esta membresía
        $suscripciones = $membresia->suscripciones()->count();

        // Si existen suscripciones, no se puede eliminar
        if ($suscripciones > 0) {
            return redirect()->route('membresias')->with('error', 'No se puede eliminar esta membresía, ya tiene suscripciones asociadas.');
        }

        // Si no hay suscripciones, elimina la membresía
        $membresia->delete();
        return redirect()->route('membresias')->with('success', 'La membresía ha sido eliminada correctamente.');
    }
}
