<h1>Редактирование категории</h1>
<form method="POST" action="{{ route('category.update', $category->id) }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="categoryName">Название категории</label>
        <input type="text" name="categoryName" id="categoryName" value="{{$category->categoryName}}" class="form-control" required>
    </div>

    <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить категорию</button>
    </form>


    <button type="submit">Обновить категорию/button>
</form>