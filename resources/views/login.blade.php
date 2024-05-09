<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color: #0B7077;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="card" style="border-radius: 50px; width: 1000px; background-color: #D2E6E4">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                                    <span class="h2 mb-0" style="font-size: 26px; font-weight: 700">Silahkan
                                        Login</span>
                                </div>
                                <form>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17"
                                            style="font-weight: 500; font-size: 20px">NIK</label>
                                        <input type="text" id="form2Example17" class="form-control form-control-lg"
                                            style="background-color: #B0BAC3; border-radius: 20px; height: 64px;"
                                            placeholder="Masukkan NIK" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27"
                                            style="font-weight: 500; font-size: 20px">Password</label>
                                        <input type="password" id="form2Example27"
                                            style="background-color: #B0BAC3; border-radius: 20px; height: 64px;"
                                            class="form-control form-control-lg" placeholder="Masukkan Password" />
                                    </div>

                                    <div class="pt-1 mb-4 d-flex justify-content-center">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg"
                                            type="button"
                                            style="background-color: #0B7077; color: #FFFFFF; width: 278px">Login</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #7C838A;">Belum memiliki akun? <a
                                            href="#!" style="color: #0B7077;">Daftar</a></p>
                                </form>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
