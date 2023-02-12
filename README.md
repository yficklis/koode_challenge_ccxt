# Koode Challenge CCXT - GET API 
###### Developed by Yficklis Santos

## Requirements

- [Required] PHP version 8.0.9 https://www.php.net/downloads.php
- [Required] Laravel Framework version 8.54.0 https://laravel.com/docs/8.x/installation
- [Required] Composer version 2.1.5 https://getcomposer.org/download/

## Development

If you contribute in any way to this aplication, at the end you will need to validate the code, executing the codesniffer.

```bash
$ composer require friendsofphp/php-cs-fixer --dev

or 

$ composer global update friendsofphp/php-cs-fixer

$ php-cs-fixer fix .\php-cs-fixer.dist.php
```

## Running Migrations
```
$ php artisan migrate:refresh
```

If not exists create a _database.sqlite_ file in the _database\database.sqlite_ directory

## Webserver
```
# Run the webserver on port 8000
$ php artisan serve
```

## API Documentation

```
http://127.0.0.1:8000/api/fetch_balance
http://127.0.0.1:8000/api/load_markets
```


## PHP INI
:warning: Check if your php.ini has this extension

```
extension=pdo_mysql
extension=pdo_mysql.so
extension=fileinfo
extension=gd
extension=pdo_sqlite
extension=openssl
extension=php_curl.dll
extension=zip
extension=mbstring
extension=exif      ; Must be after mbstring as it depends on it
```
