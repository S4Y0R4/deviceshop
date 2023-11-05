<h1>DeviceShop</h1>
Бренды
@foreach ($brands as $brand)
    <div><a href="{{route('brand.show', $brand->id)}}">{{$brand->brand_name}}</a></div>
@endforeach
Категории
@foreach ($categories as $category)
    <div><a href="{{route('category.show', $category->id)}}">{{$category->category_name}}</a></div>
@endforeach


Продукты
@foreach ($products as $product)
    <div><a href="{{route('product.show', $product->id)}}">{{$product->product_name . ' ' . $product->latestPrice()->new_price}}</a></div>
@endforeach

<div>
    <p><a href="{{route('brand.index')}}">Список брендов</a></p>
    <p><a href="{{route('category.index')}}">Список категорий</a></p>
    <p><a href="{{route('product.index')}}">Список продуктов</a></p>

</div>
