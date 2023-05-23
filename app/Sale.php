<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'sales_collection';

    protected $fillable = [
        'cliente_id',
        'id_user',
        'fecha_venta',
        'iva',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', '_id');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'cliente_id', '_id');
    }

    public function saleDetails()
    {
        return $this->hasMany(saleDatail::class);
    }
}
