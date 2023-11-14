@extends('layouts.layout')

@section('title', 'Добавление нового бренда')

@section('content')

<h1>Добавление бренда</h1>
<form method="POST" action="{{ route('brand.store') }}">
    @csrf
    <div class="form-group">
        <label for="brand_name">Новое название бренда</label>
        <input type="text" name="brand_name" id="brand_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="brand_description">Описание бренда</label>
        <textarea name="brand_description" id="brand_description" class="form-control" rows="6" ></textarea>
    </div>

    <button type="submit">Добавить бренд</button>
</form>

<form action="{{route('brand.index')}}" method="GET">
    <button> К списку брендов </button>
</form>

@endsection