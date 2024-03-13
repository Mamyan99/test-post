# Test

## Запуск с нуля с подготовленной базой
```bash
make init
```

- Запускается вместе с базой данных (PgsqlDB)


## Остановка приложения
``` bash
make down
```

## Доступы к бд
**БД:** `test`

**Юзер:** `test`

**Пароль:** `secret`

## Версии
**PHP-FPM:** 8.2 под Alpine 3.16

**PgsqlDB:** 14.4 под Alpine 3.16

**Nginx:** 1.23.1 под Alpine 3.16

## Применение
You can use tools like Postman or cURL to interact with the API endpoints.

## Endpoints
**GET:** /api/posts: Получение списка постов

**GET:** /api/posts/{id}: Получение конкретного поста

**POST:** /api/posts: Создание поста

**PUT:** /api/posts/{id}: Изменение поста

**DELETE:** /api/posts/{id}: Удаление поста



