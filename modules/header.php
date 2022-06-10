<?php
include ("database/db_con.php");
?>
<link rel="stylesheet" href="/assets/styles/style.css">
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
               <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>-->
                    <img src="../uploads/logo.jpg" height="48px" width="48px">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-secondary">Главная</a></li>
                <?php
                    if($_SESSION['user']['status'] == 1){
                ?>
                <?php
                    }
                ?>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="search.php">
                <input type="search" class="form-control form-control-dark" placeholder="Поиск" aria-label="Search">
            </form>
            <div class="text-end">
                <?php
                    echo $_SESSION['user']['name'];
                ?>
                <a href="logout.php" class="logoutlink">Выйти</a>
            </div>
        </div>
    </div>
</header>
