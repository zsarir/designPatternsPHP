<?php

use app\Database;
use app\App;

require base_path("dp/memento/pattern/Editorstate.php");
// Set memento
$history = unserialize($_SESSION['history']);
$list = $history->pop()->getList();
$db = App::resolve(Database::class);
$db->query(
    "DELETE  FROM `DP`.`memento`"
);

foreach ($list as $item) {
    $db->insertToTable('memento', [
        'content' => $item['content']
    ]);
}
$_SESSION['history'] = serialize($history);
// Redirect
header("Location: /memento");
exit();
