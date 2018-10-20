@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Nouvelle facture - choisir client</div>
                    </div>
                    <div class="card-body">
                        <script>
                            $(function () {
                                var availableTags = [
                                    "ActionScript",
                                    "AppleScript",
                                    "Asp",
                                    "BASIC",
                                    "C",
                                    "C++",
                                    "Clojure",
                                    "COBOL",
                                    "ColdFusion",
                                    "Erlang",
                                    "Fortran",
                                    "Groovy",
                                    "Haskell",
                                    "Java",
                                    "JavaScript",
                                    "Lisp",
                                    "Perl",
                                    {label: "PHP", id: 1},
                                    "Python",
                                    "Ruby",
                                    "Scala",
                                    "Scheme"
                                ];

                                $("#name").autocomplete({
                                    source: availableTags
                                });

                                $("#name").on("autocompleteselect", function (event, ui) {
                                    var url = '{{ url("client/getinformations") }}/' + ui.item.id;
                                    var ajax = new XMLHttpRequest();
                                    ajax.open('GET', url, true);
                                    ajax.onreadystatechange = function () {
                                        if (ajax.readyState === 4) {
                                            var client = JSON.parse(ajax.response);
                                            console.log(client);
                                            $(':input[type="submit"]').prop('disabled', false);
                                            $('#clientInformations').css('visibility', 'visible');

                                            $('#labelNom').text(client['firstName'] + ' ' + client['lastName']);
                                            $('#idClient').val(ui.item.id);
                                            $('#labelPhone').text(client['phoneNumber']);
                                        }
                                    };

                                    ajax.send();
                                });

                                $("#buttonSearch").click(function () {
                                    $("#name").autocomplete('search');
                                });
                            });
                        </script>
                        <form method="POST" action="{{ route('billing.create') }}"
                              aria-label="{{ __('billingCreate') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" id="name" class="form-control"
                                                   placeholder="Nom du client"
                                                   aria-label="Nom du client" aria-describedby="basic-addon2" value="">
                                            <div class="input-group-append">
                                                <button id="buttonSearch" class="btn btn-sm btn-gradient-primary"
                                                        type="button">Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0" style="visibility: hidden" id="clientInformations">
                                {{ Form::hidden('idClient', '', array('id' => 'idClient')) }}

                                <div class="col-md-6">
                                    <label>Nom: </label>
                                    <label id="labelNom"></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Téléphone: </label>
                                    <label id="labelPhone"></label>
                                </div>

                                <div class="col-md-12">
                                    <div class="float-right">
                                        <button class="btn btn-gradient-primary btn-lg" style="color:white"
                                                disabled
                                                type="submit">Suivant
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection