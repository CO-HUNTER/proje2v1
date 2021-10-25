@extends('front.thema.thema')

@section('body')
<h2 class="text-center my">GÜLER MARKET</h2>

<!-- Form -->
<section class="my flex_center">
  <form action="" class="form" method="POST">
    @csrf
    <div class="input_field">
      <label>Barkod Giriniz</label>
      <input class="product-barcode" type="number" name="product_barcode" />
    </div>
    <div class="input_field">
      <label>Alınan Para</label>
      <input class="received-money" type="number" name="received_money" />
    </div>
  </form>
</section>

<!-- Table Information -->
<section class="flex_center">
  <div class="operation_information">
    <i class="uil uil-plus"></i>
    Adet artır

    <i class="uil uil-minus"></i>
    Adet Azalt

    <i class="uil uil-trash"></i>
    Ürünü Sil

    <button class="btn-default finished-buy">
      Alışverişi Bitir
    </button>
  </div>
</section>

<!-- Table -->
<section class="flex_center">
  <table class="table">
    <thead>
      <tr>
        <th>Ürün Adı</th>
        <th>Barkod</th>
        <th>Fiyat</th>
        <th>Adet</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</section>

<!-- Order Information -->
<section class="flex_center">
  <div class="order_information">
    <p>
      Toplam Tutar :
      <span class="total_price">250₺</span>
    </p>
    <p>
      Para Üstü :
      <span class="gap"></span>
    </p>
  </div>
</section>
@endsection