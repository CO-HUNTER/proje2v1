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

        <section id="tables">
            <table>
                <thead>
                    <tr>
                        <th>Ürün Ad</th>
                        <th>Barkod</th>
                        <th>Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->barcode }}</td>
                            <td>{{ $item->price }}</td>
                            <td><a href="{{ route('deleteProduct', $item->product_id) }}"><i
                                        class="uil uil-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
