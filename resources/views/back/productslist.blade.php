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