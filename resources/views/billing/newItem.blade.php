@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify" style="margin-top: 20px;">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4"><span>Facture - Ajout Item</span></div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('billing.createnewitem') }}"
                              aria-label="{{ __('billingCreate') }}">
                            {{ csrf_field() }}
                            {{ Form::hidden('billId', $data['billId']) }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Produit</label>
                                        <select class="form-control" name="idProduct">
                                            @foreach($data['products'] as $product)
                                                <option value="{{$product['id']}}">{{$product['name']}}
                                                    - {{$product['defaultPrice']}} $
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Prix</label>
                                        <input class="form-control form-control-lg" name="price" type="text" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"
                                                  rows="4"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-sm-6 float-left">
                                    <a class="btn btn-gradient-dark"
                                       href="{{route('billing.edit', ['id' =>  $data['billId']])}}"><span>Annuler</span></a>
                                </div>
                                <div class="col-md-4  col-sm-6 float-right">
                                    <button type=""
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Ajouter Item') }}
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