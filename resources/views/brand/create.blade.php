<h1>Добавление нового бренда</h1>
<form method="POST" action="{{ route('brand.store') }}">
    @csrf
    <div class="form-group">
        <label for="brandName">Бренд</label>
        <input type="text" name="brandName" id="brandName" class="form-control" required>
    </div>

    <button type="submit">Добавить бренд</button>
</form>