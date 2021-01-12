@extends('admin/admin')

@section('content')

    <div class="company-name">
        <h2>Создание промокода</h2>
    </div>

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route("add-promo")}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-sect">
            <label for="name">
                <p>Название</p>
            </label>
            <input type="text" name="name" placeholder="Название">
        </div>

        <div class="form-sect">
            <label for="sale">
                <p>Скидка(кол-во процентов, без знака %)</p>
            </label>
            <input type="number" name="sale" placeholder="e.g 50">
        </div>

        <div class="form-sect">
            <input type="submit" class="btn">
        </div>

    </form>

@endsection
