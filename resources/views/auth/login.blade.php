<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login - Sistem Absensi BPN">
    <meta name="author" content="">

    <title>Login - Sistem Absensi BPN</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body.bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .card-login {
            border-radius: 1rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        .form-control-user {
            border-radius: 10px;
            margin-bottom: 1rem;
            padding: 0.75rem 1.3rem;
            font-size: 0.95rem;
        }
        .btn-user {
            border-radius: 10px;
            padding: 0.75rem 1.3rem;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }
        .login-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .text-primary-custom {
            color: #667eea;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo-container i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 card-login">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <!-- Logo & Title -->
                                    <div class="logo-container">
                                        <i class="fas fa-clipboard-list"></i>
                                        <h2 class="h4 text-gray-900">Sistem Absensi</h2>
                                        <p class="text-gray-600 small">BPN Regional</p>
                                    </div>

                                    <!-- Error Message -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle"></i>
                                            <strong>Login Gagal!</strong>
                                            <br>
                                            {{ $errors->first() }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <!-- Login Form -->
                                    <form action="{{ route('login.post') }}" method="POST" class="user">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="email" class="text-gray-700 font-weight-bold">
                                                <i class="fas fa-envelope"></i> Email
                                            </label>
                                            <input 
                                                type="email" 
                                                id="email"
                                                name="email" 
                                                class="form-control form-control-user" 
                                                placeholder="Masukkan email Anda"
                                                required 
                                                value="{{ old('email') }}"
                                                autocomplete="email">
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="text-gray-700 font-weight-bold">
                                                <i class="fas fa-lock"></i> Password
                                            </label>
                                            <input 
                                                type="password" 
                                                id="password"
                                                name="password" 
                                                class="form-control form-control-user" 
                                                placeholder="Masukkan password Anda"
                                                required
                                                autocomplete="current-password">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe" name="remember">
                                                <label class="custom-control-label text-gray-700" for="rememberMe">
                                                    Ingat saya
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <i class="fas fa-sign-in-alt"></i> Login
                                        </button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small text-primary-custom" href="#forgot">Lupa Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
