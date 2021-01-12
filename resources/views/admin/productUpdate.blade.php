@extends('admin/admin')

@section('content')

    <div class="company-name">
        <h2>{{$data->name}}</h2>
    </div>


    <form action="#" enctype="multipart/form-data" method="post">

        @csrf
        <div class="form-sect">
            <label for="name">
                <p>Название</p>
            </label>
            <input type="text" name="name" value="{{$data->name}}" placeholder="Название" id="name">
        </div>

        <div class="form-sect">
            <label for="collection">
                <p>Коллекция</p>
            </label>
            <input type="text" name="collection" value="{{$data->collection}}" placeholder="Коллекция" id="collection">
        </div>

        <div class="form-sect">
            <label for="size">
                <p>Размер</p>
            </label>
            <input type="text" name="size" value="{{$data->size}}" placeholder="Размер" id="size">
        </div>

        <div class="form-sect">
            <label for="color">
                <p>Цвета</p>
            </label>
            <input type="text" name="color" value="{{$data->color}}" placeholder="Цвета" id="color">
        </div>

        <div class="form-sect">
            <label for="sheet">
                <p>Ткань</p>
            </label>
            <input type="text" name="sheet" value="{{$data->sheet}}" placeholder="Ткань" id="sheet">
        </div>

        <div class="form-sect">
            <label for="fill">
                <p>Состав</p>
            </label>
            <input type="text" name="fill" value="{{$data->fill}}" placeholder="Состав" id="fill">
        </div>

        <div class="form-sect">
            <label for="description">
                <p>Описание</p>
            </label>
            <input type="text" name="description" value="{{$data->description}}" placeholder="Описание" id="description">
        </div>

        <div class="form-sect">
            <label for="price">
                <p>Цена</p>
            </label>
            <input type="number" name="price" value="{{$data->price}}" placeholder="Цена" id="price">
        </div>

{{--        <div class="form-sect">--}}
{{--            <label for="photo1">--}}
{{--                <p>Выберите первую фотографию</p>--}}
{{--            </label>--}}
{{--            <input type="file" name="photo1" id="photo1" value="{{asset($data->photo1)}}" multiple="false" accept="image/*" class="filePlace">--}}
{{--        </div>--}}

{{--        <div class="form-sect">--}}
{{--            <label for="photo2">--}}
{{--                <p>Выберите первую фотографию</p>--}}
{{--            </label>--}}
{{--            <input type="file" name="photo2" value="{{asset($data->photo1)}}" id="photo2" multiple="false" accept="image/*" class="filePlace">--}}
{{--        </div>--}}

{{--        <div class="form-sect">--}}
{{--            <label for="photo3">--}}
{{--                <p>Выберите третью фотографию</p>--}}
{{--            </label>--}}
{{--            <input type="file" name="photo3" value="{{asset($data->photo1)}}" id="photo3" multiple="false" accept="image/*" class="filePlace">--}}
{{--        </div>--}}

{{--        <div class="form-sect">--}}
{{--            <label for="photo4">--}}
{{--                <p>Выберите четвёртую фотографию</p>--}}
{{--            </label>--}}
{{--            <input type="file" name="photo4" value="{{asset($data->photo1)}}" id="photo4" multiple="false" accept="image/*" class="filePlace">--}}
{{--        </div>--}}


        <div class="form-sect">
            <input type="submit" class="btn">
        </div>

    </form>

@endsection
