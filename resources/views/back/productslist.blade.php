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
                            <td class="current_row">{{ $item->product_name }}</td>
                            <td class="current_row">{{ $item->barcode }}</td>
                            <td class="current_row">{{ $item->price }}</td>
                            <td>
                                <a href="{{ route('deleteProduct', $item->product_id) }}"><i
                                        class="uil uil-trash"></i></a>
                                <a href="{{ $item->product_id }}"><i class="uil uil-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="update_modal-box">
            <div class="update_modal">
                <form action="" method="POST">
                    <header>
                        <h2>Ürün Güncelle</h2>
                        <i class="uil uil-times"></i>
                    </header>
                    <label>Ürün Adı</label>
                    <input type="text" name="update-product_name">
                    <label>Barkod</label>
                    <input type="text" name="update-product_barcode">
                    <label>Ürün Fiyatı</label>
                    <input type="text" name="update-product_price">
                    <button type="submit">
                        GÜNCELLE
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection

<script>
    window.onload = () => {
        let modal = document.querySelector(".update_modal-box");
        let form = modal.querySelector("form");
        let closeModal = document.querySelector(".uil-times");

        //--- Event listener
        closeModal.addEventListener("click", e => modal.classList.remove("show"));

        document.querySelectorAll(".uil-edit").forEach(item => {
            item.addEventListener("click", e => {
                e.preventDefault();
                modal.classList.add("show");
                let id = e.target.parentElement.getAttribute("href");
                form.setAttribute("action",id);
                let td = [...e.target.closest("tr").children].filter(item => item.classList.contains("current_row") && item);
                form.querySelectorAll("input").forEach((item, index) => item.value = td[index].innerText)
            })
        });
    }
</script>
