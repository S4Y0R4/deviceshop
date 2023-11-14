@extends('layouts.layout')

@section('title', $brand->brand_name)
@section('content')

<div class="brand-details">
    <h1>{{ $brand->brand_name }}</h1>
    <p>{{ $brand->brand_description }}</p>
    </div>
    
    <div>
        <a href="{{route('brand.edit', $brand->id)}}">Обновить/удалить бренд</a>
    </div>

    <a href="{{ url('/brands') }}">Вернуться к списку брендов</a>
</div>

@endsection