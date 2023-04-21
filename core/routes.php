<?php
// MEMENTO Route
$routings->get("/memento", "Patterns/Memento/index.view.php");
$routings->post("/memento/add", "Patterns/Memento/add.php");
// $routings->post("/Memento/edit", "Patterns/Memento/edit.php");
$routings->get("/memento/edit", "Patterns/Memento/edit.php");
$routings->get("/memento/undo", "Patterns/Memento/undo.php");

$routings->get("/", "Patterns/Memento/index.view.php");
