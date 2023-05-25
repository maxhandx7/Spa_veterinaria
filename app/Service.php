<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Service extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'services_collection';
    

    protected $fillable = [
        'nom_servicio',
        'desc_servicio',
        'cost_servicio',
        'dur_servicio',
        'category_id',
        'mascota_id',
        'estado',
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', '_id');
    }

    public function pets()
    {
        return $this->belongsTo(Pet::class, 'mascota_id', '_id');
    }
    
}
