@extends('layouts.template')

@if (isset($title))
    @section('title', $title)
@else
    @section('title','Ajouter un Invoice')
@endif

@section('nav')
    @foreach($navElements as $navElement)
        <a href="{{$navElement['href']}}">{{$navElement['name']}}</a>
    @endforeach
@endsection

@section('content')
<div class="container">
    <form action="/invoices/create" method="POST">
    {{ csrf_field() }}
        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-1-12">Client</legend>
                <label for="client_fk" class="col-md-12 col-form-label">Client à facturer: </label>
                <div class="col-md-12">
                    <!-- <input type="text" class="form-control" name="client_fk" id="client_fk" placeholder="" value="{{ old('client_fk') }}"> -->
                    <div class="form-group">
                        <label for="client_fk">Clients</label>
                        <select class="custom-select" name="client_fk" id="client_fk">
                            <option selected>Select one</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}" ref="{{ $item->ref }}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <script>
                        $("#client_fk").on('change',function(){
                            var getValue=$(this).val();
                            $("#ref").val($(this).children("option:selected").attr("ref"));
                        });
                    </script>
                    @if($errors->has('client_fk'))
                    <small class="error">{{ $errors->first('client_fk') }}</small>
                    @endif
                </div>            
        </fieldset>
        
        <div class="form-group row">
            <label for="ref" class="col-md-12 col-form-label">Référence client: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="ref" id="ref" placeholder="" value="{{ old('ref') }}" readonly>
                @if($errors->has('ref'))
                    <small class="error">{{ $errors->first('ref') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-md-12 col-form-label">Titre: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ old('tel') }}">
                @if($errors->has('title'))
                    <small class="error">{{ $errors->first('title') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-12 col-form-label">Montant: </label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="price" id="price" placeholder="" value="{{ old('price') }}">
                @if($errors->has('price'))
                    <small class="error">{{ $errors->first('price') }}</small>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="tva" class="col-md-12 col-form-label">Taux de TVA: </label>
            <div class="col-md-12">
                <input type="number" class="form-control" name="tva" id="tva" placeholder="" value="{{ old('tva') }}">
                @if($errors->has('tva'))
                    <small class="error">{{ $errors->first('tva') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
@endsection

