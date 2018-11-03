@extends('layouts.app')


@section('content')
    <script>
        $(function () {
            $("#name").autocomplete({
                source: function (request, response) {
                    var url = '{{url("client/searchclientsbyname")}}' + '/' + request['term'];
                    jQuery.get(url,
                        function (clients) {
                            var result = clients.map(function ($client) {
                                return {
                                    'label': $client['firstName'] + ' ' + $client['lastName'] + ' ' + $client['phoneNumber'],
                                    'value': $client['idClient']
                                };
                            });
                            response(result);
                        });
                },
            });

            $("#name").on("autocompleteselect", function (event, ui) {
                $('#ClientReferringSearch').css('display', 'none');
                $('#clientReferringName').text(ui.item.label);
                $('input[name="idReferringClient"]').val(ui.item.value);
            });

            $("#buttonSearch").click(function () {
                $("#name").autocomplete('search');
            });
        });
    </script>


    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left h1 " style="color:purple">Client</div>
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
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input id="firstName"
                                               class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }} form-control-lg"
                                               name="firstName" value="{{ $client['firstName'] }}" required autofocus
                                               placeholder="Prénom">

                                        @if ($errors->has('firstName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input id="lastName"
                                               class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }} form-control-lg"
                                               name="lastName" value="{{ $client['lastName'] }}" required autofocus
                                               placeholder="Nom">

                                        @if ($errors->has('lastName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Numéro de téléphone</label>
                                        <input id="phoneNumber"
                                               class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }} form-control-lg"
                                               name="phoneNumber" value="{{ $client['phoneNumber'] }}" required
                                               autofocus
                                               placeholder="Numéro de téléphone">

                                        @if ($errors->has('phoneNumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phoneNumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4">
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

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Client réréfé:
                                        </label>
                                        <label>
                                            {{$client['numberOfReferClient']}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="">
                                            Client référent
                                        </label>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        {{ Form::hidden('idReferringClient', '') }}
                                        @if($client['idReferringClient'] == NULL)
                                            <div id="ClientReferringSearch" class="input-group">
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="Nom du client"
                                                       aria-label="Nom du client" aria-describedby="basic-addon2"
                                                       value="">
                                                <div class="input-group-append">
                                                    <button id="buttonSearch" class="btn btn-sm btn-gradient-primary"
                                                            type="button">Rechercher
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <label class="">
                                                {{$client->referringClient()->firstName}} {{$client->referringClient()->lastName}}
                                            </label>
                                        @endif
                                        <label id="clientReferringName">
                                        </label>
                                    </div>
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
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            {{ Form::radio('style', 'p', $client['style'] == 'p' ? true: false) }}
                                            Papillon
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                    <select autofocus class="form-control" name="curve">
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
                            <div class="col-sm-12 float-left">
                                <div class="col-md-6 col-sm-5 float-left">
                                    <a class="btn btn-gradient-dark" href="{{route('clients')}}"><span>Retour</span></a>
                                </div>
                                <div class="col-md-6 col-sm-7 float-right">
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