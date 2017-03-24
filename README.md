# Laravel Timezones

Timezone bundle for Laravel.

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require kennethllamasares/laravel-timezones
```

And then include the service provider within `app/config/app.php`.

``` php
KennethLlamasares\Timezones\TimezonesServiceProvider::class
```

To get started, you'll need to publish the vendor assets and migrate the timezones table:

```bash
php artisan vendor:publish --provider="KennethLlamasares\Timezones\TimezonesServiceProvider" && php artisan migrate
```

Now you can seed the timezones into the database like this.

```bash
php artisan timezones:seed
```