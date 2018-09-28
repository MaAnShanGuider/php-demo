<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20
 * Time: 10:24
 */
/*setcookie("age", '22');

$res = array('msg'=>"请求成功", "status"=>200 );

echo json_encode($res);*/

$numArray =array(3,2,6,5,8,10);


for($i = 0; $i < count($numArray); $i++){
    for($j = 0; $j < count($numArray) - $i - 1; $j++){
        if($numArray[$j] < $numArray[$j+1]) {
            $numArray[$j+1] ^= $numArray[$j];
            $numArray[$j] ^= $numArray[$j+1];
            $numArray[$j+1] ^= $numArray[$j];
        }
    }
}

print_r($numArray);
?>