@extends('layouts.layout')

@section('title', 'Список категорий')
@section('content')


<h1>Список категорий</h1>
<div>
@foreach ($categories as $category)
    <li><a href="{{route('category.show', $category->id)}}">{{$category->id}}. {{ $category->category_name }}</a></li>
@endforeach
</div>

<div>
    <a href="{{route('category.create')}}">Добавить категорию</a>
    <a href="{{route('main.index')}}">На главную</a>
</div>

@endsection