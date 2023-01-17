<?php
require_once(BASE_PATH."dal/dal.php");

function tryLogin($username,$password)
{
  $password = hash('sha256',$password);
  return get_user($username,$password);
}


function setUserToSession($user)
{
   if(session_status() === PHP_SESSION_NONE)
      session_start();
    
    $_SESSION['user'] = $user;
}


function isAdmin()
{

  if(session_status()===PHP_SESSION_NONE)
    session_start();
  
  if(!isset($_SESSION['user']))
    return false;
  
  if($_SESSION['user']['type'] !== 'Admin')
    return false;
    
  return true;  
}

function protectAdmin()
{

  if(!isAdmin()){
    header('Location:'.BASE_URL.'admin/login.php');
    die();
  }
}

function getCurrentUser(){
  if(session_status() === PHP_SESSION_NONE)
      session_start();
  
  if(!isset($_SESSION['user'])){
    return null;
  }
  
  return $_SESSION['user'];  
}