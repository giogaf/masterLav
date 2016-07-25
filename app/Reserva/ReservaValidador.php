<?php

namespace App\Reserva;
use Carbon\Carbon;
class ReservaValidador
{
	const MINIMO_DIAS_RESERVA  =  1;
	const MAXIMO_DIAS_RESERVA = 15;
	const MAXIMO_HABITACIONES = 4;

	public function validar($fecha_inicio, $fecha_fin, $habitaciones)
	{
		$fin = Carbon::createFromFormat('Y-m-d',$fecha_fin);
		$inicio = Carbon::createFromFormat('Y-m-d',$fecha_inicio);

		if( ! $this->fechaFinPosteriorFechaInicio($inicio,$fin)) {
			throw new \InvalidArgumentException('Fecha final debe ser posterior a fecha inicio de reserva');
		}
		if (! rangoDiasValido($inicio, $inicio)) {
			throw new \InvalidArgumentException('Rango días permitido ['.MINIMO_DIAS_RESERVA.'-'.MAXIMO_DIAS_RESERVA.']' );		
		}
		if (! is_array($habitaciones)) {
			throw new \InvalidArgumentException('Parametro habitaciones debe ser Array');			
		}
		if (! $this->rangoHabitacionesValido($habitaciones)) {
			throw new \InvalidArgumentException('Reservas mayor a '. MAXIMO_HABITACIONES.'habitaciones no permitido');
		}
		return $this;

	}

	private function cumpleDiasMinimo($inicio, $fin)
	{
		return $fin->diffInDays($inicio) > MINIMO_DIAS_RESERVA;
	}

	private function cumpleDiasMaximo($inicio, $fin)
	{
		return $fin->diffInDays($inicio) <= MAXIMO_DIAS_RESERVA; 
	}

	private function rangoDiasValido($inicio, $fin)
	{
		return $this->cumpleDiasMinimo($inicio, $fin) && $this->cumpleDiasMaximo($inicio, $fin);
		
	}

	private function rangoHabitacionesValido($habitaciones)
	{
		return count($habitaciones)	< MAXIMO_HABITACIONES;
	}

	private function fechaFinPosteriorFechaInicio($fecha_inicio, $fecha_fin)
	{
		return $fecha_fin->diffInDays($fecha_inicio) >= self::MINIMO_DIAS_RESERVA;
	}
	public function habitaciones()
	{
		return $this->belongsToMany('App\Reserva\Habitacion')->withTimestamps();
	}

    public function nuevo($argument1, $argument2, $argument3, $argument4)
    {
        throw new \InvalidArgumentException('edicion pendiente para excepcion metodo  nuevo()');
    }
}
