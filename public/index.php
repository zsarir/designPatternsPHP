<?php
session_start();

use memento\pattern\History;
use memento\pattern\Editor;
use app\Router;


const SITE_URL = 'https://designpatterns';
const BASE_PATH = __DIR__  . '/../';

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $uri = $uri['path'];
} else {
    exit();
}

require  '../core/functions.php';


spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});



require base_path('bootstrap.php');

require base_path('dp/memento/pattern/History.php');
require base_path('dp/memento/pattern/Editor.php');
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
