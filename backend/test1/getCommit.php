<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18
 * Time: 11:46
 */
  include('./sqlServer.php'); // 已成功连接上数据库
    mysqli_query($con,"set names 'utf8'");
    $sql="INSERT INTO comment (username, email, comment) VALUES ('".$_POST['username']."','".$_POST['email']."','".$_POST['comment']."')";
   // echo $sql;exit;
    if (!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);
?>