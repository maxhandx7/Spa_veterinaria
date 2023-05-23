<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Client extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'clients_collection';

    protected $fillable = [
        'nom_cliente',
        'apellido_cliente',
        'dir_cliente',
        'tel_cliente',
        'email_cliente',
    ];
}
