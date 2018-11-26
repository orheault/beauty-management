@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify" style="margin-top: 20px;">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Facture
                            - {{ $bill->client['firstName'] . ' ' . $bill->client['lastName'] }}</div>
                    </div>
                    <div class="card-body">
                        <label>Date </label> <label>{{ date('d-m-y', strtotime($bill['created_at'])) }}</label>
                        <div class="row">
                            <div class="col-md-12">
                                <br/>
                                <label>Total</label> <span>{{$total}} $ </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 float-right">
                                <a href="{{route('billing.newitem', $bill['id'])}}"
                                   class=" float-right btn btn-gradient-primary ">Ajout item</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            Item
                                        </th>
                                        <th>
                                            Prix
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($billItems as $item)
                                        <tr>
                                            <td class="py-1">
                                                {{$item->product->name}}
                                            </td>
                                            <td>
                                                {{$item['price']}}
                                            </td>
                                            <td>
                                                {{$item['description']}}
                                            </td>
                                            <td>
                                                <a href="{{route('billing.deleteitem', $item['id'])}}"
                                                   class="mdi mdi-delete"> </a>
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
        </div>
    </div>
@endsection