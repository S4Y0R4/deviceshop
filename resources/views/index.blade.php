@foreach ($categories as $category)
    <div><a href="{{route('category.show', $category->id)}}">{{$category->category_name}}</a></div>
@endforeach

@foreach ($products as $product)
    <div><a href="{{route('product.show', $product->id)}}">{{$product->product_name . ' ' . $product->latestPrice()->new_price}}</a></div>
@endforeach

<div>
    <a href="{{route('brand.index')}}">Список брендов</a>
    <a href="{{route('category.index')}}">Список категорий</a>
    <a href="{{route('product.index')}}">Список продуктов</a>

</div>
