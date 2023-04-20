<?php

use memento\pattern\Editorstate;
use app\Router;
use app\Database;
use app\App;


require base_path("dp/memento/pattern/Editorstate.php");

if ($_POST['content'] === "") {
    header("Location: /memento");
    exit();
} else {
    // Add to database
    $db = App::resolve(Database::class);
    $db->insertToTable('memento', [
        'content' => $_POST['content']
    ]);

    // Set memento
    $editor = unserialize($_SESSION['editor']);
    $history = unserialize($_SESSION['history']);

    $list = $db->query("SELECT * FROM `DP`.`memento`")->fetchAll();
    $editor->setList($list);
    $history->push($editor->createState());
    $_SESSION['editor'] = serialize($editor);
    $_SESSION['history'] = serialize($history);
    // Redirect
    header("Location: /memento");
    exit();
}
