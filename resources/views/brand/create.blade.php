<h1>Добавление бренда</h1>
<form method="POST" action="{{ route('brand.store') }}">
    @csrf
    <div class="form-group">
        <label for="brand_name">Новое название бренда</label>
        <input type="text" name="brand_name" id="brand_name" class="form-control" required>
    </div>

    <button type="submit">Добавить бренд</button>
</form>