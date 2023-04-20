<?php

use app\Database;
use app\App;

require base_path("dp/memento/pattern/Editorstate.php");

$db = App::resolve(Database::class);

if ($_GET['btnaction'] === 'deleteAll') {
    $db->query(
        "DELETE  FROM `DP`.`memento`"
    );
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
if ($_GET['send'] === "delete") {

    $db->query(
        "DELETE FROM `DP`.`memento` WHERE `id` = :id",
        [
            'id' => $_GET['id']
        ]
    );
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
} else if ($_GET['send'] === "edit") {
    $db->query(
        "UPDATE `DP`.`memento` SET `content` = :content WHERE `id` = :id;",
        [
            'content' => $_GET['selected'],
            'id' => $_GET['id']
        ]
    );
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
