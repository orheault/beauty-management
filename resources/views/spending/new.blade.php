@extends('layouts.app')


@section('content')
    <script>
        $(function () {
            $("#date").datepicker({dateFormat: 'yy-mm-dd'});
        });
    </script>

    <div class="container">
        <div class="row justify">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left h4">Nouvelle dépense</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('spending.create') }}"
                              aria-label="{{ __('clientCreate') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Total</label>
                                <input id="total"
                                       class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }} form-control-lg"
                                       name="total" value="{{ old('total') }}" required autofocus>

                                @if ($errors->has('total'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                  <label>Date</label>
                                  <input id="date"
                                         class="form-control{{ $errors->has('spentDate') ? ' is-invalid' : '' }} form-control-lg"
                                         name="spentDate" value="{{ old('spentDate') }}" required autofocus>

                                @if ($errors->has('spentDate'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('spentDate') }}</strong>
                                      </span>
                                  @endif
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="description"
                                          class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }} form-control-lg"
                                          name="description" value="{{ old('description') }}" required
                                          autofocus> </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 col-sm-6 float-left">
                                    <a class="btn btn-gradient-dark"
                                       href="{{route('spending')}}"><span>Retour</span></a>
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