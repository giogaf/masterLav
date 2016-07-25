<?php

namespace App\Reserva;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['fecha_inicio','fecha_fin'];

    /**
     * Reserva belongs to Habitaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function habitaciones()
    {
    	// belongsTo(RelatedModel, foreignKey = habitaciones_id, keyOnRelatedModel = id)
    	return $this->belongsToMany(Habitacion::class)->withTimestamps();
    }
}
