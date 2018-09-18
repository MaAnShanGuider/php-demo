<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18
 * Time: 13:35
 */

 $con = mysqli_connect('192.168.33.10', 'root', '123456', 'mysql');

if(!$con){
    die('未连接上数据库:'.mysqli_error());
}
?>

