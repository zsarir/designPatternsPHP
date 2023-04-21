<?php

use Mobin\DesignPatterns\App\Database;
use Mobin\DesignPatterns\App\App;



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
