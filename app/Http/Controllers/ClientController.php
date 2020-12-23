<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        $navElements = array(array("href" => "/", "name" => "Accueil"));
        return view('clients.index',compact('clients','navElements'));
    }

     /**
     * Display factures of a client.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientInvoices($id)
    {
        $clientInvoices = Invoice::join('clients', 'clients.ref', '=', 'invoices.ref')->where('clients.id', $id)->get(['invoices.*', 'clients.name']);
        $navElements = array(array("href" => "/clients", "name" => "Liste clients"));
        return view('clients.clientinvoices',compact('clientInvoices','navElements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::where('id','=', $id)->get();
        $navElements = array(array("href" => "/clients", "name" => "Liste clients"));
        $title = $clients[0]->name;
        return view('clients.index',compact('clients','navElements','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
