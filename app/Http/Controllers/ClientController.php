<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $navElements = array(array("href" => "/clients", "name" => "Liste clients"));
        return view('clients.create',compact('navElements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|min:5|max:30',
            'tel' => 'required|min:5|max:30',
            'email' => 'required|min:5|max:30',
            'address' => 'required|min:5|max:30',
            'zipCode' => 'required|min:4|max:10',
            'city' => 'required|min:3|max:30',
            'country' => 'required|min:3|max:30',
            'num_tva' => 'required|min:5|max:30',
            'ref' => 'required|min:5|max:30'
        ]);

        Client::create($request->all());
        $clients = Client::where('id','=', DB::getPdo()->lastInsertId())->get();
        $navElements = array(array("href" => "/clients", "name" => "Liste clients"));
        $title = $clients[0]->name;
        return view('clients.index',compact('clients','navElements','title'));
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
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $navElements = array(array("href" => "/clients", "name" => "Liste clients"));
        $title = $client->name;
        return view('clients.edit',compact('client','navElements','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'name' => 'required|min:5|max:30',
            'tel' => 'required|min:5|max:30',
            'email' => 'required|min:5|max:30',
            'address' => 'required|min:5|max:30',
            'zipCode' => 'required|min:4|max:10',
            'city' => 'required|min:3|max:30',
            'country' => 'required|min:3|max:30',
            'num_tva' => 'required|min:5|max:30',
            'ref' => 'required|min:5|max:30'
        ]);

        Client::find($id)->update($request->all());

        return redirect('/clients/show/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::where("client_fk", $id)->delete();
        Client::where("id", $id)->delete();
        return redirect('/clients');
    }
}
