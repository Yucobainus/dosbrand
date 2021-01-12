<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
<body>
<div class="aut-wrapper">
    <div class="aut">
        <div class="a-title">
          <h2>Dosbrand-admin</h2>
        </div>
        <form action="{{route('aut')}}" enctype="multipart/form-data" method="post">

            @csrf
            <div class="form-a">
                <label for="login">
                    <p>Логин</p>
                </label>
                <input type="text" name="login" placeholder="Логин" id="login">
            </div>
            <div class="form-a">
                <label for="pass">
                    <p>Пароль</p>
                </label>
                <input type="password" name="pass" placeholder="Пароль" id="pass">
            </div>
            <div class="form-a">
                <input type="submit" class="btn">
            </div>

        </form>

    </div>
</div>
</body>



