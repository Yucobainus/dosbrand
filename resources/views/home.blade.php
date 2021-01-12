@extends('layouts.app')

@section('title-of-site') Dosbrand @endsection

@section('content')

    <div class="cart" id="cart">
        <div class="cart-text">
            <p>{{$cartSize}}</p>
        </div>
        <img src="{{asset('public/img/cart.svg')}}" alt="cart-icon"/>
    </div>




    <div class="slider-wrapper">
        <div class="slickPrev" id="slick-prev">
            <img src="{{asset('public/img/chevron.svg')}}" alt="left-arrow">
        </div>
        <div class="slide-logo">
            <img src="{{asset('public/img/logowhite.svg')}}"/>
        </div>
        <div class="slider-text">
            <h2>Новая коллекция от DOS <br><strong>«FIRST DROP»</strong></h2>
        </div>
        <div class="slick-slider">
            <div class="slide">
                <div class="slider-img">
                    <img src="{{asset('public/img/sl1.jpg')}}">
                </div>
            </div>
            <div class="slide">
                <div class="slider-img">
                    <img src="{{asset('public/img/sl2.jpg')}}">
                </div>
            </div>
            <div class="slide">
                <div class="slider-img">
                    <img src="{{asset('public/img/sl3.jpg')}}">
                </div>
            </div>
        </div>
        <div class="slickNext" id="slick-next">
            <img src="{{asset('public/img/chevron.svg')}}" alt="right-arrow">
        </div>
    </div>


    <div class="about-wrapper">
        <div class="text">
            <p>DOS — это воплощение высокого качества, сервиса, стиля и эмоций!
                Мы изменяем подход к fashion индустрии в Узбекистане. И вы можете убедиться в этом сами.</p>
        </div>

        <div class="text">
            <p>С любовью, #DosFamily</p>
        </div>
    </div>

    <div class="section-header">
        <p><strong>AWS2020</strong></p>
    </div>


    <div class="catalog-wrapper">
        <div class="catalog">
            @foreach($prod as $pr)
                <div class="card">
                    <div class="photo">
                        <a href="{{route('show-product', [$pr->id])}}"><img src="{{asset("public/".$pr->mainPhoto)}}"
                                                                            alt="card-image"></a>
                    </div>
                    <div class="name">
                        <h3>{{$pr->name}}</h3>
                    </div>
                    <div class="price">
                        <h3>{{$pr->price}} сум</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="adv">
        <div class="adv-card">
            <div class="top">
                <div class="photo">
                    <img src="{{asset('public/img/home/delivery.svg')}}">
                </div>
                <div class="text">
                    <p>
                        Бесплатная доставка <br> по всему Узбекистану!
                    </p>
                </div>
            </div>
            <div class="text">
                <p>
                    Осуществляем доставку по Ташкенту <br>
                    в течении 3-5 часов после <br> оформления заказа.
                </p>
            </div>
        </div>
        <div class="adv-card">
            <div class="top">
                <div class="photo">
                    <img src="{{asset('public/img/guarantee.png')}}">
                </div>
                <div class="text">
                    <p>
                        Мы даём пожизненную гарантию на нашу одежду! <br> при получении одежды.
                    </p>
                </div>
            </div>
            <div class="text">
                <p id="test">
                    Это значит, что мы обязательно обменяем вещь или сделаем возврат денежных средств в случае
                    обнаружения производственного брака.
                </p>
            </div>
        </div>
        <div class="adv-card">
            <div class="top">
                <div class="photo">
                    <img src="{{asset('public/img/home/payment.svg')}}">
                </div>
                <div class="text">
                    <p>
                        Оплата производится <br> при получении одежды.
                    </p>
                </div>
            </div>
            <div class="text">
                <p id="test">
                    Наличными, переводом на карту, <br>
                    PayMe, Click.
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('#order').click(function (event) {
                event.preventDefault()
                confirmOrder()
            })

            $('.delete input:checkbox').on('change', function (event) {
                id = $(this).attr('data-id')
                if ($(`.delete#${id}a input:checkbox`).prop('checked')) {
                    event.preventDefault()
                    id = $(this).attr('data-id')
                    $(`#${id}`).addClass('hide')
                } else {
                    $(`#${id}`).removeClass('hide')
                }
            })
        })


        function confirmOrder() {
            let deletedProducts = [];
            $('.delete input[type="checkbox"]:checked').each(function () {
                deletedProducts.push(this.value)
            })
            let name = $('#name').val()
            let phone = $('#phone').val()
            let tg = $('#telegram').val()
            let promo = $('#promo').val()
            $.ajax({
                url: "{{route('confirm-order')}}",
                type: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    "deleted": deletedProducts,
                    "name": name,
                    "phone": phone,
                    "promo": promo,
                    "telegram": tg
                },
                success: (data) => {
                    document.location = './success';
                },
                error: (err) => {
                    if (err.status == 422) {
                        $('.errors-valid').text('Укажите имя и номер телефона!')
                        $('.errors-valid').addClass('errors-active')
                    }
                }
            })
        }
    </script>
@endsection
