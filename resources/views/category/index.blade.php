<h1>Список категорий</h1>
@foreach ($categories as $category)
    <li><a href="{{route('category.show', $category->id)}}">{{$category->id}}. {{ $category->categoryName }}</a></li>
@endforeach