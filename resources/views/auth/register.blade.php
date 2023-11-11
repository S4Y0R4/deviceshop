@extends('layouts.layout')

@section('title', 'Регистрация')

@section('content')



<form action="{{route('register.process')}}" method="POST">
  @csrf
  <div class="container">
    <h1>Регистрация</h1>
    <hr>

    <label for="name"><b>Имя</b></label>
    @error('name')
      <p> {{$message}} </p>
    @enderror
    <input type="text" placeholder="Введите свое имя" name="name" required>
    
    <label for="email"><b>Почта</b></label>
    @error('email')
      <p> {{$message}} </p>
    @enderror
    <input type="text" placeholder="Введите почту" name="email" id="email" required>

    <label for="password"><b>Пароль</b></label>
    @error('password')
    <p> {{$message}} </p>
    @enderror
    <input type="password" placeholder="Введите пароль" name="password" id="password" required>

    <label for="password_confirmation"><b>Повторите пароль</b></label>
    <input type="password" placeholder="Повторите пароль" name="password_confirmation" id="password_confirmation" required>
    
    @error('password_confirmation')
    <p> {{$message}} </p>
    @enderror
    
    <hr>

    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Уже есть аккаунт? <a href="{{route('login')}}">Войти!</a>.</p>
  </div>
</form> 
@endsection