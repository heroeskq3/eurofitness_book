<?php 
//Delete menu item
if ($action == "delete") {
    class_qaClassesDelete($Id);
    header('Location: '.$_SERVER['PHP_SELF']);
    die();
}
?>