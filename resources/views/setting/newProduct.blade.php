@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Nouveau Produit</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.createnewproduct') }}"
                              aria-label="{{ __('settingCreateNewProductCategory') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Catégorie</label>
                                <select class="form-control" name="productCategory">
                                    @foreach($data['productCategories'] as $category)
                                        <option value="{{$category['id']}}">{{$category['name']}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nom</label>
                                <input id="name"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div>
                                    <label>Prix par défaut</label>
                                    <input class="form-control form-control-lg" name="defaultPrice" type="text"
                                           required/>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-sm-6 float-left">
                                    <a class="btn btn-gradient-dark"
                                       href="{{route('settings')}}"><span>Retour</span></a>
                                </div>
                                <div class="col-md-4  col-sm-6 float-right">
                                    <button type="submit"
                                            class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Enregistrer') }}
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