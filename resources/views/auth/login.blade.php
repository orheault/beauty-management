<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../images/favicon.png"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bundle.base.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/addons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/off-canvas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/misc.js') }}"></script>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="w-100">
                <div class="col-lg-4 col-sm-12">
                    <div class="auth-form-light text-left p-5">
                        <h4>Bienvenue! </h4>
                        <h6 class="font-weight-light">Se connecter pour continuer.</h6>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg"
                                       name="email" value="{{ old('email') }}" required autofocus
                                       placeholder="Adresse mail">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg"
                                       name="password" required placeholder="Mot de passe">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<!-- endinject -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/misc.js"></script>
<!-- endinject -->
</body>

</html>
