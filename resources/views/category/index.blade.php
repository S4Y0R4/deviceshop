<h1>Список категорий</h1>
@foreach ($categories as $category)
    <li>{{$category->id}}. {{ $category->categoryName }}</li>
@endforeach