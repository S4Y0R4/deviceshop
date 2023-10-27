<h1>Список категорий</h1>
<div>
@foreach ($categories as $category)
    <li><a href="{{route('category.show', $category->id)}}">{{$category->id}}. {{ $category->categoryName }}</a></li>
@endforeach
</div>
<div>
    <a href="{{route('category.create')}}">Добавить категорию</a>
</div>