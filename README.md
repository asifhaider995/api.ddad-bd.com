## About Laravel Admin Folder


## View Folder Structure Overview
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
    |   |   |--customers
    |   |   |   |--index.blade.php
    |   |   |   |--create.blade.php
    |   |   |
    |   |   |--suppliers
    |   |   |   |--index.blade.php
    |   |   |   |--create.blade.php       
    |    
    |--js
    |   |--pos.js
    |
    |--sass
    |   |--pos.sass
  
--app
    |--Models
    |   |--User.php
    |   |--Pos
    |   |   |--Supplier.php
    |   |   |--Customer.php
    |
    |--Providers
    |   |--PosServiceProvider.blade.php
    |
    |--Http/Controllers
    |   |--Auth
    |   |--Pos
    |   |   |--SupplierController.php
    |   |   |--CustomerController.php
    
config
    |--pos.php

routes
    |--pos.php



```

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to _Shahadat_ via [shahadat@laralink.com](mailto:shahadat@laralink.com). All security vulnerabilities will be promptly addressed.

## License

The **Laralink Admin Fodler** is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
