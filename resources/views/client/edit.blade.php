@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Modification client</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.postedit') }}" aria-label="{{ __('clientEdit') }}">
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

                           {{-- <div class="form-group">
                                <label class="">
                                    Avez-vous deja eu des extensions de cils?
                                </label>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input big-checkbox">
                                        Oui
                                        <i class="input-helper"></i></label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Non
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <label class="">
                                    Allergie
                                </label>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="glueAllergy" name="glueAllergy" {{$client['glueAllergy'] == 1 ? 'checked="checked"': ''}} class="form-check-input big-checkbox">
                                        Colle
                                        <i class="input-helper"></i></label>
                                </div>

                            </div>

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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection