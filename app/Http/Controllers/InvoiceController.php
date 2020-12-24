<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::join('clients', 'clients.id', '=', 'invoices.client_fk')->get(['invoices.*', 'clients.name']);
        $navElements = array(array("href" => "/", "name" => "Accueil"));
        return view('invoices.index',compact('invoices','navElements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Client::get(['id','name','ref']);
        $navElements = array(array("href" => "/invoices", "name" => "Liste invoices"));
        return view('invoices.create',compact('navElements', 'items'));
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
            'ref' => 'required',
            'title' => 'required|min:5|max:60',
            'price' => 'required|min:1|max:30',
            'tva' => 'required|min:1|max:5',
            'client_fk' => 'required',
        ]);

        Invoice::create($request->all());
        $invoices = Invoice::where('id','=', DB::getPdo()->lastInsertId())->get();
        $navElements = array(array("href" => "/invoices", "name" => "Liste invoices"));
        $title = $invoices[0]->name;
        return view('invoices.index',compact('invoices','navElements','title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = Invoice::where('id','=', $id)->get();
        $navElements = array(array("href" => "/invoices", "name" => "Liste invoices"));
        $title = $invoices[0]->title;
        return view('invoices.index',compact('invoices','navElements','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $items = Client::get(['id','name','ref']);
        $navElements = array(array("href" => "/invoices", "name" => "Liste invoices"));
        $title = $invoice->title;
        return view('invoices.edit',compact('invoice','navElements','title','items'));
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
            'ref' => 'required',
            'title' => 'required|min:5|max:60',
            'price' => 'required|min:1|max:30',
            'tva' => 'required|min:1|max:5',
            'client_fk' => 'required',
        ]);

        Invoice::find($id)->update($request->all());

        $invoices = Invoice::join('clients', 'clients.id', '=', 'invoices.client_fk')->where("invoices.id",$id)->get(['invoices.*', 'clients.name']);
        $navElements = array(array("href" => "/invoices", "name" => "Liste invoices"));
        return view('invoices.index',compact('invoices','navElements'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::where("id", $id)->delete();
        return redirect('/invoices');
    }
}
