@extends('layouts.layout')

@section('title', 'Редактирование категории')
@section('content')

<h1>Редактирование категории</h1>
<form action="{{ route('category.update', $category->id) }}" method="POST" >
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="category_name">Название категории</label>
        <input type="text" name="category_name" id="category_name" value="{{$category->category_name}}" class="form-control" required>
    </div>
    <div>
        <label for="category_description">Описание категории</label> 
        <textarea name="category_description" id="category_description" class="form-control" rows="6" >{{$category->category_description}}</textarea>
    </div>

    <button type="submit">Обновить категорию</button>
</form>

<form action="{{route('category.index')}}" method="GET">
    <button> К списку категорий </button>
</form>

<form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить категорию</button>
</form>

@endsection