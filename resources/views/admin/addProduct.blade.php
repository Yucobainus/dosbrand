@extends('admin/admin')

@section('content')

    <div class="company-name">
        <h2>DOSBRAND-Wear</h2>
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

    <form action="{{route("add")}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-sect">
            <label for="name">
                <p>Название</p>
            </label>
            <input type="text" name="name" placeholder="Название" id="name">
        </div>

        <div class="form-sect">
            <label for="collection">
                <p>Коллекция</p>
            </label>
            <input type="text" name="collection" placeholder="Коллекция" id="collection">
        </div>

        <div class="form-sect">
            <label for="size">
                <p>Размер</p>
            </label>
            <input type="text" name="size" placeholder="e.g S M LM S" id="size">
        </div>

        <div class="form-sect">
            <label for="color">
                <p>Цвет 1</p>
            </label>
            <input type="color" name="color1" id="color">
        </div>

        <div class="form-sect">
            <label for="color">
                <p>Цвет 2</p>
            </label>
            <input type="color" name="color2"  id="color">
        </div>

        <div class="form-sect">
            <label for="color">
                <p>Цвет 3</p>
            </label>
            <input type="color" name="color3" id="color">
        </div>

        <div class="form-sect">
            <label for="sheet">
                <p>Ткань</p>
            </label>
            <input type="text" name="sheet" placeholder="Ткань" id="sheet">
        </div>

        <input type="hidden" name="fill" value="notusing" placeholder="Состав" id="fill">
        <div class="form-sect">
            <label for="description">
                <p>Описание</p>
            </label>
            <input type="text" name="description" placeholder="Описание" id="description">
        </div>

        <div class="form-sect">
            <label for="price">
                <p>Цена</p>
            </label>
            <input type="number" name="price" placeholder="Цена" id="price">
        </div>

        <div class="form-sect">
            <label for="photo">
                <p>Главное фото</p>
            </label>
            <input type="file" name="mainPhoto" id="mainPhoto" accept="image/*" class="filePlace">
        </div>

        <div class="form-sect">
            <label for="photo">
                <p>Дополнительные фотографии</p>
            </label>
            <input type="file" name="photo[]" id="photo[]" multiple accept="image/*" class="filePlace">
        </div>


        <div class="form-sect">
            <input type="submit" class="btn">
        </div>

    </form>

@endsection
