<?php 
//Delete menu item
if ($action == "delete") {
    class_qaCustomersDelete($Id);
    header('Location: '.$_SERVER['PHP_SELF']);
    die();
}
?>