<?php
  define('BASE_PATH','../');
  require('../logic/authentication.php');
  if($_REQUEST) // or if $_REQUEST
  {
    $user = tryLogin($_POST['username'],$_POST['password']);
    if($user){
        setUserToSession($user);
        header('Location:index.php');
        die();
    }else{
      $error = "Invalid username or password";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?=isset($error) ? '<span class="text-danger">'.$error.'</span>':''?>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <input name="username" class="form-control"/>
    <input type="password" name="password" class="form-control"/>
    <button class="btn btn-primary">login</button>
  </form>
</body>
</html>
