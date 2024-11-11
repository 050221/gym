<?php

namespace App\Http\Controllers;

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
        $suscripcion = suscripciones::join('users as u', 'suscripciones.user_id', '=', 'u.id')
            ->join('membresias as m', 'suscripciones.membresia_id', '=', 'm.id')
            ->where('suscripciones.id', $id)
            ->select(
                'suscripciones.id',
                'suscripciones.status',
                'suscripciones.fecha_inicio',
                'suscripciones.fecha_fin',
                DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) as nombre_cliente"),
                'm.nombre_membresia'
            )
            ->first();

        return view('admin.suscripciones.edit-suscripciones', ['suscripcion' => $suscripcion]);
    }

    // Método para actualizar la información de la suscripcion solo el status a ccancelada
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $suscripcion = suscripciones::find($id);
        $suscripcion->status = $request->input('status');
        $suscripcion->save();

        // Si el estado se ha cambiado a "cancelada", actualiza la transacción asociada
        if ($request->input('status') === 'Cancelada') {
            $transaccion = transacciones::where('suscripcion_id', $suscripcion->id)->first();
            if ($transaccion) {
                $transaccion->status = 'Cancelada';
                $transaccion->save();
            }
        }

        return redirect()->route('suscripciones')->with('success', 'La suscripción ha sido cancelada exitosamente');
    }

    // Método para eliminar una suscripcion
    public function destroy($id)
    {

        $suscripcion = suscripciones::find($id);

        // Actualizar el estado del usuario a inactivo anter de borar su suscripcion y psara al historial
        User::where('id', $suscripcion->user_id)->update(['status' => 'Inactivo']);

        $suscripcion->delete();

        return redirect()->route('suscripciones')->with('success', 'Se ha eliminado correctamente');
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
