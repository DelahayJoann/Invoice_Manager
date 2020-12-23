@extends('layouts.template')

@section('title','Client invoices')

@section('nav')
    @foreach($navElements as $navElement)
        <a href="{{$navElement['href']}}">{{$navElement['name']}}</a>
    @endforeach
@endsection

@section('content')
<h1><a href="/clients/{{$clientInvoices[0]->client_fk}}">{{$clientInvoices[0]->name}}</a></h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Réf</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Taux de TVA</th>
            <th>Total</th>
            <th>Opérations</th>
        </tr>
    </thead>
    <tbody>  
    @foreach($clientInvoices as $clientInvoice)
        <tr>
            <td scope="row">{{$clientInvoice->id}}</td>
            <td>{{ $clientInvoice->ref }}</td>
            <td>{{ $clientInvoice->title }}</td>
            <td>{{ $clientInvoice->price }}</td>
            <td>{{ $clientInvoice->tva }}</td>
            <td>{{ ($clientInvoice->tva/100 * $clientInvoice->price) + $clientInvoice->price }}</td>
            <td><a href="/invoices/edit/{{$clientInvoice->id}}">modifier</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection