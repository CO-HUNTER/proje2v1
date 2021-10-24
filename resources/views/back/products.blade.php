@extends('back.thema.thema')

@section('body')
    @if (Session::get('success'))
        <script>
            tori.notification("{{ Session::get('success') }}", {
                type: "success",
                duration: 5000
            });
        </script>
    @endif
    <div id="content">
        <section id="productDetails">
            <form action="{{ route('addProduct') }}" id="add-product" method="POST">
                <h2>Ürün Ekle</h2>
                @csrf
                <label> Ürün Ad</label> <input type="text" name="ad">
                <label> Barkod</label> <input type="text" name="barkod">
                <label> Fiyat</label> <input type="number" min="0" max="10000" name="fiyat">

                <button type="submit">Ürün Ekle</button>
            </form>
        </section>


    </div>
@endsection
