<h1>Список брендов</h1>
<div>
@foreach ($brands as $brand)
    <li><a href="{{route('brand.show', $brand->id)}}">{{$brand->id}}. {{$brand->brandName}}</a></li>
@endforeach
</div>
<div>
    <a href="{{route('brand.create')}}">Добавить бренд</a>
</div>