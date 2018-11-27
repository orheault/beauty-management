@extends('layouts.app')


@section('content')

    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left h1 " style="color:purple">Setting</div>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <style>
            .tab-pane {

                border-left: 1px solid purple;
                border-right: 1px solid purple;
                border-bottom: 1px solid purple;
                border-top: 1px solid purple;
                border-radius: 0px 0px 5px 5px;
                padding: 10px;
            }

            .nav-tabs {
                margin-bottom: -9px;
            }

            .nav-tabs .nav-item .active {
                border-left: 1px solid purple;
                border-right: 1px solid purple;
                border-top: 1px solid purple;
                border-radius: 5px 5px 0px 0px;
            }

        </style>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link h4 active" data-toggle="tab" href="#general">Général</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h4" data-toggle="tab" href="#product">Produit</a>
            </li>
        </ul>

        <div class="tab-content bg-white">
            <div class="tab-pane container active" id="general">

            </div>

            <div class="tab-pane container fade" id="product">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">Catégorie</div>

                        <div class="float-right">
                            <a href="{{route('setting.newcategory')}}" class="btn btn-gradient-primary btn-rounded">Ajout
                                catégorie</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Nom
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($data['spents'] as $spending )--}}
                            <tr>
                                <td>
                                    {{--        {{$spending['total']}}--}}
                                </td>
                                <td>
                                    {{--{{$spending['description']}}--}}
                                </td>
                            </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <br/>
                <br/>
                <br/>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">Items</div>

                        <div class="float-right">
                            <a href="{{route('setting.newitem')}}" class="btn btn-gradient-primary btn-rounded">Ajout
                                Item</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Category
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($data['spents'] as $spending )--}}
                            <tr>
                                <td>
                                    {{--        {{$spending['total']}}--}}
                                </td>
                                <td>
                                    {{--{{$spending['description']}}--}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection