<h1>Создание новой категории</h1>
<form method="POST" action="{{ route('category.store') }}">
    @csrf
    <div class="form-group">
        <label for="categoryName">Название новой категории</label>
        <input type="text" name="categoryName" id="categoryName" class="form-control" required>
    </div>

    <button type="submit">Добавить продукт</button>
</form>