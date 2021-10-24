<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('content/css/back/style.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div id="container">
    <section id="sidebar">
        <ul>
           <a href="#"><li>Anasayfa</li></a> 
           <a href="#"><li>Ürünler</li></a> 
           <a href="#"><li>Anasayfa</li></a> 
        </ul>
    </section>
    @yield('body')
</div>
</body>
</html>