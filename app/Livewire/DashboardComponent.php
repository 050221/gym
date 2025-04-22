<?php

namespace App\Livewire;

use App\Models\suscripciones;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\transacciones;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardComponent extends Component
{

    use WithPagination;

    public $search = '';
    public $numberRows = 5;



    public $total_ventas_meses = [];

    public function mount()
    {
        $this->total_ventas_meses = $this->getChartData();
    }

    public function getChartData()
    {
        $resultados_sin_formato = Transacciones::selectRaw('MONTH(fecha_pago) as num_mes, SUM(monto) AS monto_total')
            ->whereYear('fecha_pago', now()->year)
            ->groupBy(DB::raw('MONTH(fecha_pago)'))
            ->orderBy(DB::raw('MONTH(fecha_pago)'))
            ->get();
    
        return $resultados_sin_formato->map(function ($item) {
            return [
                'Day' => Carbon::create()->month($item->num_mes)->locale('es')->translatedFormat('F'),
                'Value' => $item->monto_total,  // No aplicar formato aquí
            ];
        })->toArray();
    }
    
    


    public function render()
    {



        // inicio admin codigo
        $ventas_mes_actual = transacciones::whereYear('fecha_pago', '=', now()->year)
            ->whereMonth('fecha_pago', '=', now()->month)
            ->where('status', 'completado')
            ->sum('monto');



        $mes_pasado = now()->subMonth(); // Obtiene el objeto DateTime del mes pasado
        $ventas_mes_pasado = transacciones::whereYear('fecha_pago', '=', $mes_pasado->year)
            ->whereMonth('fecha_pago', '=', $mes_pasado->month)
            ->where('status', 'completado')
            ->sum('monto');

        $ventas_totales_año = transacciones::whereYear('fecha_pago', '=', $mes_pasado->year)
            ->where('status', 'completado')
            ->sum('monto');

        $ventas_totales_año_formt = '$' . number_format($ventas_totales_año, 2);


        $total_usuarios = User::all()->count() - 1;

        $total_usuarios_activos = User::where('status', 'Activo')->count();

        $total_suscripciones_mes = suscripciones::whereYear('fecha_inicio', '=', now()->year)
            ->whereMonth('fecha_inicio', '=', now()->month)
            ->count();// Obtiene el número de suscripciones del mes actual

      
        // fin admin codigo



        // inicio user codigo
        $userId = auth()->id();

        $suscripcion = DB::table('suscripciones as s')
            ->select('s.id', 's.fecha_inicio', 's.fecha_fin', DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"), 'm.nombre', 'm.descripcion', 'm.precio')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->join('membresias as m', 's.membresia_id', '=', 'm.id')
            ->where('u.id', '=', $userId)
            ->get();


        $query = DB::table('historial_suscripciones as hs')
            ->select('hs.id', 'u.name as nombre_cliente', 'm.nombre', 'm.precio', 'hs.estado_anterior', 'hs.fecha_inicio', 'hs.fecha_fin')
            ->join('users as u', 'hs.user_id', '=', 'u.id')
            ->join('membresias as m', 'hs.membresia_id', '=', 'm.id')
            ->where('hs.user_id', $userId)
            ->where(function ($query) {
                $query->orWhere('m.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.estado_anterior', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('hs.fecha_fin', 'asc');

        $historialSuscripciones = $query->paginate($this->numberRows);

        // fin admin codigo

        return view('livewire.dashboard-component', [
            //'ventas_mes_actual' => $ventas_mes_actual,
            //'ventas_mes_pasado' => $ventas_mes_pasado,
            'ventas_totales_año_formt' => $ventas_totales_año_formt, // admin
            'total_usuarios' => $total_usuarios, // admin
            'total_usuarios_activos' => $total_usuarios_activos, // admin
            'chartData' => $this->total_ventas_meses, // admin
            'total_suscripciones_mes' => $total_suscripciones_mes, // admin

            'historialSuscripciones' => $historialSuscripciones, // user
            'suscripcion' => $suscripcion, // user

        ]);
    }
}
