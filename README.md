# Кроки розгортання

## 1. Клонування репозиторію

       git clone https://github.com/KaterynaZhel/validation-task.git

## 2. Встановлення залежностей

    Перейдіть до директорії проекту

        cd validation-task/

## 3. Конфігурація середовища Скопіюйте файл .env.example у новий файл .env:

       cp .env.example .env

    Відкрийте файл .env та налаштуйте параметри підключення до бази даних та інші параметри за потреби.

## 4. Генерація ключа застосунку Виконайте команду для генерації ключа застосунку Laravel:

       php artisan key:generate

## 5. Запуск міграцій Виконайте міграції для створення таблиць бази даних:

       php artisan migrate

## 6. Запуск сервера

## 7. Запустіть веб-сервер для роботи з додатком:

       php artisan serve

    Додаток буде доступний за адресою http://localhost:8000 (або іншою, якщо ви зміните порт).

## 8. Відкриття проекту Відкрийте веб-браузер та перейдіть за адресою http://localhost:8000 для доступу до вашого проекту Laravel.
