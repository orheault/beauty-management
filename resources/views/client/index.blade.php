@extends('layouts.app')

@section('content')
    <script>
        $(function () {
            $('a[name=phoneNumber]').mask('(000) 000-0000');
        });
    </script>
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
                                <th>
                                    Action
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
                                        <a name="phoneNumber">{{$client['phoneNumber']}}</a>
                                    </td>
                                    <td>
                                        <a class="mdi mdi-pencil" style="color:purple; font-size: 150%"
                                           href="{{route('client.edit', ['id'=> $client['id']])}}"></a>
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
