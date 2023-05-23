<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Pet extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pets_collection';

    protected $fillable = [
        'nom_mascota',
        'raza_mascota',
        'especie_mascota',
        'vacunas_mascota',
        'fechaN_mascota',
        'cliente_id' 
    ];


    public function clients(){
        return $this->belongsTo(Client::class, 'cliente_id', '_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, '_id', 'servicio_id');
    }

}
