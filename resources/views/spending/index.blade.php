@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Dépense</div>
                        <div class="float-right">
                            <a href="{{route('spending.new')}}" class="btn btn-gradient-primary btn-rounded">Ajout
                                nouvelle dépense</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Total</label>
                                <label>{{ $data['total'] }} $</label>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['spents'] as $spending )
                                <tr>
                                    <td>
                                        {{$spending['total']}}
                                    </td>
                                    <td>
                                        {{$spending['description']}}
                                    </td>
                                    <td>
                                        {{ date_create($spending['spentDate'])->format('d-m-y')}}
                                    </td>
                                    <td>
                                        <a href="{{ route('spending.delete', $spending['id']) }}"
                                           class="mdi mdi-delete" style="color:purple;font-size: 150%"></a>
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
