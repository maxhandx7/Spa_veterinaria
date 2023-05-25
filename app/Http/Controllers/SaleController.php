<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Pet;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {
        $pets = Pet::get();
        $clients = Client::get();
        $services = Service::get();
        return view('admin.sale.create', compact('clients', 'services', 'pets'));
    }


    public function store(StoreRequest $request)
    {
        $fechaActual = Carbon::now('America/Bogota');
        $fechaLegible = $fechaActual->format('d/m/Y H:i:s');
        $sale =  Sale::create($request->all() + [
            'id_user' => Auth::user()->id,
            'fecha_venta' => $fechaLegible,
        ]);
        foreach ($request->servicio_id as $key => $servicio) {
            $results[] = array("servicio_id" => $request->servicio_id[$key], "precio" => $request->precio[$key]);
            $this->updateDefaultValue($request->servicio_id[$key]);
        }
        $sale->saleDetails()->createMany($results);
        
        return redirect()->route('sales.index');
    }


    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->precio;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }


    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.edit', compact('clients'));
    }


    public function update(UpdateRequest $request, Sale $sale)
    {
        /*  $sale->update($request->all());
        return redirect()->route('admin.sale.index'); */
    }


    public function destroy(Sale $sale)
    {
        /* $sale->delete();
        return redirect()->route('admin.sale.index'); */
    }

    public function pdf(sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->precio;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('reporte_de_venta_' . $sale->id . '.pdf');
    }

    public function updateDefaultValue($id)
    {
        $coleccion = service::find($id);
        $coleccion->estado = 'enable';
        $coleccion->save();

    }
}
