<<<<<<< HEAD
# kulinerjaktim
Aplikasi Sistem Informasi Administrasi Kuliner Jakarta Timur
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About This App
this app already supported with REST API.

#### Example HTTP Request
```json
GET www.kulinerjakarta.test/place
```

#### Response
```json
 "data": [
        {
            "id": 1,
            "name": "Kopi Malam",
            "description": "tempat nongki asik",
            "address": "Jln babu",
            "phone": "08123892832",
            "image": "http://kulinerjakarta.test/images/EnPEa4KnwYUEEU4g9ZYfC0CZ5Gu819RMctHz0IoU.jpg",
            "latitude": -6.181771550481679,
            "longitude": 106.82558298110963,
            "sub_district": {
                "id": 2,
                "name": "Cipayung",
                "slug": "cipayung"
            },
            "is_favourited": false
        }
```

#### Another HTTP Request

##### List Related Tempat Kuliner 
GET http://kulinerjakarta.test/place/{id}/related

##### Cari Tempat Kuliner
GET http://kulinerjakarta.test/place/search?keyword={Keyword}

##### List Detail Tempat Kuliner
GET http://kulinerjakarta.test/place/{id}

##### List Menu Tempat Kuliner
GET http://kulinerjakarta.test/place/{id}/menu

##### List Detail Menu
GET http://kulinerjakarta.test/place/{place:id}/menu/{menu:id}

##### List Kecamatan Jakarta Timur
GET http://kulinerjakarta.test/sub-district

##### Detail Jumlah Tempat Kuliner di kecamatan
GET http://kulinerjakarta.test/sub-district/{id}

##### List detail Tempat Kuliner di kecamatan 
GET http://kulinerjakarta.test/sub-district/{sub_district:id}/place

##### Register Akun
POST http://kulinerjakarta.test/register

##### Login
POST http://kulinerjakarta.test/login

##### List Detail User
GET http://kulinerjakarta.test/user

##### Menambahkan Tempat Kuliner Favourite
POST http://kulinerjakarta.test/user/place/{id}/favourite

##### List Tempat Favourite User 
GET http://kulinerjakarta.test/user/place/

##### Menghapus Tempat Kuliner Favourite
DELETE http://kulinerjakarta.test/user/place/{id}/favourite


## Tech stack in this App
**[Laravel Framework 9.51.0](https://laravel.com/docs/9.x)**
**[Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)**
**[Tabler.Io](https://tabler.io/)**
**[Yajra Datatables](https://yajrabox.com/docs/laravel-datatables/9.0/installation)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> c403e29 (first commit)
