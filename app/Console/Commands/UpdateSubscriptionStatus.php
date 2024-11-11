<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\suscripciones;
use App\Models\historialSuscripciones;
use App\Models\User;

class UpdateSubscriptionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-subscription-status';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update subscription status and move to history table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Buscar suscripciones vencidas o canceladas
        $subscriptions = suscripciones::where(function($query) {
            $query->where('fecha_fin', '<=', now())
                  ->orWhere('status', 'Cancelada');
        })
        ->whereIn('status', ['Activa', 'Cancelada'])
        ->get();


        // Actualizar estado de las suscripciones encontradas
        foreach ($subscriptions as $subscription) {
            // Crear una entrada en el historial de suscripciones

            if($subscription->status == 'Activa')

                historialSuscripciones::create([
                    'user_id' => $subscription->user_id,
                    'membresia_id' => $subscription->membresia_id,
                    'fecha_inicio' => $subscription->fecha_inicio,
                    'fecha_fin' => $subscription->fecha_fin,
                    'estado_anterior' => 'Finalizada',
                ]);

            else{
                historialSuscripciones::create([
                    'suscripcion_id' => $subscription->suscripcion_id,
                    'user_id' => $subscription->user_id,
                    'membresia_id' => $subscription->membresia_id,
                    'fecha_inicio' => $subscription->fecha_inicio,
                    'fecha_fin' => $subscription->fecha_fin,
                    'estado_anterior' => 'Cancelada',
                ]);

            }

            // Actualizar el estado del usuario a inactivo
            User::where('id', $subscription->user_id)->update(['status' => 'Inactivo']);

            // Eliminar la suscripción de la tabla principal
            $subscription->delete();
        }

        $this->info('Subscription statuses updated and moved to history table successfully.');
    }
}
