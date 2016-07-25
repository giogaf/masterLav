<?php

namespace tests\App\Reserva;
use App\User;
use App\Reserva\Habitacion;
use App\Reserva\ReservaValidador;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReservaValidadorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ReservaValidador::class);
    }
    /**
     * prueba fechas  reserva iguales   
     * @param $fecha_inicio inicio reserva
     * @param $fecha_fin final reserva
     *@param $habitacion habitación  a reservar
     */
    public function its_fecha_inicio_anterior_a_fecha_fin($fecha_inicio, $fecha_fin, $habitacion)
    {
    	$habitaciones = [$habitacion];
    	$fecha_inicio = '2016-06-06';
    	$fecha_fin = '2016-06-06';
    	$this->shouldThrow('\InvalidArgumentException')->duringValidar($fecha_inicio, $fecha_fin, $habitacion);
    }
    public function its_no_reserva_mayor_quince_dias($fecha_inicio, $fecha_fin, User $usuario, Habitacion $habitacion)
    {
    	$fecha_inicio = '2016-06-1';
    	$fecha_fin = '2016-06-15';
    	$habitaciones = [$habitacion];
    	$this->shouldThrow('\InvalidArgumentException')->duringNuevo($fecha_inicio, $fecha_fin, $usuario,$habitaciones);
    }
}
