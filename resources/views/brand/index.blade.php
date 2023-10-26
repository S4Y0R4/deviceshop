<h1>Список брендов</h1>
@foreach ($brands as $brand)
    <li>{{$brand->id}}. {{$brand->brandName}}</li>
@endforeach
