<?php

namespace App\Http\Controllers;

use App\Client;
use App\Pet;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Requests\Pet\UpdateRequest;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $num = 1;
        $pets = Pet::get();
        return view('admin.pet.index', compact('pets', 'num'));
    }

    
    public function create()
    {
        $clients = Client::get();
        $services = Service::get();
        return view('admin.pet.create', compact('services', 'clients'));
    }

   
    public function store(StoreRequest $request)
    {
        Pet::create($request->all());
        return redirect()->route('pets.index');
    }

    
    public function show(Pet $pet)
    {
        $services = Service::get();
        $fechaNacimiento = $pet->fechaN_mascota;
        $fechaNacimiento = Carbon::parse($fechaNacimiento);
        $fechaActual = Carbon::now();
        $edad = $fechaActual->diffInYears($fechaNacimiento);
        return view('admin.pet.show', compact('pet', 'services', 'edad'));
    }

    
    public function edit(Pet $pet)
    {
        $clients = Client::get();
        $services = Service::get();
        return view('admin.pet.edit', compact('pet','services', 'clients'));
    }

    
    public function update(UpdateRequest $request, Pet $pet)
    {
        $pet->update($request->all());
        return redirect()->route('pets.index');
    }

    
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index');
    }
}
