<?php
require_once "header.php";
session_start();

if(isset($_SESSION["message"])){
    $mes = $_SESSION["message"];
    echo "<script>alert('$mes')</script>";
    unset($_SESSION["message"]);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
   <h1>Вход</h1> 
<form method="post" action="database\signin-db.php">
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="login" name=" login" class="form-control" id="exampleInputEmail1" >
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Пароль</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary" id="button">Авторизироваться</button>
</form>
</div>
</body>
</html>