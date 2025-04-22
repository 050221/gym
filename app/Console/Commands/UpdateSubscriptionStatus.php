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
        // Buscar suscripciones vencidas con estado "Activa"
        $subscriptions = Suscripciones::whereDate('fecha_fin', '<', now()->toDateString())
        ->where('status', 'Activa')
        ->get();
    


        // Actualizar estado de las suscripciones encontradas
        foreach ($subscriptions as $subscription) {
             //Crear una entrada en el historial de suscripciones

                historialSuscripciones::create([
                    'user_id' => $subscription->user_id,
                    'membresia_id' => $subscription->membresia_id,
                    'fecha_inicio' => $subscription->fecha_inicio,
                    'fecha_fin' => $subscription->fecha_fin,
                    'estado_anterior' => 'Expirada',
                ]);

                suscripciones::where('id', $subscription->id)->update(['status' => 'Expirada']);

        
            // Actualizar el estado del usuario a inactivo
            User::where('id', $subscription->user_id)->update(['status' => 'Inactivo']);


        }

        $this->info('Subscription statuses updated and moved to history table successfully.');
    }
}
