<?php
define('BASE_PATH', './');
require_once('./logic/cart.php');
$cart = getCart();
if (isset($_GET['id'])) {
    if (isset($_GET['process'])) {
    if($_GET['process'] === 'minus')
    decQuantity($cart,$_GET['id']);
    else if($_GET['process'] === 'plus')
    incQuantity($cart,$_GET['id']);
    else if ($_GET['process'] === 'delete'){
        deleteLine($cart,$_GET['id']);
    }
    }
   }

header('Location:cart.php');
?>