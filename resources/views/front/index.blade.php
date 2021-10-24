@extends('front.thema.thema')

@section('body')
<h2 class="text-center my">GÜLER MARKET</h2>

<!-- Form -->
<section class="my flex_center">
  <form action="" class="form" method="POST">
    <div class="input_field">
      <label>Barkod Giriniz</label>
      <input type="number" name="product_barcode" />
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
    <tbody>
      <tr>
        <td>Elma</td>
        <td>1234567897815</td>
        <td class="table_price">5.2</td>
        <td class="table_quantity">1</td>
        <td>
          <i class="uil uil-plus"></i>
          <i class="uil uil-minus"></i>
          <i class="uil uil-trash"></i>
        </td>
      </tr>
      <tr>
        <td>Kola</td>
        <td>1234595893215</td>
        <td class="table_price">6</td>
        <td class="table_quantity">2</td>
        <td>
          <i class="uil uil-plus"></i>
          <i class="uil uil-minus"></i>
          <i class="uil uil-trash"></i>
        </td>
      </tr>
      <tr>
        <td>Yumurta</td>
        <td>1234567893215</td>
        <td class="table_price">2.3</td>
        <td class="table_quantity">3</td>
        <td>
          <i class="uil uil-plus"></i>
          <i class="uil uil-minus"></i>
          <i class="uil uil-trash"></i>
        </td>
      </tr>
    </tbody>
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