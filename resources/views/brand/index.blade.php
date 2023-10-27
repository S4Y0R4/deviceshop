<h1>Список брендов</h1>
@foreach ($brands as $brand)
    <li><a href="{{route('brand.show', $brand->id)}}">{{$brand->id}}. {{$brand->brandName}}</a></li>
@endforeach
