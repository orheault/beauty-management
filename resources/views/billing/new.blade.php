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

                                $("#name").autocomplete({
                                    source: function (request, response) {
                                        var url = '{{url("client/searchclientsbyname")}}' + '/' + request['term'];
                                        jQuery.get(url,
                                            function (clients) {
                                                var result = clients.map(function ($client) {
                                                    return {
                                                        'label': $client['firstName'] + ' ' + $client['lastName'] + ' ' + $client['phoneNumber'],
                                                        'value': $client['id']
                                                    };
                                                });
                                                response(result);
                                            });
                                    },
                                });

                                $("#name").on("autocompleteselect", function (event, ui) {
                                    var url = '{{ url("client/getinformations") }}/' + ui.item.value;
                                    jQuery.get(url,
                                        function (client) {
                                            $(':input[type="submit"]').prop('disabled', false);
                                            $('#clientInformations').css('visibility', 'visible');

                                            $('#labelNom').text(client['firstName'] + ' ' + client['lastName']);
                                            $('#name').val(client['firstName'] + ' ' + client['lastName']);
                                            $("input[name='client_id']").val(ui.item.value);
                                            $('#labelPhone').text(client['phoneNumber']);
                                        }
                                    );
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
                                {{ Form::hidden('client_id', '') }}

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