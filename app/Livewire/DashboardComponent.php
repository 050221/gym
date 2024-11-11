<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\transacciones;
use App\Models\User;
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
        


        // Consulta para obtener la suma de montos por mes
        $resultados = Transacciones::selectRaw('MONTHNAME(fecha_pago) AS nombre_mes, SUM(monto) AS monto_total')
            ->whereYear('fecha_pago', now()->year)  // Filtrar por el año actual
            ->groupBy(DB::raw('MONTH(fecha_pago), nombre_mes'))  // Agrupar por número de mes y nombre de mes
            ->orderBy(DB::raw('MONTH(fecha_pago)'))  // Ordenar por número de mes
            ->get();

        // Construir el array en el formato deseado
        $chartData = $resultados->map(function ($item) {
            return [
                'Day' => $item->nombre_mes,
                'Value' => $item->monto_total,
            ];
        })->toArray();

        return $chartData;
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

        $total_usuarios = User::all()->count();

        $total_usuarios_activos = User::where('status', 'Activo')->count();
        // fin admin codigo



        // inicio user codigo
        $userId = auth()->id();

        $suscripcion = DB::table('suscripciones as s')
            ->select('s.id', 's.fecha_inicio', 's.fecha_fin', DB::raw("CONCAT(u.name, ' ', u.firstname, ' ', u.lastname) AS nombre_cliente"), 'm.nombre_membresia', 'm.descripcion', 'm.precio')
            ->join('users as u', 's.user_id', '=', 'u.id')
            ->join('membresias as m', 's.membresia_id', '=', 'm.id')
            ->where('u.id', '=', $userId)
            ->get();


        $query = DB::table('historial_suscripciones as hs')
            ->select('hs.id', 'u.name as nombre_cliente', 'm.nombre_membresia', 'm.precio', 'hs.estado_anterior', 'hs.fecha_inicio', 'hs.fecha_fin')
            ->join('users as u', 'hs.user_id', '=', 'u.id')
            ->join('membresias as m', 'hs.membresia_id', '=', 'm.id')
            ->where('hs.user_id', $userId)
            ->where(function ($query) {
                $query->orWhere('m.nombre_membresia', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.estado_anterior', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_inicio', 'like', '%' . $this->search . '%')
                    ->orWhere('hs.fecha_fin', 'like', '%' . $this->search . '%');
            })
            ->orderBy('hs.fecha_fin', 'asc');

        $historialSuscripciones = $query->paginate($this->numberRows);

        // fin admin codigo

        return view('livewire.dashboard-component', [
            'ventas_mes_actual' => $ventas_mes_actual,
            'ventas_mes_pasado' => $ventas_mes_pasado,
            'historialSuscripciones' => $historialSuscripciones,
            'suscripcion' => $suscripcion,
            'total_usuarios' => $total_usuarios,
            'total_usuarios_activos' => $total_usuarios_activos,
            'chartData' => $this->total_ventas_meses,

        ]);
    }
}
