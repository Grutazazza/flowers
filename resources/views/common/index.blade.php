@extends('welcome')

@section('title','главная страница'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
<div class="container">
    <div class="row">
        @if(session('basket')==true)
            <div class="alert alert-success" role="alert">
                Добавлен!
            </div>
        @endif
        <div class="col"></div>
        <div class="col-12 ">
            <h2>Каталог</h2>
            <div class="row">
                @foreach($tovars as $tovar)
                    <div class="col-4 mb-4">
                        <div class="card " style="width: 100%; height: 500px">
                            <img src="{{asset('/storage/app/public/'.$tovar->photo)}}" class="card-img-top" alt="{{$tovar->name}}">
                            <div class="card-body d-flex flex-column justify-content-around">
                                <h5 class="card-title">{{$tovar->name}}</h5>
                                <h5 class="card-title">{{$tovar->price}}</h5>
                                <p class="card-text">{{$tovar->description}}</p>
                                <div class="row d-flex justify-content-evenly">
                                    <a href="{{route('show',['tovar'=>$tovar->id])}}" class="btn btn-primary" style="width: 200px">Посмотреть</a>
                                    @if(isset(auth()->id))
                                        @if(!isset(\App\Models\Basket::all()->where('user_id',auth()->id)->where('status','Оформляется')->first()[$tovar->id]))
                                            <a href="{{route('add',['tovar'=>$tovar->id])}}" class="btn btn-warning" style="width: 200px">Добавить</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$tovars->links()}}
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
