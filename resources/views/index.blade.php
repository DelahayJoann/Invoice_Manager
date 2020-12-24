@extends('layouts.template')

@section('title','Invoices Manager')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Clients</h3>
                        <img src="" alt="">
                        <p class="card-text"><a href="/clients">Afficher tout les clients</a></p>
                        <p class="card-text"><a href="/clients/create">Créer un client</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Invoices</h3>
                        <img src="" alt="">
                        <p class="card-text"><a href="/invoices">Afficher tout les factures</a></p>
                        <p class="card-text"><a href="/invoices/create">Créer une facture</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection