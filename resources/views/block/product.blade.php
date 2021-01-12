@extends('layouts.app')

@section('title-of-site') {{$product->name}} @endsection

@section('content')

    <div class="product-wrapper">

        <div class="product-header">
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset('public/img/logoblack.svg')}}" alt="logo"></a>
            </div>
            <div class="cart-product-page" id="cart">
                <div class="cart-text">
                    <p class="cart-qty">{{$cartSize}}</p>
                </div>
                <img src="{{asset('public/img/cartblack.svg')}}" alt="cart-icon"/>
            </div>
        </div>

        <div class="product-face">

            <div class="product-pictures">
                @if($product->images == "empty")

                    <div class="left-part">
                        <div class="next-arrow arr" id="nav-next-arrow">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                        <div class="prev-arrow arr" id="nav-prev-arrow">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                        <div class="nav-slider">
                            <div class="slide"><img src="{{asset("public/".$product->mainPhoto)}}"/></div>
                        </div>
                    </div>
                    <div class="pr-slider">
                        @foreach(explode(';',$product->images) as $el)
                            <div class="pr-slide"><img src="{{asset("public/".$product->mainPhoto)}}"/></div>
                        @endforeach
                    </div>

                    <div class="pr-mobile">
                        @foreach(explode(';',$product->images) as $el)
                            <div class="pr-slide"><img src="{{asset("public/".$product->mainPhoto)}}"/></div>
                        @endforeach
                    </div>

                    <div class="mobile-slider">
                        <div class="mb-slide"><img src="{{asset("public/".$product->mainPhoto)}}"/></div>
                    </div>

                    <div class="mob-arrows">
                        <div class="prev-arrow-mob arr-mob" id="prev-arrow-mob">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                        <div class="next-arrow-mob arr-mob" id="next-arrow-mob">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                    </div>

                @else
                    <div class="left-part">
                        <div class="next-arrow arr" id="nav-next-arrow">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                        <div class="prev-arrow arr" id="nav-prev-arrow">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>
                        <div class="nav-slider">
                            @foreach(explode(';',$product->images) as $el)
                                <div class="slide"><img src="{{asset("public/".$el)}}"/></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pr-slider">
                        @foreach(explode(';',$product->images) as $el)
                            <div class="pr-slide"><img src="{{asset("public/".$el)}}"/></div>
                        @endforeach
                    </div>

                    <div class="pr-mobile">
                        @foreach(explode(';',$product->images) as $el)
                            <div class="pr-slide"><img src="{{asset("public/".$el)}}"/></div>
                        @endforeach
                    </div>

                    <div class="mobile-slider">
                        @foreach(explode(';',$product->images) as $el)
                            <div class="mb-slide"><img src="{{asset("public/".$el)}}"/></div>
                        @endforeach
                    </div>

                    <div class="mob-arrows">


                        <div class="prev-arrow-mob arr-mob" id="prev-arrow-mob">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>

                        <div class="next-arrow-mob arr-mob" id="next-arrow-mob">
                            <img src="{{asset('public/img/verticalarrow.svg')}}"/>
                        </div>

                    </div>
                @endif
            </div>


            <div class="product-info">
                <div class="pr-name">
                    <p>{{$product->name}}</p>
                </div>
                <div class="pr-collection">
                    <p>{{$product->collection}}</p>
                </div>
                <div class="pr-colors">
                    <p>Цвета:</p>
                    <div class="color-list">

                        @if($product->color1 !== "null")
                            <label>
                                <input type="checkbox" id="color" name="color" value="{{$product->color1}}"/>
                                <div class="color" style="background-color: {{$product->color1}}"></div>
                            </label>
                        @endif
                        @if($product->color2 !== "null")
                            <label>
                                <input type="checkbox" id="color" name="color" value="{{$product->color2}}"/>
                                <div class="color" style="background-color: {{$product->color2}}"></div>
                            </label>
                        @endif
                        @if($product->color3 !== "null")
                            <label>
                                <input type="checkbox" id="color" name="color" value="{{$product->color3}}"/>
                                <div class="color" style="background-color: {{$product->color3}}"></div>
                            </label>
                        @endif
                    </div>
                </div>
                <div class="pr-size">
                    @foreach(explode(' ', $product->size) as $el)
                        <label>
                            <input type="checkbox" id="size" name="size" value="{{$el}}"/>
                            <p> -{{strtoupper($el)}}- </p>
                        </label>
                    @endforeach
                </div>
                <div class="pr-description">
                    <p>Описание:</p>
                    <p>{{$product->description}}</p>
                </div>
                <div class="pr-sheet">
                    <p>Состав:</p>
                    <p>{{$product->sheet}}</p>
                </div>
            </div>
        </div>
        <div class="product-buy">
            <div class="count">
                <p>Колличество:</p>
                <p class="count-of-prod"><input type="number" value="1"></p>
            </div>
            <div class="pr-price">
                <p>{{$product->price}} сум</p>
            </div>
            <p class="errors-valid"></p>
            <input type="submit" class="btn" value="В корзину" id="add-to-cart">
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#add-to-cart').click(function (event) {
                event.preventDefault()
                addToCart();
            })
            $('#order').click(function (event) {
                event.preventDefault()
                confirmOrder()
            })
            $('.delete input:checkbox').on('change', function (event) {
                id = $(this).attr('data-id')
                if($(`.delete#${id}a input:checkbox`).prop('checked')) {
                    event.preventDefault()
                    id = $(this).attr('data-id')
                    $(`#${id}`).addClass('hide')
                }else{
                    $(`#${id}`).removeClass('hide')
                }
            })
        })

        function addToCart() {
            let color = $('.color-list label input[type="checkbox"]:checked').val()
            let size = $('.pr-size label input[type="checkbox"]:checked').val()
            let count = $('.count-of-prod input').val()
            $.ajax({
                url: "{{route('add-to-cart')}}",
                type: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id": {{$product->id}},
                    "color": color,
                    "size": size,
                    "photo": "public/{{$product->mainPhoto}}",
                    "name": "{{$product->name}}",
                    "price": {{$product->price}},
                    "count": count,
                },
                success: (data) => {
                    location.reload();
                },
                error: (err) => {
                    if (err.status == 422) {
                        $('.errors-valid').text('Выберите цвет и размеры!')
                        $('.errors-valid').addClass('errors-active')
                    }
                }
            })
        }
        function confirmOrder() {
            let deletedProducts = [];
            $('.delete input[type="checkbox"]:checked').each(function () {
                deletedProducts.push(this.value)
            })
            let name =  $('#name').val()
            let phone =  $('#phone').val()
            let tg =  $('#telegram').val()
            let promo =  $('#promo').val()
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
                    document.location='../success';
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

