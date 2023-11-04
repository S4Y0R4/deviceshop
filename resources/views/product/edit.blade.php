<h1>Редактирование продукта</h1>
<form action="{{ route('product.update', $product->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="product_name">Название продукта</label>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{$product->product_name}}" required>
    </div>

    <div class="form-group">
        <label for="product_description">Описание продукта</label>
        <textarea name="product_description" id="product_description" class="form-control" rows="6" required>{{$product->product_description}}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Категория</label>
        <select name="category_id" id="category_id" class="form-control" >
            @foreach ($categories as $category)
            <option 
                {{ $category->id === $product->category_id ? ' selected' : '' }}
                value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
    <label for="brand_id">Бренд</label>
    <select name="brand_id" id="brand_id" class="form-control" >
        @foreach ($brands as $brand)
        <option
            {{$brand->id === $product->brand_id ? 'selected' :'' }}
            value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{$price}}" required>
    </div>

    <div class="form-group">
        <label for="image">Фото товара</label>
        <input type="file" name="image" id="image" class="form-control" value= "{{$product->image}}" accept="image/*">
    </div>

    <button type="submit">Обновить продукт</button>
</form>

<form action="{{route('product.index')}}" method="GET">
    <button> К списку продуктов </button>
</form>
    
<form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить продукт</button>
</form>
