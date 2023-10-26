<h1>Список продуктов</h1>
@foreach ($products as $product)
    <li><a href="{{route('product.show', $product->id)}}">{{$product->id}}. {{ $product->productName }}</a></li>
@endforeach
