<?php
include ("database/db_con.php");

$login = $_GET['login'];
$pass = $_GET['pass'];
//echo $pass;
$id = $_GET['otchet'];

$query = "SELECT * FROM `users` WHERE `name` = '$login' ";
$result = mysqli_query($connect, $query);

$query_ot = "SeLECT * FROM `otcchet` WHERE `id` = '$id'";

$row = mysqli_fetch_array($result);
//echo "A";
//echo $row[2];
if($pass == $row[2]){
    //echo "a";
    if($_GET['otchet'] !=null){
        $result_ot = mysqli_query($connect,$query_ot);

       $row_a = mysqli_fetch_array($result_ot);
       $array = array(
           "id" => $row_a[0],
           "title"=> $row_a[1],
           "content"=> $row_a[2],
           "credits"=>$row_a[3],
           "user_id"=>$row_a[4],
           "company"=>$row_a[5]
       );
      $json = json_encode($array);
      echo $json;
    }
}
?>

