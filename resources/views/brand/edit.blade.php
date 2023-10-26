<h1>Редактирование бренда</h1>
<form method="POST" action="{{ route('brand.update', $brand->id) }}">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="brandName">Название бренда</label>
        <input type="text" name="brandName" id="brandName" class="form-control" value="{{$brand->brandName}}" required>
    </div>

    <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот бренд?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить бренд</button>
    </form>

    <button type="submit">Обновить бренд</button>
</form>