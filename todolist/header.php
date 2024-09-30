<?php
session_start();
require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div  id="containt">
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <form class="d-flex" role="search" method="get" action="user.php">
          <input class="form-control me-2" type="search" name="search" placeholder="Search note.." aria-label="Search" id="searh" > 
        </form>
        <button id="theme-toggle" class="btn btn-primary"> <img src="img\Vector (1).svg" alt=""></button>

        <?php if (isset($_SESSION["id_user"])) { ?>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Выход</a>
            </li>
          </ul>
        <?php } else { ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Регистрация</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Авторизация</a>
            </li>
          </ul>
        <?php } ?>

      </div>
  </div>
  <!-- </div> -->
  </nav>
  <h1 class="logo">TODO LIST</h1>

</body>

</html>
<script>
  $('#search-form').on('keyup', function (e)){
    <?php
    $searching = isset($_GET['search']) ? $_GET['search'] : false;
    ?>
  }   
</script>
<script>
  // Проверяем сохраненные настройки темы 
  const currentTheme = localStorage.getItem('theme') || 'light';
  if
    (currentTheme === 'dark') {
    document.body.classList.add('dark-theme');
  }

  // Обработчик переключения темы 
  document.getElementById('theme-toggle').addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');
    const newTheme = document.body.classList.contains('dark-theme') ? 'dark' : 'light';
    localStorage.setItem('theme', newTheme);
  }); 
</script>