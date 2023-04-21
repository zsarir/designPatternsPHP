<?php

use Mobin\DesignPatterns\App\Database;
use Mobin\DesignPatterns\App\Container;
use Mobin\DesignPatterns\App\App;




$container = new Container();
dd("hello");
$container->bind('App\Database', function () {
    $config = require base_path('config.php');

    return new Database($config);
});

App::setContainer($container);
