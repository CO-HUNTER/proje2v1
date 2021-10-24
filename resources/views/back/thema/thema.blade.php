<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('content/css/back/style.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('content/library/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>
    <div id="container">
        <section id="sidebar">
            <ul>
                <a href="#">
                    <li>Anasayfa</li>
                </a>
                <a href="{{route('productAdd')}}">
                    <li>Ürün Ekle</li>
                </a>
                <a href="{{route('products')}}">
                    <li>Ürün Listele</li>
                </a>
            </ul>
        </section>
        <script src="{{ asset('content/library/js/interface.js') }}"></script>
        <script src="{{ asset('content/library/js/notification.js') }}"></script>
        @yield('body')
    </div>
    
    <script>
        console.log(tori);
    </script>
</body>

</html>
