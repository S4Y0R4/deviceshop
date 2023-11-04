<h1>Добавление категории</h1>
<form method="POST" action="{{ route('category.store') }}">
    @csrf
    <div class="form-group">
        <label for="category_name">Новое название категории</label>
        <input type="text" name="category_name" id="category_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="category_description">Описание категории</label>
        <textarea name="category_description" id="category_description" class="form-control" rows="6" required></textarea>
    </div>

    <button type="submit">Добавить категорию</button>
</form>

<form action="{{route('category.index')}}" method="GET">
    <button> К списку категорий </button>
</form>
    