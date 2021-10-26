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
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
      tori.notification("{{$error}}", {
        type: "error",
        duration: 5000
      });
    </script>
    @endforeach
    @endif
    <div id="content">
        <section id="productDetails">
            <form action="{{ route('addProduct') }}" id="add-product" method="POST">
                <h2>Ürün Ekle</h2>
                @csrf
                <label> Ürün Ad</label> <input type="text" name="ad">
                <label> Fiyat</label> <input type="text"  name="fiyat">
                <label> Barkod</label> <input type="text" name="barkod">
                

                <button type="submit">Ürün Ekle</button>
            </form>
        </section>


    </div>
@endsection
