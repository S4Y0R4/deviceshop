@extends('layouts.layout')

@section('title', $product->product_name)
@section('content')

<div class="product-details">
    <h1>{{ $product->product_name }}</h1>
    <p>{{ $product->product_description }}</p>
    <p>Цена: {{ $price }}</p>
    </div>

    <div>
        <a href="{{route('product.edit', $product->id)}}">Обновить/удалить продукт</a>
    </div>
    
    <a href="{{ url('/products') }}">Вернуться к списку продуктов</a>
</div>

@endsection