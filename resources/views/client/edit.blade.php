@extends('layouts.app')


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left h1" style="color:purple">Client</div>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <form method="POST" action="{{ route('client.postedit') }}" aria-label="{{ __('clientEdit') }}">
            <div class="row justify">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left h4">Information Général</div>
                        </div>
                        <div class="card-body">

                            {{ csrf_field() }}

                            {{ Form::hidden('idClient', $client['idClient']) }}

                            <div class="form-group">
                                <label>Prénom</label>
                                <input id="firstName" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }} form-control-lg"
                                       name="firstName" value="{{ $client['firstName'] }}" required autofocus
                                       placeholder="Prénom">

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nom</label>
                                <input id="lastName" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }} form-control-lg"
                                       name="lastName" value="{{ $client['lastName'] }}" required autofocus
                                       placeholder="Nom">

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Numéro de téléphone</label>
                                <input id="phoneNumber" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }} form-control-lg"
                                       name="phoneNumber" value="{{ $client['phoneNumber'] }}" required autofocus
                                       placeholder="Numéro de téléphone">

                                @if ($errors->has('phoneNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="">
                                    Allergie
                                </label>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="glueAllergy" name="glueAllergy"
                                               {{$client['glueAllergy'] == 1 ? 'checked="checked"': ''}} class="form-check-input big-checkbox">
                                        Colle
                                        <i class="input-helper"></i></label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left h4">Faux cils</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Style</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ Form::radio('style', 'p', $client['style'] == 'p' ? true: false) }}
                                            Papillon
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ Form::radio('style', 'pe', $client['style'] == 'pe' ? true: false) }}
                                            Poupée
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Courbe</label>
                                <div class="col-sm-9">
                                    <select required autofocus class="form-control" name="curve">
                                        <option></option>
                                        <option {{$client['curve']=='b'? 'selected':''}}>b</option>
                                        <option {{$client['curve']=='c'? 'selected':''}}>c</option>
                                        <option {{$client['curve']=='d'? 'selected':''}}>d</option>
                                        <option {{$client['curve']=='j'? 'selected':''}}>j</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Longueur et épaisseur</label>
                                <textarea class="form-control" name="eyelashNote"
                                          rows="4">{{$client['eyelashNote']}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-sm-6 float-left">
                                    <a class="btn btn-gradient-dark" href="{{route('clients')}}"><span>Retour</span></a>
                                </div>
                                <div class="col-md-4  col-sm-6 float-right">
                                    <button type="submit"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection