<?php
require_once "header.php";
?>
<div class="container">
   <h1>Регистрация</h1> 
<form method="post" action="database\signup-db.php">
  <div class="mb-3">
    <label for="login" class="form-label">Логин</label>
    <input type="login" name=" login" class="form-control" id="exampleInputEmail1" minlength="4" maxlength="20">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Пароль</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" minlength="6">
  </div>
  <button type="submit" class="btn btn-primary" id="button">Зарегистрироваться</button>
</form>
</div>