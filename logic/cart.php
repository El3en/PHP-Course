<?php
function addProductToCart($product)
{
    if(session_status() === PHP_SESSION_NONE)
      session_start();
    
    $cart = isset($_SESSION['cart'])? $_SESSION['cart'] : [];
    $found = false;
    
    for($i=0; $i < count($cart); $i++)
      {
      if($cart[$i]['product']['id'] === $product['id']){
        $cart['product']['quantity'] += 1;
        $found = true;
      }
    }
    if(!$found)
    {
      array_push($cart,['product' => $product , 'quantity' => 1]);
    }
  $_SESSION['cart'] = $cart;    
}

function getCart()
{
  if(session_status() === PHP_SESSION_NONE)
    session_start();
  
  $cart = isset($_SESSION['cart'])?$_SESSION['cart']:[];
  return $cart;
}

 function removeProduct($product)
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    for ($i = 0; $i < count($cart); $i++) {
        if ( $cart[$i]['product']['id'] === $product['id']) {
            array_splice($cart, $i, 1);
        }

    }
    $_SESSION['cart'] = $cart;
}

function decQuantity($product)
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();
    
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    for ($i = 0; $i < count($cart); $i++) {
        if  (  ($cart[$i]['product']['id'] === $product['id']) &&  ($cart[$i]['quantity'] != 1)){
            $cart[$i]['quantity'] -= 1;
        } 
    }
    $_SESSION['cart'] = $cart;
}


function getShipping()
{
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    return count($cart) * 10;;
}
function getSubTotal()
{
    $subtotal = 0;

    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    for ($i = 0; $i < count($cart); $i++) {
        $price = $cart[$i]['product']['price'] - ($cart[$i]['product']['price'] * $cart[$i]['product']['discount']);
        $subtotal +=  ($cart[$i]['quantity']* $price) ;
    }
    return $subtotal;
}



function getTotal()
{
    return getShipping() + getSubTotal();
}