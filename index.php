<?php
error_reporting(0);
include ("database/db_con.php");
include ("modules/assets.php");
//echo $_SESSION['user']['name'];
//echo $_SESSION['user']['check']."ad";
$userr = $_SESSION['user']['id'];
//LOGIC
    if($_POST['auth'] == "Войти"){
        $login_attemp = $_POST['login'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `users` WHERE `name` =  '$login_attemp' ";
        //echo $query;
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        //echo $row['password'];
        if($password == $row['password']){


            $_SESSION['user'] = array(
                    "id"=> $row['id'],
                    "name"=> $row['name'],
                    "status"=>$row['status'],
                    "check" => 0

            );

        }
    }

    if($_POST['personal_load'] == "Загрузить в систему"){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $company = $_POST['company'];
        $credits = $_POST['credits'];
        $user_id = $_POST['user_id'];


        $query1 = "INSERT INTO `otcchet` (title,content,credits,user_id) VALUES ('$title','$content','$credits','$user_id')";
        //echo $query1;
        $result1 = mysqli_query($connect,$query1);
        $msg = "Отчёт загружен успешно";
        ?>
        <div class="alert alert-success" id = "message" role="alert" onclick='document.getElementById("message").style.display = "none" '>
            <?= $msg ?>
        </div>
        <?php



    }

?>


<?php

if($_SESSION['user']['name'] != null){
    include ("modules/header.php");

    ?>
        <style>
            body::-webkit-scrollbar {

                width: 10px;
            }

            body::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgb(33, 37, 42);
            }

            body::-webkit-scrollbar-thumb {
                background-color: #313131;
                border-radius: 15px;
            }
        </style>
    <div class="container py-4">
        <?php
        #Персональный отчёт
        if($_POST['btn_otchet'] == "Подробнее"){
            $_SESSION['user']['check'] = 1;
        }
        #Изменить существующий
        if($_POST['btn_suot'] == "Подробнее"){
            $_SESSION['user']['check'] = 2;
        }
        #Все отчёты
        if($_POST['btn_all'] == "Подробнее"){
            $_SESSION['user']['check'] = 3;
        }

        if($_SESSION['user']['check'] ==  0 || $_SESSION['user']['check'] == null){

        ?>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Персональный отчет</h1>
                <p class="col-md-8 fs-4">Создайте собственный отчёт со своими исходными данными используя наш сервис.</p>
                <form action="index.php" method="post">
                    <input class="btn btn-outline-dark" type="submit" name="btn_otchet" value="Подробнее">
                </form>
            </div>
        </div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h2>Изменить существующий отчет</h2>
                    <p>Изменить существующий отчёт используя наш сервис.</p>
                    <form action="index.php" method="post">
                        <input class="btn btn-outline-light" type="submit" name="btn_suot" value="Подробнее">
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Все отчеты</h2>
                    <p>Просмотреть все доступные отчеты</p>
                    <form action="index.php" method="post">
                        <input class="btn btn-outline-dark" type="submit" name="btn_all" value="Подробнее">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }


        if($_POST['drop'] == "Назад к меню"){
            $_SESSION['user']['check'] = 0;
            ?>
                <meta http-equiv="refresh" content="1">
            <?php
        }


        if($_SESSION['user']['check'] == 1){
            include "modules/personal.php";
        }
        if($_SESSION['user']['check'] == 2){
           ?>
            <form action="index.php" method="post">
                <select name="variantSelect">
                    <?php
                    $query11 = "SELECT * FROM `otcchet` WHERE `id` <>0 AND `user_id` = '$userr'";
                    //echo $query11;
                    $result11 = mysqli_query($connect,$query11);
                    while ($row11 = mysqli_fetch_array($result11)) {

                        ?>
                        <option value="<?php echo $row11[0];  ?>"><?php echo $row11[1]; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-outline-dark" name="suso_submit" value="Выбрать">
            </form>

            <form action="index.php" method="post">
                <input name="drop" class="btn btn-outline-dark" type="submit" value="Назад к меню">
            </form>
            <?php
            $check = $_POST['variantSelect'];
            $query_check = "SELECT * FROM `otcchet` where id = '$check'";
            //echo $query_check;
            $result_check = mysqli_query($connect, $query_check);

            while ($row_check = mysqli_fetch_array($result_check)){
                 if($row_check[0] == $_POST['variantSelect']){

                     ?>
                     <form action="index.php" method="post">
                         <h1 class="h3 mb-3 fw-normal">Персональный отчёт - Редактирование</h1>
                         <div class="form-floating">
                             <input type="text" class="form-control" name="suso_title" id="otchet_title" value="<?= $row_check[1]; ?>" placeholder="Заголовок отчёта">
                             <label for="otchet_title">Заголовок отчёта</label>
                         </div>
                         <div class="form-floating">
                             <input type="text" class="form-control" name="suso_content" id="otchet_content" value="<?= $row_check[2]; ?>" placeholder="Текст Отчёта">
                             <label for="otchet_content">Текст отчёта</label>
                         </div>
                         <div class="form-floating">
                             <input type="text" class="form-control" name="suso_company" id="otchet_credits" value="<?= $row_check[5]; ?>" placeholder="Компания">
                             <label for="otchet_credits">Компания</label>
                         </div>
                         <div class="form-floating">
                             <input type="text" class="form-control" name="suso_credits" id="otchet_credits" value="<?= $row_check[3]; ?>" placeholder="Связанные пользователи">
                             <label for="otchet_credits">Связанные пользователи</label>
                         </div>
                         <div class="form-floating">
                             <input type="hidden" class="form-control" name="suso_user_id" value="<?= $row_check[4]?>">
                         </div>
                         <div class="form-floating">
                             <input type="hidden" class="form-control" name="suso_otchet_id" value="<?= $row_check[0]?>">
                         </div>
                         <div class="form-floating">
                             <input type="submit" class="btn btn-outline-dark" name="suso_load" value="Обновить данные">
                         </div>
                     </form>
                     <?php
                 } else{
                    $msg = "Отчётов не обнаружено";
                     ?>
                     <div class="alert alert-danger" id = "message" role="alert" onclick='document.getElementById("message").style.display = "none" '>
                        <?= $msg ?>
                    </div>
                     <?php
                 }
            }


        }
        if($_SESSION['user']['check'] == 3){
            include "modules/all.php";
        }


        if($_POST['suso_load'] == "Обновить данные"){
            $suso_title = $_POST['suso_title'];
            $suso_content = $_POST['suso_content'];
            $suso_company = $_POST['suso_company'];
            $suso_credits = $_POST['suso_credits'];
            $suso_user_id = $_POST['suso_user_id'];
            $suso_otchet_id = $_POST['suso_otchet_id'];


            $load_query = "UPDATE `otcchet` SET `title` = '$suso_title' , `content` = '$suso_content' , `credits` = '$suso_credits',`user_id` = '$suso_user_id', `company` = '$suso_company' where `id` = '$suso_otchet_id'";
            $load_result = mysqli_query($connect,$load_query);
            //echo $load_query;
        }









        if($_SESSION['user']['status'] == 1){
    ?>



    <!--actions-->
    <div class="container px-4 py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Администратор</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
                </div>
                <div>
                    <h2>Новый пользователь</h2>
                    <p>Добавьте нового пользователя.Редактируйте или удалите существующего</p>
                    <a href="#" class="btn btn-outline-dark">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg>
                </div>
                <div>
                    <h2>Работа с СУБД</h2>
                    <p>Онлайн вывод субд</p>
                    <a href="#" class="btn btn-outline-dark">
                        Подробнее
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg>
                </div>
                <div>
                    <h2>API</h2>
                    <p>Инструкция по работе с API</p>
                    <a href="api.php" class="btn btn-outline-dark">
                        Подробнее
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>



    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
    <?php
    include("modules/footer.php");

}else{
    include("modules/auth.php");
}
?>
