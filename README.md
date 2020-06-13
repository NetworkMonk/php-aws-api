# PHP-AWS-API

This project is a starting point for developing a PHP API that utilizes AWS.

## Requirements

You will need PHP and Composer installed.

## Installing

Clone the repo and execute the following command in the repo directory

```sh
composer install
```

## Environment Variables

Make sure you create a .env file in the root folder and store any AWS or access keys here, do not store these keys in any other file or in source files.

## Testing the api locally

Execute the following commands to host the API locally using PHP's built in web server.

```sh
cd public
php -S 127.0.0.1:8000 index.php
```
