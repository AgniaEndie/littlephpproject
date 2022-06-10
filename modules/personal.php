<?php

?>

<main class="form-signin w-50 m-auto">
    <form action="index.php" method="post">
        <h1 class="h3 mb-3 fw-normal">Персональный отчёт</h1>
        <div class="form-floating">
            <input type="text" class="form-control" name="title" id="otchet_title" placeholder="Заголовок отчёта">
            <label for="otchet_title">Заголовок отчёта</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="content" id="otchet_content" placeholder="Текст Отчёта">
            <label for="otchet_content">Текст отчёта</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="company" id="otchet_credits" placeholder="Компания">
            <label for="otchet_credits">Компания</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="credits" id="otchet_credits" placeholder="Связанные пользователи">
            <label for="otchet_credits">Связанные пользователи</label>
        </div>
        <div class="form-floating">
            <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user']['id']?>">
        </div>
        <div class="form-floating">
            <input type="submit" class="btn btn-outline-dark" name="personal_load" value="Загрузить в систему">
        </div>



    </form>
    <form action="index.php" method="post">
        <input name="drop" class="btn btn-outline-dark" type="submit" value="Назад к меню">
    </form>
</main>








