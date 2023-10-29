<h1>Добавление категории</h1>
<form method="POST" action="{{ route('category.store') }}">
    @csrf
    <div class="form-group">
        <label for="category_name">Новое название категории</label>
        <input type="text" name="category_name" id="category_name" class="form-control" required>
    </div>

    <button type="submit">Добавить категорию</button>
</form>