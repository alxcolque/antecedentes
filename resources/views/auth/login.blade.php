<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="zWBKdSR1N4htQmlvs4d41jdmKDx6XxdEcPgNbLpo">

    <title>
        FELCC </title>

    <link rel="stylesheet" href="http://200.110.50.35/vendor/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="http://200.110.50.35/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://200.110.50.35/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="http://200.110.50.35/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a>
                <img src="http://200.110.50.35/vendor/adminlte/dist/img/AdminLTELogo.png" height="50">
                <b>Policia</b>BOL
            </a>
        </div>
        <div class="card card-outline card-success">

            <div class="card-header ">
                <h3 class="card-title float-none text-center">
                    Autenticarse para iniciar sesión </h3>
            </div>
            <div class="card-body login-card-body ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control me-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control me-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Recordarme</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type=submit class="btn btn-block btn-flat btn-success">
                                <span class="fas fa-sign-in-alt"></span>
                                Acceder
                            </button>
                        </div>
                    </div>

                </form>
            </div>


            <div class="card-footer ">

                <p class="my-0">
                    <a href="http://200.110.50.35/password/reset">
                        Olvidé mi contraseña
                    </a>
                </p>


            </div>

        </div>

    </div>


    <script src="http://200.110.50.35/vendor/jquery/jquery.min.js"></script>
    <script src="http://200.110.50.35/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://200.110.50.35/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script src="//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script src="http://200.110.50.35/vendor/adminlte/dist/js/adminlte.min.js"></script>

</body>

</html>