<?php




?>
<body class="text-center">
    <main class="form-signin w-25 m-auto">
        <form method="post" action="index.php">
            <img class="mb-4" src="../uploads/logo.jpg" alt="" width="72" height="57" >
            <h1 class="h3 mb-3 fw-normal">Пожалуйста войдите в систему</h1>

            <div class="form-floating">
                <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Ваш логин">
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name = "password" id="floatingPassword" placeholder="Пароль">
                <label for="floatingPassword">Пароль</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Запомнить меня
                </label>
            </div>
            <!--<button class="w-100 btn btn-lg btn-primary" name="auth"type="submit">Войти</button>-->
            <input class="w-100 btn btn-lg btn-primary" name="auth" type="submit" value="Войти">
            <!--<p class="mt-5 mb-3 text-muted"></p>-->
        </form>
    </main>
</body>