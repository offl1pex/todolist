<?php

require_once "../connect.php";
session_start();

$title = isset($_POST["title"]) ? $_POST["title"] : false;
$discription = isset($_POST["discription"]) ? $_POST["discription"] : false;
$user_id = $_SESSION["id_user"];


if ($title and $discription) {
    $sql = "INSERT INTO `tasks`( `user_id`, `title`, `description`)
     VALUES ('$user_id','$title','$discription')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION["message"] = "Успех!";
        header("Location: /user.php");
    } else {
        $_SESSION["message"] = "При создании заметки произошла ошибка!";
        header("Location: /user.php");
    }

} else {
    $_SESSION["message"] = "Заполните все поля!";
    header("Location: /user.php");

}