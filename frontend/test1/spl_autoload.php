<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/28
 * Time: 13:37
 */
    spl_autoload_register(function($class_name){
        require_once $class_name.'.php';
    });

    $ha = new Boom();
    $xi = new Xoom();

echo $ha->name;
echo $xi->name;
?>

