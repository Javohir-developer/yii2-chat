<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.com/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.com/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```


запуск проекта
1 composer install
2 php init
3 windows: yii migrate
  ubuntu:  php yii migrate
4 windows: yii migrate --migrationPath=@yii/rbac/migrations
  ubuntu: php yii migrate --migrationPath=@yii/rbac/migrations
  
5 windows: yii rbac/init
  ubuntu:  php yii rbac/init
  
  
6   проект был сделан на backend части yii2 friendworki
    .htaccess для пользователей apachi
    Те, кто использует nginx, могут указать на простату бакканд
    
5   Для письменной базы данных миграции здесь,
    на всякий случай закинул базу sql(yii2_chat.sql) в проект
    


```
