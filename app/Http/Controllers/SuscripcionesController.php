<?php

namespace App\Http\Controllers;

use App\Models\historialSuscripciones;
use Illuminate\Http\Request;
use App\Models\suscripciones;
use App\Models\transacciones;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SuscripcionesController extends Controller
{
    // Método para mostrar la lista de las suscripciones
    public function index()
    {
        return view('admin.suscripciones.tabla-suscripciones');
    }


    // Método para mostrar el formulario de edición de la suscripcion)
    public function edit($id)
    {
    }

    // Método para actualizar la información de la suscripcion solo el status a ccancelada
    public function update(Request $request, $id)
    {
    }

    // Método para cancelar una suscripcion
    public function cancel($id)
    {

        $suscripcion = suscripciones::find($id);

         // Guardamos el estado actual en el historial
         historialSuscripciones::create([
            'user_id' => $suscripcion->user_id,
            'membresia_id' => $suscripcion->membresia_id,
            'fecha_inicio' => $suscripcion->fecha_inicio,
            'fecha_fin' => $suscripcion->fecha_fin,
           // 'estado_anterior' => "Cancelada",
            'estado_anterior' => $suscripcion->status,

        ]);

          // Cambiamos el estado a 'Cancelada'
          $suscripcion->status = 'Cancelada';
          $suscripcion->save();

        // Actualizar el estado del usuario a inactivo anter de borrar su suscripcion y para al historial
        User::where('id', $suscripcion->user_id)->update(['status' => 'Inactivo']);

        

        return redirect()->route('suscripciones')->with('success', 'La suscripción ha sido cancelada exitosamente');
    }

     // Método para eliminar una suscripcion
    public function destroy($id)
    {

        $suscripcion = suscripciones::find($id);

        transacciones::where('suscripcion_id', $suscripcion->id)->delete();

        $suscripcion->delete();

        // Actualizar el estado del usuario a inactivo anter de borrar su suscripcion y para al historial
        User::where('id', $suscripcion->user_id)->update(['status' => 'Inactivo']);

        return redirect()->route('suscripciones')->with('success', 'La suscripción ha sido eliminada correctamente');
    }

    // Método para mostrar la lista de las transacciones
    public function transacciones()
    {
        return view('admin.suscripciones.tabla-transacciones');
    }

    public function historialSuscripciones()
    {
        return view('admin.suscripciones.tabla-historialSuscripciones');
    }


}
