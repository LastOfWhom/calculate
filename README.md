# Bonus Calculator API

Это REST API-сервис на Laravel, реализующий расчет бонусов по гибким правилам.

## 🚀 Быстрый запуск в Docker

### 1. Клонируй репозиторий:

```bash
https://github.com/LastOfWhom/calculate.git
cd bonus-calculator-api
```
### 2. Запусти контейнер:
```
docker compose up -d --build
```
### 3. Установи зависимости (в контейнере):
```
docker compose exec app composer install
``` либо вместо app поставь id контейнера
```
### 4. Сгенерируй ключ приложения
```
docker compose exec app php artisan key:generate
```

### Данные для изменения расчётов хранятся в файле конфигурации config/bonus/bonus_rule.
