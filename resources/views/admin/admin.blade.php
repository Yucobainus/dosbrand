<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/css/admin.css') }}">
    <title>Dosbrand-admin</title>
</head>

<body>


<div class="admin-header">
    <h1>D O S B R A N D</h1><h3>- M-panel</h3>
</div>

<div class="admin-wrapper a-panel">

    <div class="tools">
            <a href="{{route("add-product")}}">Добавление товара</a>
            <a href="{{route("product-list")}}">Изменение товара</a>
            <a href="{{route("promo")}}">Создать промокод</a>
            <a>Изменение текста на странице</a>
    </div>

    <div class="right-side">
        @yield('content')
    </div>


</div>

</body>

</html>
