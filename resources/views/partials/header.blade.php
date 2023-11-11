
<header>
    <!-- Навигационная панель -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('main.index')}}">DeviceShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.index') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brand.index') }}">Бренды</a>
                    </li>
                </ul>
                <!-- Элементы, выровненные справа -->
                <ul class="navbar-nav ms-auto">
                    @guest('web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    @endguest
                    @auth('web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
