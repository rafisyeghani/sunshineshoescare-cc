@extends('user.layoutsUser.app')
@section('user.layoutsUser.content')
<div class="banner">
    <img src="{{ Vite::asset('/resources/images/image-14.png') }}" alt="banner">
    <div class="banner-content">
        <h2 class="fs-2 fw-bold">Selamat datang di Katalog Produk Kami!</h1>
        <h4 class="fs-4">Temukan berbagai produk berkualitas tinggi untuk perawatan sepatu kesayangan Anda.</h4>
        <p>Kami menawarkan produk dari merek Shunsine Shoes Care terpercaya dengan harga terjangkau dan kemudahan berbelanja. Dapatkan produk Anda dengan cepat dan aman ke seluruh Indonesia.</p>
        <div class="button-container mt-0 ">
            <!-- Tombol "Shop NOW" -->
            <a href="{{ url('shopUser') }}" class="btn btn-outline-light">Shop Now <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<div class="offers">
    <h2 class="fs-2 fw-bold">BEST OFFER !!!</h2>
    <div class="card1">
        <img src="{{ Vite::asset('/resources/images/sabun.png') }}" alt="Offer 1">
    </div>
    <div class="card2">
        <img src="{{ Vite::asset('/resources/images/paket-irit.png') }}" alt="Offer 2">
    </div>
    <div class="card3">
        <img src="{{ Vite::asset('/resources/images/parfum.png') }}" alt="Offer 3">
    </div>
</div>

<div class="customers">
    <h2 class="fs-2 fw-bold">OUR CUSTOMERS !!!</h2>
    <div>
        <img src="{{ Vite::asset('/resources/images/customer1.png') }}" alt="Customer 1">
    </div>
    <div>
        <img src="{{ Vite::asset('/resources/images/customer2.png') }}" alt="Customer 2">
    </div>
    <div>
        <img src="{{ Vite::asset('/resources/images/customer3.png') }}" alt="Customer 3">
    </div>
    <div>
        <img src="{{ Vite::asset('/resources/images/customer4.png') }}" alt="Customer 4">
    </div>
</div>

<div class="penutup">
    <div class="kataucapan">
        <h3><strong>Terimakasih telah mengunjungi kami</strong></h3>
        <P>Rawat sepatu Anda bersama kami dan temukan solusi terbaik untuk sepatu yang sehat dan berkilau!</P>
    </div>
</div>
@endsection
