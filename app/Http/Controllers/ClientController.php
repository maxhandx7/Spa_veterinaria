<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $num = 1;
        $clients = Client::get();
        return view('admin.client.index', compact('clients', 'num'));
    }

    
    public function create()
    {
        return view('admin.client.create');
    }

   
    public function store(StoreRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index');
    }

    
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    
    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client')); 
    }

    
    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
