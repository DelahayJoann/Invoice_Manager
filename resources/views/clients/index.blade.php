@extends('layouts.template')

@if (isset($title))
    @section('title', $title)
@else
    @section('title','Clients')
@endif


@section('nav')
    @foreach($navElements as $navElement)
        <a href="{{$navElement['href']}}">{{$navElement['name']}}</a>
    @endforeach
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Société</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Numéro TVA</th>
            <th>Factures</th>
            <th>Opérations</th>
        </tr>
    </thead>
    <tbody>  
    @foreach($clients as $client)
        <tr>
            <td scope="row">{{ $client->id }}</td>
            <td><a href="/clients/show/{{ $client->id }}">{{ $client->name }}</a></td>
            <td>{{ $client->tel }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->address }} | {{ $client->zipCode }} {{ $client->city }} | {{ $client->country }}</td>
            <td>{{ $client->num_tva }}</td>
            <td><a href="/clients/clientinvoices/{{ $client->id }}">{{ $client->ref }}</a></td>
            <td><a href="/clients/edit/{{ $client->id }}">modifier</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection