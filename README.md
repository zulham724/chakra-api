
# Chakra UI Webservice

API Gateway untuk Chakra UI Admin dengan Laravel 9

[Github Chakra UI](https://github.com/zulham724/chakra-admin) 


## Demo

Untuk admin panel laravel dapat mengunjungi =>
https://phpstack-469989-2205733.cloudwaysapps.com/admin

Untuk admin panel Chakra UI dapat mengunjungi =>
https://chakra-admin.vercel.app

`email: admin@admin.com`
`password: password`


## Screenshots 

![App Screenshot](https://s3.us-west-1.wasabisys.com/cdn-agpaiidigital.online/chakra/Voyager-Welcome-to-Voyager-The-Missing-Admin-for-Laravel.png)




## Installation

Install using composer

```bash
  cd my-project
  composer install
```

```bash
  php artisan key:generate
```

Setting database .env lalu


```bash
  php artisan voyager:install --with-dummy
  php artisan passport:install
```

Laravel voyager --with-dummy akan sekalian menginstall table dasar dan seeder

Lalu gunakan `client_id` dan `client_secret` di table oauth_clients untuk request API
    
## Environment Variables

Filesystem menggunakan S3 

`FILESYSTEM_DISK=wasabi`

`WAS_ACCESS_KEY_ID=`
`WAS_SECRET_ACCESS_KEY=`
`WAS_DEFAULT_REGION=`
`WAS_BUCKET=`

Atau menggunakan menggunakan local filesystem saja hanya mengisi 

`FILESYSTEM_DISK=local`





# List API

Selalu gunakan prefix url di setiap url dengan `/api/admin` lalu lanjutkan dengan End-point masing-masing

## End-point: /login
### Method: POST
>```
>{{url}}/api/admin/login
>```
### Body formdata

|Param|value|Type|
|---|---|---|
|grant_type|password|text|
|client_id|{{client_id}}|text|
|client_secret|{{client_secret}}|text|
|email|admin@admin.com|text|
|password|password|text|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: /post (index)
### Method: GET
>```
>{{url}}/api/admin/post
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: /post (store)
### Method: POST
>```
>{{url}}/api/admin/post
>```
### Body formdata

|Param|value|Type|
|---|---|---|
|title|Something|text|
|excerpt|Something|text|
|body|Something|text|
|status|Something|text|
|image||file|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: /post/{id} (show)
### Method: GET
>```
>{{url}}/api/admin/post/1
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: /post/{id} (update)
### Method: POST
>```
>{{url}}/api/admin/post/1
>```
### Body formdata

|Param|value|Type|
|---|---|---|
|title|Something|text|
|excerpt|Something|text|
|body|Something|text|
|status|Something|text|
|image|Something|text|
|_method|put|text|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: /post/{id} (destroy)
### Method: POST
>```
>{{url}}/api/admin/post/1
>```
### Body formdata

|Param|value|Type|
|---|---|---|
|_method|delete|text|



## Documentation

[Laravel](https://laravel.com)
[Laravel Voyager](https://voyager-docs.devdojo.com/)
[Laravel Passport](https://laravel.com/docs/9.x/passport)


## Authors

- [@zulham724](https://www.github.com/zulham724)



