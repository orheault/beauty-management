@extends('layouts.app')


@section('content')

    <div class="container ">

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
                <div class="card-body">
                    <h4 class="card-title">Information personnel</h4>
                    <form method="POST" action="{{ route('setting.editPersonnalInformationPost') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Adresse email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                   value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Confirmer nouveau mot de passe</label>
                            <input name="passwordConfirmed" type="password" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">Enregistrer</button>
                        <a class="btn btn-light" href="{{route('settings')}}"><span>Annuler</span></a>
                    </form>

                </div>
            </div>

            <div class="tab-pane container fade" id="product">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="card-title">Catégorie</h4>

                        <div class="float-right">
                            <a href="{{route('setting.newproductcategory')}}"
                               class="btn btn-gradient-primary btn-rounded">
                                Ajout Nouvelle Catégorie</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Nom
                                </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productCategories as $productCategory )
                                <tr>
                                    <td> {{ $productCategory['name']}} </td>
                                    <td>
                                        <a href="{{ route('setting.editproductcategory', $productCategory['id']) }}"
                                           class="mdi mdi-pencil" style="color:purple;font-size: 150%"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <br/>
                <br/>
                <br/>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="card-title">Produit</h4>

                        <div class="float-right">
                            <a href="{{route('setting.newproduct')}}" class="btn btn-gradient-primary btn-rounded">Ajout
                                Nouveau Produit</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Nom
                                </th>
                                <th>
                                    Prix de base
                                </th>
                                <th>
                                    Catégorie
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product )
                                <tr>
                                    <td> {{ $product->name}} </td>
                                    <td> {{ $product->defaultPrice }} $</td>
                                    <td> {{ $product->productcategory->name}} </td>
                                    <td>
                                        <a href="{{ route('setting.editproduct', $product['id']) }}"
                                           class="float-left mdi mdi-pencil" style="color:purple;font-size: 150%"></a>
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