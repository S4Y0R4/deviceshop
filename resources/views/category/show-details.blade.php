@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="category-details">
    <h1>{{ $category->category_name }}</h1>
    <p>{{ $category->category_description }}</p>
    </div>
    
    <div>
        <a href="{{route('category.edit', $category->id)}}">Обновить/удалить категорию</a>
    </div>

    <a href="{{ url('/categories') }}">Вернуться к списку категорий</a>
</div>