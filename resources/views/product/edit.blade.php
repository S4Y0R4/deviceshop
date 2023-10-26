<h1>Редактирование продукта</h1>
<form action="{{ route('product.update', $product->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="productName">Название продукта</label>
        <input type="text" name="productName" id="productName" class="form-control" value="{{$product->productName}}" required>
    </div>

    <div class="form-group">
        <label for="description">Описание продукта</label>
        <textarea name="description" id="description" class="form-control" rows="6" required>{{$product->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="categoryName">Категория</label>
        <select name="categoryName" id="categoryName" class="form-control" >
            <option value="">{{$currentCategoryName}}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->categoryName }}">{{ $category->categoryName }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <label for="brandName">Бренд</label>
    <select name="brandName" id="brandName" class="form-control" >
        <option value="">{{$currentBrandName}}</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->brandName }}">{{ $brand->brandName }}</option>
        @endforeach
    </select>
</div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{$product->price}}" required>
    </div>

    <div class="form-group">
        <label for="image">Фото товара</label>
        <input type="file" name="image" id="image" class="form-control" value= "{{$product->image}}" accept="image/*">
    </div>

    <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить продукт</button>
    </form>

    <button type="submit">Обновить продукт</button>
</form>