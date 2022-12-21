<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Тестовое задание</h1>
    <br>
</p>

Структура файлов
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      modules/            contains module classes
      migrations/         contains migration classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      themes/             contains theme template files
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



Необходимый софт
------------

PHP версии 7 и выше, Mysql

Установка
------------

### Install via Composer

Шаг 1. Склонировать репозиторий

~~~
git clone
~~~
_______
Шаг 2. Установить зависимости

~~~
composer install
composer update
~~~
_______
Шаг 3. Подключение базы данных

В файле `config/db.php` установите данные от созданной базы данных:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
_______
Шаг 4. Создать таблицы с помощью миграций

~~~
php yii migrate
~~~
Будет создано 3 таблицы:

user,
lesson,
viewed,

Так же будет создано 2 пользователя:

admin (admin@diontech.loc/asd123)
student1 (student1@diontech.loc/asd123)
_______

Шаг 5. Создать таблицы для RBAC

```
php yii migrate/up --migrationPath=@yii/rbac/migrations
```
Будут созданы 4 auth_ таблицы

________

Шаг 6. Создать роли и права, назначить права пользователям

 ```
php yii rbac/migrate
 ```

Будет создано 11 разрешений и 2 роли admin и student

Пользователю admin будут присвоены все права student плюс возможность управлять пользователями, правами и удалять данные

Шаг 7. Наслаждаться