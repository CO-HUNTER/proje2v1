@extends('back.thema.thema')

@section('body')
@if(Session::get('success'))
    <div > {{Session::get('success')}} </div>  
        
        @endif
<div id="content">
    <section id="productDetails">
        <form action="{{route('addProduct')}}" method="POST">
            @csrf
            <label> Ürün Ad</label> <input type="text" name="ad">
            <label> Barkod</label> <input type="text" name="barkod">
            <label> Fiyat</label> <input type="number" min="0" max="10000" name="fiyat">

            <button type="submit">Ürün Ekle</button>
        </form>


    </section>

    <section id="tables">
    <table>
    <tr>
    <th>Ürün Ad</th>
    <th>Barkod</th>   
    <th>Fiyat</th>    
    <th>İşlemler</th>     
    </tr>  
    @foreach ($query as $item )
        
   
    <tr>
        <td>{{$item->product_name}}</td>
        <td>{{$item->barcode}}</td>
        <td>{{$item->price}}</td>
        <td><a href="{{route('deleteProduct',$item->product_id)}}"><i class="uil uil-trash"></i></a></td>
    </tr>
    @endforeach  
    </table>    
    </section>
</div>
@endsection
