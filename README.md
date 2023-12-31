# Computer Store Backend

Backend-часть для веб-приложения магазина компьютерных девайсов, реализованная с использованием фреймворка Laravel в Docker контейнерах.


## Описание

Этот проект представляет собой API для интернет-магазина, специализирующегося на продаже компьютерной техники и аксессуаров. Он обеспечивает управление товарами, заказами, пользователями и предоставляет функционал корзины покупок. Проект поддерживает как REST API, так и GraphQL.


## Технологический стек

- PHP 8.1.2
- Laravel 9.52.16
- MySQL
- phpMyAdmin
- Docker
- Laravel Passport для аутентификации
- GraphQL


## Функциональные возможности

- CRUD операции для продуктов, категорий и заказов через REST API.
- GraphQL API для взаимодействия с продуктами и заказами.
- Поиск и фильтрация товаров.
- Аутентификация и авторизация пользователей.
- Корзина покупок.
- Оформление заказа.
- Управление пользователями (для администратора).


## Установка

Перед началом убедитесь, что у вас установлены Docker и Docker Compose.


1. Клонировать репозиторий:

git clone https://github.com/S4Y0R4/deviceshop.git

cd deviceshop


2. Переименовать файл `.env.example` в `.env`:

cp .env.example .env


3. Запустить Docker контейнеры:

docker-compose up -d


4. Установить зависимости Composer:

docker-compose exec app composer install


5. Выполнить миграции базы данных:

docker-compose exec app php artisan migrate


6. Установить Laravel Passport для аутентификации:

docker-compose exec app php artisan passport:install
___________________________________________________________________________

API теперь будет доступно по адресу http://localhost:8000/api
