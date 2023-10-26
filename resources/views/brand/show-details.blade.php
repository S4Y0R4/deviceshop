<div class="brand-details">
    <h1>{{ $brand->brandName }}</h1>
    @foreach ($products as $product)
        <p>{{$product->productName}}</p>
        <p>{{$product->image}}</p>
    @endforeach
    <a href="{{ url('/brands') }}">Вернуться к списку брендов</a>
</div>