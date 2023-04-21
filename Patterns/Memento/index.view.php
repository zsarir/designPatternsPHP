<?php require "header.php";

use Mobin\DesignPatterns\App\Database;
use Mobin\DesignPatterns\App\App;
?>

<div class="wrapper">
    <h1 class="text-primary mb-5">Memento pattern in PHP</h1>
    <form method="POST" action="memento/add">
        <div class="col">
            <input class="form-control lh-lg w-25 memento-input mx-auto " name="content" type="text">
        </div>
        <div class="col mt-3">
            <button name="btnaction" value="add" type="submit" class="col btn btn-primary">Add</button>
            <button formmethod="get" formaction="/memento/edit" name="btnaction" value="deleteAll" type="submit" class="col btn btn-primary">Delete All</button>
            <button name="btnaction" formmethod="get" formaction="/memento/undo" value="undo" type="submit" class="col btn btn-secondary">Undo</button>
        </div>
    </form>

    <div class="results mt-4">
        <?php
        $db = App::resolve(Database::class);
        $contents = $db->query("SELECT * FROM `DP`.`memento`")->fetchAll();
        foreach ($contents as $content) {
            echo "
            <div class='col-md-4'>
                <div class='card mt-1 px-3 pr-1'>
                    <div class='card-body'>
                        <form action='/memento/edit' method='GET'>
                            <div class='row'>
                                <input value='" . $content['content'] . " ' type='text' name='selected' class='col' placeholder='" . $content['content'] . " '>
                                <input type='hidden' value='" . $content['id'] . "' name='id'>
                                <div class='col text-right'>
                                    <button name='send' value='edit' type='submit' class='btn btn-primary' >Edit</button>
                                    <button name='send' value='delete' type='submit' class='btn btn-secondary'>Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";
        }
        ?>

    </div>
</div>
<?php require "footer.php" ?>