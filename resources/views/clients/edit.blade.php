@extends('layouts.template')

@if (isset($title))
    @section('title', $title)
@else
    @section('title','Ajouter un Client')
@endif

@section('nav')
    @foreach($navElements as $navElement)
        <a href="{{$navElement['href']}}">{{$navElement['name']}}</a>
    @endforeach
@endsection

@section('content')
<div class="container">
    <form action="/clients/edit/{{ $client->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group row">
            <label for="name" class="col-md-12 col-form-label">Nom: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $client->name }}">
                @if($errors->has('name'))
                    <small class="error">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tel" class="col-md-12 col-form-label">Téléphone: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="tel" id="tel" placeholder="" value="{{ $client->tel }}">
                @if($errors->has('tel'))
                    <small class="error">{{ $errors->first('tel') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-12 col-form-label">Email: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $client->email }}">
                @if($errors->has('email'))
                    <small class="error">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="num_tva" class="col-md-12 col-form-label">Numéro de TVA: </label>
            <div class="col-md-12">
                <input type="number" class="form-control" name="num_tva" id="num_tva" placeholder="" value="{{ $client->num_tva }}">
                @if($errors->has('num_tva'))
                    <small class="error">{{ $errors->first('num_tva') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="ref" class="col-md-12 col-form-label">Ref.</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="ref" id="ref" placeholder="" value="{{ $client->ref }}">
                @if($errors->has('ref'))
                    <small class="error">{{ $errors->first('ref') }}</small>
                @endif
            </div>
        </div>

        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-1-12">Adresse</legend>
                <label for="address" class="col-md-12 col-form-label">Rue et numéro: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{ $client->address }}">
                    @if($errors->has('address'))
                    <small class="error">{{ $errors->first('address') }}</small>
                @endif
                </div>
                <label for="zipCode" class="col-md-12 col-form-label">Code postal</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="zipCode" id="zipCode" placeholder="" value="{{ $client->zipCode }}">
                    @if($errors->has('zipCode'))
                    <small class="error">{{ $errors->first('zipCode') }}</small>
                @endif
                </div>
                <label for="city" class="col-md-12 col-form-label">Ville: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="city" id="city" placeholder="" value="{{ $client->city }}">
                    @if($errors->has('city'))
                    <small class="error">{{ $errors->first('city') }}</small>
                @endif
                </div>
                <label for="country" class="col-md-12 col-form-label">Pays: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="country" id="country" placeholder="" value="{{ $client->country }}">
                    @if($errors->has('country'))
                    <small class="error">{{ $errors->first('country') }}</small>
                @endif
                </div>
        </fieldset>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection