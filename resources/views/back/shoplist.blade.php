@extends('back.thema.thema')



@section('body')

    <div id="content">
        <section id="tables">
            <table>
                <thead>
                    <tr>
                        <th>Müşteri ID</th>
                        <th>Ürünler</th>
                        <th>Toplam Tutar</th>
                        <th>Alışveriş Zamanı</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $key=>$item)
                   
                        <tr>
                            <td class="current_row">{{ $item->customer_id }}</td>
                            <td class="current_row">
                            
                                
                                @foreach ($products[$key] as $prd )
                                {{$prd->product_name."X".$prd->quanity}}
                                @endforeach
                                  
                              
                                 
                            </td>
                            <td class="current_row">{{ $item->total_amount }}</td>
                            <td>{{ $item->shopping_time }}</td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>

        </section>
    </div>


@endsection
