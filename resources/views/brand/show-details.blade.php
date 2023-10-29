@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="brand-details">
    <h1>{{ $brand->brand_name }}</h1>
    <div>
        <a href="{{route('brand.edit', $brand->id)}}">Обновить/удалить бренд</a>
    </div>
    <a href="{{ url('/brands') }}">Вернуться к списку брендов</a>
</div>