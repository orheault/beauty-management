@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Clients</div>
                        <div class="float-right">
                            <a href="{{route('client.new')}}" class="btn btn-gradient-primary btn-rounded">Ajout nouveau
                                client</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Prénom
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Numéro de téléphone
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client )
                                <tr>
                                    <td>
                                        {{$client['firstName']}}
                                    </td>
                                    <td>
                                        {{$client['lastName']}}
                                    </td>
                                    <td>
                                        {{$client['phoneNumber']}}
                                    </td>
                                    <td>
                                        <a href="{{route('client.edit', ['idClient'=> $client['idClient']])}}"><span>Détail</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
