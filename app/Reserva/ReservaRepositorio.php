<?php
namespace App\Reserva;
use App\Reserva\Reserva;
/**
* 
*/
class ReservaRepositorio implements RepositorioInterfaz
{
	private $reserva;	
	
	function __construct(Reserva $r)
	{
		$this->reserva = $r;
	}

	public function crear($att)
	{
		$att_model = array_except($att,array['habitaciones'])
		$reserva_model = $this->reserva->create($att_model);
		if (isset($att['habitaciones'])) {
			$reserva_model->habitaciones()->sync($att['habitaciones']);
		}
		return $reserva;

	}
}