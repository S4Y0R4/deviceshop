<div class="product-details">
    <h1>{{ $product->productName }}</h1>
    <p>{{ $product->description }}</p>
    <p>Цена: {{ $product->price }}</p>

    <a href="{{ url('/products') }}">Вернуться к списку продуктов</a>
</div>