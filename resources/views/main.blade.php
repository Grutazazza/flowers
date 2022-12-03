@extends('welcome')

@section('title','О нас'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>О нас</h3>
                <div class="card mb-3">
                    <img src="..." class="card-img-top" alt="логотип компании">
                    <div class="card-body">
                        <h5 class="card-title">Мир цветов</h5>
                        <p class="card-text">Девиз компании.</p>
                    </div>
                </div>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{$tovars[0]->photo}}" class="d-block w-100" alt="{{$tovars[0]->name}}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$tovars[0]->name}}</h5>
                            </div>
                        </div>
                        @foreach($tovars as $tovar)
                            @if ($loop->first) @continue @endif
                            <div class="carousel-item">
                                <img src="{{$tovar->photo}}" class="d-block w-100" alt="{{$tovar->name}}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$tovar->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
