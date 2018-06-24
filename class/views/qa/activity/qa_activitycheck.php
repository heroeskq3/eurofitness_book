<?php
if ($Id) {
    class_qaActivityUpdate($Id, 1);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}