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
    <form action="/clients/create" method="POST">
    {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-md-12 col-form-label">Nom: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <small class="error">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tel" class="col-md-12 col-form-label">Téléphone: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="tel" id="tel" placeholder="" value="{{ old('tel') }}">
                @if($errors->has('tel'))
                    <small class="error">{{ $errors->first('tel') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-12 col-form-label">Email: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <small class="error">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="num_tva" class="col-md-12 col-form-label">Numéro de TVA: </label>
            <div class="col-md-12">
                <input type="number" class="form-control" name="num_tva" id="num_tva" placeholder="" value="{{ old('num_tva') }}">
                @if($errors->has('num_tva'))
                    <small class="error">{{ $errors->first('num_tva') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="ref" class="col-md-12 col-form-label">Ref.</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="ref" id="ref" placeholder="" value="{{ old('ref') }}">
                @if($errors->has('ref'))
                    <small class="error">{{ $errors->first('ref') }}</small>
                @endif
            </div>
        </div>

        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-1-12">Adresse</legend>
                <label for="address" class="col-md-12 col-form-label">Rue et numéro: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="address" id="address" placeholder="" value="{{ old('address') }}">
                    @if($errors->has('address'))
                    <small class="error">{{ $errors->first('address') }}</small>
                @endif
                </div>
                <label for="zipCode" class="col-md-12 col-form-label">Code postal</label>
                <div class="col-md-12">
                    <input type="number" class="form-control" name="zipCode" id="zipCode" placeholder="" value="{{ old('zipCode') }}">
                    @if($errors->has('zipCode'))
                    <small class="error">{{ $errors->first('zipCode') }}</small>
                @endif
                </div>
                <label for="city" class="col-md-12 col-form-label">Ville: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="city" id="city" placeholder="" value="{{ old('city') }}">
                    @if($errors->has('city'))
                    <small class="error">{{ $errors->first('city') }}</small>
                @endif
                </div>
                <label for="country" class="col-md-12 col-form-label">Pays: </label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="country" id="country" placeholder="" value="{{ old('country') }}">
                    @if($errors->has('country'))
                    <small class="error">{{ $errors->first('country') }}</small>
                @endif
                </div>
        </fieldset>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection

<!-- <form action="/clients/create" method="POST">
        {{ csrf_field() }}
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <label for="tel">Tel: </label>
        <input type="text" name="tel" id="tel">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <label for="address">Address: </label>
        <input type="text" name="address" id="address">
        <label for="zipCode">Zip Code: </label>
        <input type="number" name="zipCode" id="zipCode">
        <label for="name">City: </label>
        <input type="text" name="city" id="city">
        <label for="name">Country: </label>
        <input type="text" name="country" id="country">
        <label for="num_tva">Numéro de TVA: </label>
        <input type="text" name="num_tva" id="num_tva">
        <label for="ref">Ref: </label>
        <input type="text" name="ref" id="ref">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->

