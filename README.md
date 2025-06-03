# Bonus Calculator API

Это REST API-сервис на Laravel, реализующий расчет бонусов по гибким правилам.

## 🚀 Быстрый запуск в Docker

### 1. Клонируй репозиторий:

```bash
https://github.com/LastOfWhom/calculate.git
cd calculate
```
### P.S. Переключись на develop ветку. Весь проект находится там

### 2. Запусти контейнер:
```
docker compose up -d --build
```
### 3. Установи зависимости (в контейнере):
```
docker exec -it {id контейнера} bash
composer install
```
### 4. Запусти сервер
```
php artisan serve --host=0.0.0.0 --port=8000
```

### Данные для изменения расчётов хранятся в файле конфигурации config/bonus/bonus_rule.
