@extends('layouts.app')

@section('title-of-site')Спасибо за покупку!@endsection

@section('content')

    <div class = "confirm">
        <div class="pic">
            <img src="{{asset('public/img/check.svg')}}"/>
        </div>

        <div class="text">
            <p>Спасибо за покупку! Ваш заказ оформляется, мы с вами свяжемся.</p>
        </div>

        <div class="text">
            <a href="{{route('home')}}">Продолжить покупки</a>
        </div>

    </div>


@endsection
