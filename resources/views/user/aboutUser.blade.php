@extends('user.layoutsUser.app')
@section('user.layoutsUser.content')

<div class="banner1">
    <img src="{{ Vite::asset('/resources/images/karyawan.png') }}" alt="banner">
    <div class="banner-content">
        <h1>Tentang Kami !</h1>
        <br>
        <p>Sunshine Shoes Care adalah pilihan utama bagi para pecinta sepatu yang peduli terhadap penampilan dan
            perawatan sepatu mereka. Sebagai pemimpin dalam industri perawatan sepatu, kami menghadirkan rangkaian
            produk berkualitas tinggi yang dirancang khusus untuk menjaga kebersihan, keharuman, dan keindahan sepatu Anda.</p>
        <p>  Kami memahami bahwa setiap pasangan sepatu adalah investasi, bukan hanya sebagai penunjang penampilan, tetapi
            juga sebagai cerminan dari kepribadian dan gaya hidup Anda. Itulah mengapa kami berkomitmen untuk menyediakan
            solusi terbaik untuk memastikan bahwa sepatu Anda selalu tampak dan terasa seperti baru, setiap saat.</p>
    </div>
</div>
<br><br>

  <h2 style="text-align:center">Our Team</h2>
  <br>
  <div class="row">
    <div class="column">
      <div class="card" style="text-align:center">
        <img src="{{ Vite::asset('/resources/images/yd.jpg') }}" alt="" style="width:100%">
        <br>
        <div class="container">
          <h3>Arya Yudha</h3>
          <p class="title">CEO & Founder</p>
        </div>
      </div>
    </div>

    <div class="column">
        <div class="card" style="text-align:center">
        <img src="{{ Vite::asset('/resources/images/rf.jpg') }}" alt="" style="width:100%">
        <br>
        <div class="container">
          <h2>Rafi Syeghani</h2>
          <p class="title">Art Director</p>
        </div>
      </div>
    </div>

      <div class="column">
        <div class="card" style="text-align:center">
          <img src="{{ Vite::asset('/resources/images/bm.jpg') }}" alt="" style="width:100%">
          <br>
          <div class="container">
            <h2>Ferdian Bimo</h2>
            <p class="title">Art Director</p>
          </div>
        </div>
      </div>

    <div class="column">
        <div class="card" style="text-align:center">
        <img src="{{ Vite::asset('/resources/images/dm.jpg') }}" alt="" style="width:100%">
        <br>
        <div class="container">
          <h2>Sandi Adimas</h2>
          <p class="title">Designer</p>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
</div>
@endsection
