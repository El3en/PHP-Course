<?php
require_once(BASE_PATH . 'dal/dal.php');
function addProductToCart($product)
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $found = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['product']['id'] === $product['id']) {
            $cart[$i]['quantity'] += 1;
            $found = true;
        }
    }
    if (!$found) {
        array_push($cart, ['product' => $product, 'quantity' => 1]);
    }
    $_SESSION['cart'] = $cart;
}

function getCart()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    return $cart;
}
function getSubTotal()
{
    $cart = getCart();
    $SubTotal = 0;
    for ($i = 0; $i < count($cart); $i++) {
        $SubTotal += $cart[$i]['product']['price'] * $cart[$i]['quantity'];  
    }
    return $SubTotal;

}
function getShiping()
{
    $cart = getCart();
    $Shiping = 0;
    for ($i = 0; $i < count($cart); $i++) {
        $Shiping += 2 ;  
    }
    return $Shiping;
}
function getTotal()
{
    return getShiping() + getSubTotal();
}

function incQuantity($cart,$i)
{
    $quantity = $cart[$i]['quantity'] + 1;
    $cart[$i]['quantity'] = $quantity;
    $_SESSION['cart'] = $cart;

}
function decQuantity($cart,$i)
{
    $quantity = $cart[$i]['quantity'] - 1;
    if($quantity > 0)
        $cart[$i]['quantity'] = $quantity;
    else if ($quantity <= 0)
        unset($cart[$i]);
    $_SESSION['cart'] = $cart;
}
function deleteLine($cart,$i)
{
    unset($cart[$i]);
    $_SESSION['cart'] = $cart;
}