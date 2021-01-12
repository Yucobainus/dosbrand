@extends('admin/admin')

@section('content')

    <div class="lines-wrapper">
        @foreach($data as $el)
                <div class="onepr">

                    <img src="{{asset("public/".$el->mainPhoto)}}">
                    <div>
                        <p>{{$el->name}}</p>
                    </div>
                    <div>
                        <p>{{$el->price}} сум</p>
                    </div>
                    <div class="update"><a href="{{route('product-update', $el->id)}}">Редактировать</a>
                    </div>
                    <div class="delete"><a href="{{route('product-delete', $el->id)}}">Удалить</a></div>
                </div>
        @endforeach
    </div>

@endsection
