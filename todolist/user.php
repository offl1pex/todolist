<?php  
require_once "header.php";  
require_once "connect.php";  
session_start();  

if (isset($_SESSION["message"])) {  
    $mes = $_SESSION["message"];  
    echo "<script>alert('$mes')</script>";  
    unset($_SESSION["message"]);  
}  

$filter = isset($_POST['taskFilter']) ? $_POST['taskFilter'] : '';    
$search = isset($_GET['search']) ? $_GET['search'] : '';    
$filter2 = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : '';    

// Начинаем формировать запрос
$query = "SELECT * FROM tasks WHERE user_id = " . $_SESSION["id_user"]; 

if ($filter === '1') {    
    $query .= " AND is_completed = 1";    
} elseif ($filter === '0') {    
    $query .= " AND is_completed = 0";    
} 

if (!empty($search)) { 
    $query .= " AND (title LIKE '%$search%' OR description LIKE '%$search%')"; 
}

// Добавляем сортировку по дате
if ($filter2 === '1') {
    $query .= " ORDER BY created_at DESC"; // Новые
} elseif ($filter2 === '0') {
    $query .= " ORDER BY created_at ASC"; // Старые
}

$sql = mysqli_query($con, $query);  
?>  

<div class="container" id = "content">
    <div class="filter">
        <div class="filter1">
    <form action="" method="post"> 
    <label for="">Сортировка по статусу:</label>
        <select id="taskFilter" name="taskFilter" class="form-select" onchange="this.form.submit()"> 
            <option value="" <?= $filter === '' ? "selected": '' ?>>Все </option> 
            <option value="1" <?= $filter === '1' ? "selected": '' ?>>Выполненные</option> 
            <option value="0" <?= $filter === '0' ? "selected": '' ?>>Не выполненные</option> 
        </select> 
    </form> 
    </div>
    <div class="filter2">
    <form action="" method="post"> 
    <label for="">Сортировка по дате:</label>
        <select id="Filter" name="dateFilter" class="form-select" onchange="this.form.submit()"> 
            <option value="" <?= $filter2 === '' ? "selected": '' ?>>Все</option> 
            <option value="1" <?= $filter2 === '1' ? "selected": '' ?>>Новые</option> 
            <option value="0" <?= $filter2 === '0' ? "selected": '' ?>>Старые</option> 
        </select> 
    </form> 
    </div>

    </div> 
 

    <?php if (mysqli_num_rows($sql) != 0) {  
    while ($app = mysqli_fetch_assoc($sql)) {  
        ?>  
        <div class="card w-50">  
            <div id="note">  
                <div class="card-body"> 
                    <form action="/database/edit-db.php?id=<?= $app["id"] ?>" method="POST">
                        <div id="checkbox-content"> 
                            <input type="checkbox" name="checkbox[]" id="checkbox-<?= $app["id"] ?>" value="<?= $app["id"] ?>" onChange="updateStatus(this)" <?= $app["is_completed"]=='1' ? "checked": ""?>> 
                            <!-- <label for="checkbox">Заметка №<?= $app["id"] ?></label>  -->
                         <label for="checkbox">Заметка </label>  
                        </div> 
                        <label for="recipient-name" class="col-form-label">Название заметки:</label> 
                        <input type="text" required class="form-control" name="title" value="<?= $app["title"] ?>" /> 
                        <label for="recipient-name" class="col-form-label">Описание:</label> 

                        <input type="text" required class="form-control" name="description" value="<?= $app["description"] ?>" /> 
                      
                </div> 
                <div id="edit-and-delete">  
                <button type="submit"><img src="img\Frame 6.svg" alt=""></button>
                </form>
                    <a href="#" class="delete-task" data-id="<?= $app["id"] ?>"><img src="img/trash-svgrepo-com 1.svg" alt=""></a>

                </div>  
            </div>  
        </div>  
    <?php }  
} else { 
    echo '<img src="img/Detective-check-footprint 1.png" alt="">'; 
     echo "<h2>Empty..</h2>";  
}  
?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="button">+</button> 

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Новая заметка</h1> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                </div> 
                <div class="modal-body"> 
                    <form method="post" action="database/add-db.php"> 
                        <div class="mb-3"> 
                            <label for="recipient-name" class="col-form-label">Название заметки:</label> 
                            <input type="text" name="title" class="form-control" id="recipient-name" placeholder="Введите название своей заметки..."> 
                        </div> 
                        <div class="mb-3"> 
                            <label for="recipient-name" class="col-form-label">Описание:</label> 
                            <input type="text" name="discription" class="form-control" id="recipient-name" placeholder="Введите описание своей заметки..."> 
                        </div> 
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary" id="button">Создать</button> 
                </div>
                </form>
            </div> 
        </div> 
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function updateStatus(checkbox) {
    if (checkbox.checked) {
        var confirmation = confirm("Вы уверены, что хотите пометить эту заметку как завершенную?");
        if (confirmation) {
            $.ajax({
                url: '/database/update-status.php',
                method: 'POST',
                data: { taskId: checkbox.value },
                success: function(response) {
                    console.log('Статус успешно обновлен');
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при обновлении статуса:', error);
                }
            });
        } else {
            // Если пользователь отменил действие, оставляем галочку установленной
            checkbox.checked = true;
        }
    } else {
        // Если чекбокс не отмечен, предупреждаем пользователя
        alert("Вы не можете снять галочку с завершенной заметки.");
        checkbox.checked = true; // Снова устанавливаем галочку
    }
}
</script>
<!-- для удаления без перезагрузки -->
<script> 
$(document).ready(function() { 
    $('.delete-task').on('click', function(e) { 
        e.preventDefault(); // Предотвращаем переход по ссылке 
        var taskId = $(this).data('id'); // Получаем ID задачи 
        
        $.ajax({ 
            url: '/database/delete-task.php', 
            type: 'POST', 
            data: { id: taskId }, 
            success: function(response) { //в случает успешного выполнения запроса
                console.log(response); // Для отладки
                if (response.trim() === 'success') { //проверка ответа
                    // alert('Заметка успешно удалена'); 
                    $('a.delete-task[data-id="' + taskId + '"]').closest('.card').fadeOut(300, function() { 
                        $(this).remove(); 
                    }); 
                } else { 
                    alert('Ошибка при удалении заметки: ' + response); 
                } 
            }, 
            error: function() { 
                alert('Ошибка при выполнении запроса'); 
            } 
        }); 
    }); 
}); 
</script>

   
