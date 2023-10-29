<h1>Редактирование бренда</h1>
<form action="{{ route('brand.update', $brand->id) }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="brand_name">Название бренда</label>
        <input type="text" name="brand_name" id="brand_name" class="form-control" value="{{$brand->brand_name}}" required>
    </div>

    <button type="submit">Обновить бренд</button>
</form>

<form action="{{ route('brand.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот бренд?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить бренд</button>
</form>