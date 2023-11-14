@extends('layouts.layout')

@section('title', 'Список продуктов')

@section('content')

<h1>Список брендов</h1>
<div>
@foreach ($brands as $brand)
    <li><a href="{{route('brand.show', $brand->id)}}">{{$brand->id}}. {{$brand->brand_name}}</a></li>
@endforeach
</div>

<div>
    <a href="{{route('brand.create')}}">Добавить бренд</a>
    <a href="{{route('main.index')}}">На главную</a>
</div>

@endsection