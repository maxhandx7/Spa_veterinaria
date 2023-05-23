<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class saleDatail extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sale_datails_collection';

    protected $fillable = [
        'sale_id',
        'servicio_id',
        'precio',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'servicio_id', '_id');
    }
}
