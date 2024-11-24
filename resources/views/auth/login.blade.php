<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body class="bg-white">
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Welcome to our website.</h1>
                        <p>Sunshine Shoescare adalah solusi untuk sepatu anda menjadi bersih!</p>
                    </div>

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                        <div class="login-form">
                            <label for="email"
                                class="col-md-0 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="name@blablabla.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password"
                                class="col-md-0 col-form-label text-md-end">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="ENTER YOUR PASSWORD">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="signin mt-4">
                                {{ __('Login') }}
                            </button>

                            <div class="text-center">
                                <span class="d-inline">Dont have an account? <a href="{{ url('register') }}"
                                        class="signup d-inline text-decoration-none">{{ __('Register here') }}</a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-thumbnail d-block w-100"
                            src="{{ Vite::asset('resources/images/shoe-cleaner.png') }}" alt="image">
                    </div>
                    <div class="carousel-item active">
                        <img class="img-thumbnail d-block w-100"
                            src="{{ Vite::asset('resources/images/shoe-parfume.png') }}" alt="image">
                    </div>
                    <div class="carousel-item h-100">
                        <img class="img-thumbnail d-block w-100"
                            src="{{ Vite::asset('resources/images/shoe-cleaner.png') }}" alt="image">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</body>

</html>
