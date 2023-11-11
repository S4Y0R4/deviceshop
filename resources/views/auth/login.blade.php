@extends('layouts.layout')

@section('title', 'Авторизация')

@section('content')

<form action="{{ route('login.process') }}" method="post">
  @csrf
    <div class="container">
        @error('email')
        <p> {{$message}} </p>
        @enderror
        <label for="email"><b>Почта</b></label>
        <input type="text" placeholder="Введите почту" name="email" id="email" required>

        @error('password')
        <p> {{$message}} </p>
        @enderror
        <label for="password"><b>Пароль</b></label>
        <input type="password" placeholder="Введите пароль" name="password" id="password" required>

        <button type="submit">Войти</button> <span class="password"><a href="#">Забыли пароль?</a></span>
    </div>

    <hr>

    <div class="container" style="background-color:#f1f1f1">
        <span class="password"><a href="{{route('register')}}">Нет аккаунта?</a></span>
    </div>
</form>

@endsection
