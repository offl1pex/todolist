<?php
require_once "../connect.php";  

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $taskId = $_POST['taskId']; 
    $taskId = intval($taskId); // Приведение к целому числу
    $sql = "UPDATE tasks SET is_completed = 1 WHERE id = $taskId"; 

    if ($con->query($sql) === TRUE) { 
        header("Location: /user.php"); 
        exit(); 
    } else { 
        echo "При обновлении статуса произошла ошибка: " . $con->error; 
    } 
} 
?>
