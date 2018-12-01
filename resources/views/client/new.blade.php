@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Nouveau client</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.create') }}" aria-label="{{ __('clientCreate') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Prénom</label>
                                <input id="firstName"
                                       class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }} form-control-lg"
                                       name="firstName" value="{{ old('firstName') }}" required autofocus
                                       placeholder="Prénom">

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nom</label>
                                <input id="lastName"
                                       class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }} form-control-lg"
                                       name="lastName" value="{{ old('lastName') }}" required autofocus
                                       placeholder="Nom">

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Numéro de téléphone</label>
                                <input id="phoneNumber"
                                       class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }} form-control-lg"
                                       name="phoneNumber" value="{{ old('phoneNumber') }}" required autofocus
                                       placeholder="Numéro de téléphone">

                                @if ($errors->has('phoneNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>

                       {{--     <div class="form-group">
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
                                        <input type="checkbox" id="glueAllergy" name="glueAllergy" class="form-check-input big-checkbox">
                                        Colle
                                        <i class="input-helper"></i></label>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Enregistrer</button>
                            <a class="btn btn-light" href="{{route('clients')}}"><span>Retour</span></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection