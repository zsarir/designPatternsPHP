<?php

use Mobin\DesignPatterns\Patterns\Memento\History;
use Mobin\DesignPatterns\Patterns\Memento\Editor;
use Mobin\DesignPatterns\App\Router;

require_once '../vendor/autoload.php';

session_start();



const SITE_URL = 'https://designpatterns';
const BASE_PATH = __DIR__  . '/../';

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $uri = $uri['path'];
} else {
    exit();
}

require  '../core/functions.php';

require base_path('bootstrap.php');


// Memento Objects
if (!isset($_SESSION['editor']) || !isset($_SESSION['history'])) {
    $editor = new Editor;
    $history = new History;
    $_SESSION['editor'] =  serialize($editor);
    $_SESSION['history'] =  serialize($history);
}





$routings = new Router;
require base_path("core/routes.php");

$routings->applyRoute($uri, $_SERVER['REQUEST_METHOD']);
