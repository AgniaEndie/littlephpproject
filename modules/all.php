<?php

$query_post = "SELECT * FROM `otcchet` where user_id = '$userr'";
$result_post = mysqli_query($connect, $query_post);
while($row = mysqli_fetch_array($result_post)){
    ?>
        <div style="border: 1px solid darkgrey">
            <h4><?= $row[1]; ?></h4><br>
            <span><?= $row[2]?></span><br>
            <span><?= $row[3] ?></span><br>
            <span><?= $row[4] ?></span><br>
        </div>
    <?php
}
?>
<main class="form-signin w-100 m-auto">

    <form action="index.php" method="post">
        <input name="drop" class="btn btn-outline-dark" type="submit" value="Назад к меню">
    </form>

</main>