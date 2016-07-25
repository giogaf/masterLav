<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use App\Reserva\ReservaValidador;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservarHabitacionJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $usuario;
    public $habitaciones;
    public $fechaInicio;
    public $fechaFin;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($inicio, $fin, User $usuario, $habitaciones)
    {
    $this->usuario = $usuario;
    $this->habitaciones = $habitaciones;
    $this->fechaInicio = $inicio;
    $this->fechaFin = $fin;  
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reservacion = new ReservaValidador();
        $reservacion->validar($this->fechaInicio, $this->fechaFin, $this->habitaciones);
    }
}
