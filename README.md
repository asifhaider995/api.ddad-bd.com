#### Required software
1) PHP 7.2
2) Composer
3) Apache
4) MySQL
5) Other required package by composer

#### Instalation guideline
1) Install dependencies running the command `composer install`
2) Copy `.env.example` to `.env`
3) Update `.env` veriables(Database, Email, Storage ans others)
4) Give permission to storage and bootstrap/cache folder
5) Migrate database `php artisan migrate`
6) Insert reduired data to database `php adtisan db:seed`



##### View Folder Structure Overview
```
resources
    |--views
    |   |--auth
    |   |   |--layout.blade.view
    |   |   |--login.blade.view
    |   | 
    |   |--pos
    |   |   |--partials
    |   |   |--layout.blade.php
    |   |   |
    |   |   |--payment
    |   |   |   |--index.blade.php
    |   |   |   |--create.blade.php
    |   |   |
    |   |   |--campaign
    |   |   |   |--index.blade.php
    |   |   |   |--create.blade.php       
    |    
    |--js
    |   |--ddad.js
    |
    |--sass
    |   |--ddad.sass
  
--app
    |--Models
    |   |--User.php
    |   |--Ddad
    |   |   |--Campaign.php
    |   |   |--Payment.php
    |
    |--Providers
    |   |--DdadServiceProvider.blade.php
    |
    |--Http/Controllers
    |   |--Auth
    |   |--Pos
    |   |   |--CampaignController.php
    |   |   |--DashboardController.php
    
config
    |--ddad.php

routes
    |--ddad.php



```
