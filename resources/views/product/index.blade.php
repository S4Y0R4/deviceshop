@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<h1>Список продуктов</h1>
<div>
@foreach ($products as $product)
    <li><a href="{{route('product.show', $product->id)}}">{{$product->id}}. {{ $product->product_name }}</a></li>
@endforeach
</div>
<div>
    <a href="{{route('product.create')}}">Добавить продукт</a>
    <a href="{{route('main.index')}}">На главную</a>

</div>