<?php

namespace App\Http\Controllers;

use App\Category;
use App\Pet;
use App\service;
use Illuminate\Http\Request;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
class serviceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $num = 1;
        $services = Service::get();
        return view('admin.service.index', compact('services', 'num'));
    }

    
    public function create()
    {
        $categories = Category::get();
        $pets = Pet::get();
        return view('admin.service.create', compact('pets', 'categories'));
    }

   
    public function store(StoreRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('services.index');
    }

    
    public function show(Service $service)
    {
        $pets = Pet::get();
        return view('admin.service.show', compact('service', 'pets'));
    }

    
    public function edit(Service $service)
    {
        $categories = Category::get();
        $pets = Pet::get();
        return view('admin.service.edit', compact('service','pets', 'categories'));
    }

    
    public function update(UpdateRequest $request, Service $service)
    {
        $service->update($request->all());
        return redirect()->route('services.index');
    }

    
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
}
