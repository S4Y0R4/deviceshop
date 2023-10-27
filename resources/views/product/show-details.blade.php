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

<div class="product-details">
    <h1>{{ $product->productName }}</h1>
    <p>{{ $product->description }}</p>
    <p>Цена: {{ $product->price }}</p>

    <div>
        <a href="{{route('product.edit', $product->id)}}">Обновить/удалить продукт</a>
    </div>
    <a href="{{ url('/products') }}">Вернуться к списку продуктов</a>
</div>