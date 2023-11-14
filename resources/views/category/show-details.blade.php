@extends('layouts.layout')

@section('title', $category->category_name)
@section('content')


<div class="category-details">
    <h1>{{ $category->category_name }}</h1>
    <p>{{ $category->category_description }}</p>
    </div>
    
    <div>
        <a href="{{route('category.edit', $category->id)}}">Обновить/удалить категорию</a>
    </div>

    <a href="{{ url('/categories') }}">Вернуться к списку категорий</a>
</div>

@endsection