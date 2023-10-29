<h1>Редактирование категории</h1>
<form method="POST" action="{{ route('category.update', $category->id) }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="category_name">Название категории</label>
        <input type="text" name="category_name" id="category_name" value="{{$category->category_name}}" class="form-control" required>
    </div>

    <button type="submit">Обновить категорию</button>
</form>

<form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить категорию</button>
</form>