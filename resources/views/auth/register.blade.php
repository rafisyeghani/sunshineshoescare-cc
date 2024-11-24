<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body class="bg-white">
    <section class="regis d-flex">
        <div class="regis-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Registrasi</h1>
                        <p>Sunshine Shoescare adalah solusi untuk sepatu anda menjadi bersih!</p>
                    </div>

                    <div class="regis-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <label for="name" class="col-md-0 col-form-label text-md-end">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            {{-- <label for="role" class="col-md-0 col-form-label text-md-end">{{ __('Role') }}</label>
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                                name="role" value="{{ old('Role') }}" required autocomplete="role" autofocus>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                
                            <label for="email" class="col-md-0 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password" class="col-md-0 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password-confirm" class="col-md-0 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            <button type="submit" class="signin mt-4">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-thumbnail d-block w-100" src="{{ Vite::asset('resources/images/shoe-cleaner.png') }}" alt="image">
                    </div>
                    <div class="carousel-item active">
                        <img class="img-thumbnail d-block w-100" src="{{ Vite::asset('resources/images/shoe-parfume.png') }}" alt="image">
                    </div>
                    <div class="carousel-item h-100">
                        <img class="img-thumbnail d-block w-100" src="{{ Vite::asset('resources/images/shoe-cleaner.png') }}" alt="image">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</body>

</html>
