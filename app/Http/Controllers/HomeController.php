<?php

namespace App\Http\Controllers;

use App\Sale;
use App\saleDatail;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\Regex;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = saleDatail::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => null,
                        'total' => ['$sum' => ['$toInt' => '$precio']]
                    ]
                ]
            ]);
        })->toArray();

        $totalVentas = $total[0]['total'] ?? 0;

        $ventasdia = Sale::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$addFields' => [
                        'fecha_venta' => [
                            '$toDate' => [
                                '$dateFromString' => [
                                    'dateString' => [
                                        '$concat' => [
                                            ['$substr' => ['$fecha_venta', 6, 4]], '-',
                                            ['$substr' => ['$fecha_venta', 3, 2]], '-',
                                            ['$substr' => ['$fecha_venta', 0, 2]], 'T',
                                            ['$substr' => ['$fecha_venta', 11, 8]], 'Z'
                                        ]
                                    ],
                                    'format' => "%Y-%m-%dT%H:%M:%SZ"
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            'dia' => ['$dayOfMonth' => '$fecha_venta'],
                            'mes' => ['$month' => '$fecha_venta'],
                            'anio' => ['$year' => '$fecha_venta']
                        ],
                        'total' => ['$sum' => ['$toInt' => '$total']]
                    ]
                ],
                [
                    '$project' => [
                        '_id' => 0,
                        'dia' => '$_id.dia',
                        'mes' => '$_id.mes',
                        'anio' => '$_id.anio',
                        'total' => 1
                    ]
                ]
            ]);
        });


        return view('home', compact('totalVentas', 'ventasdia') );
    }
}
