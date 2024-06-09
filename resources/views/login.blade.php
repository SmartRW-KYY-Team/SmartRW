<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <section class="vh-100" style="background-color: #0B7077;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card" style="border-radius: 50px; width: 1000px; background-color: #D2E6E4;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                                    <h2 class="mb-0" style="font-size: 26px; font-weight: 700">Silahkan Login</h2>
                                </div>
                                </form>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('login.post') }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="username" class="form-label"
                                            style="font-weight: 500; font-size: 20px">Username</label>
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-lg"
                                            style="background-color: #B0BAC3; border-radius: 20px; height: 64px;"
                                            placeholder="Masukkan username" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label"
                                            style="font-weight: 500; font-size: 20px">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg"
                                            style="background-color: #B0BAC3; border-radius: 20px; height: 64px;"
                                            placeholder="Masukkan Password" />
                                    </div>
                                    <div class="pt-1 mb-4 d-flex justify-content-center">
                                        <button class="btn btn-lg" type="submit"
                                            style="background-color: #0B7077; color: #FFFFFF; width: 278px">Login</button>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 p-3">
                            <img src="{{ asset('LoginAssets/Login Image.png') }}" alt="login form" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
