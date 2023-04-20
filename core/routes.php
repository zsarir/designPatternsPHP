<?php
// MEMENTO Route
$routings->get("/memento", "dp/memento/index.view.php");
$routings->post("/memento/add", "dp/memento/add.php");
// $routings->post("/memento/edit", "dp/memento/edit.php");
$routings->get("/memento/edit", "dp/memento/edit.php");
$routings->get("/memento/undo", "dp/memento/undo.php");

$routings->get("/", "dp/memento/index.view.php");
