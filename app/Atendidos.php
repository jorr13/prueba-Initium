<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendidos extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id',
        'nombre',
        'tipo_cola',
    ];
}
