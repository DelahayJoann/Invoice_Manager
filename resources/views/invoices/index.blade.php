@extends('layouts.template')

@section('title','Invoices')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Réf</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Taux de TVA</th>
            <th>Total</th>
            <th>Client</th>
            <th>Opérations</th>
        </tr>
    </thead>
    <tbody>  
    @foreach($invoices as $invoice)
        <tr>
            <td scope="row">{{ $invoice->id }}</td>
            <td>{{ $invoice->ref }}</td>
            <td>{{ $invoice->title }}</td>
            <td>{{ $invoice->price }}</td>
            <td>{{ $invoice->tva }}</td>
            <td>{{ ($invoice->tva/100 * $invoice->price) + $invoice->price }}</td>
            <td><a href="/clients/show/{{ $invoice->client_fk }}"> {{ $invoice->name }} </a></td>
            <td><a href="/clients/edit/{{ $invoice->client_fk }}">modifier</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection