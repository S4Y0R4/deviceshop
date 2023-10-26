<h1>Создание нового продукта</h1>
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div class="form-group">
        <label for="productName">Название продукта</label>
        <input type="text" name="productName" id="productName" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Описание продукта</label>
        <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
    </div>

    <div class="form-group">
        <label for="categoryName">Категория</label>
        <select name="categoryName" id="categoryName" class="form-control" required>
            <option value="">Выберите существующую категорию</option>
            @foreach ($categories as $category)
                <option value="{{ $category->categoryName }}">{{ $category->categoryName }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <label for="brandName">Бренд</label>
    <select name="brandName" id="brandName" class="form-control" required>
        <option value="">Выберите существующующий бренд</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->brandName }}">{{ $brand->brandName }}</option>
        @endforeach
    </select>
</div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="image">Фото товара</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>

    <button type="submit">Добавить продукт</button>
</form>