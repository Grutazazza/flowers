@extends('welcome')
@section('title','Регистрация'){{--Это тайтл--}}
@section('content'){{--Это секция что будет вставлена в welcome--}}
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-6 col-12">
                <form method="POST" action="{{route('registerPost')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Ваш логин</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" id="inputLogin" name="login" aria-describedby="inputLoginValidation">
                        @error('login')
                        <div id="inputLoginValidation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Ваш телефон</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" name="phone">
                        @error('phone')
                        <div id="inputPhoneValidation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name">
                        @error('name')
                        <div id="inputNameValidation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Ваш пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" aria-describedby="inputPasswordValidation">
                        @error('password')
                        <div id="inputPasswordValidation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password_confirmation" aria-describedby="inputPasswordValidation">
                        @error('password')
                        <div id="inputPasswordValidation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
