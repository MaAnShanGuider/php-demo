<?php
    $con = mysqli_connect('192.168.33.10', 'root', '123456', 'mysql');

    if(!$con){
        die('未连接上数据库:'.mysqli_error());
    }

    $pagesize = 5;
    if(empty($_GET["page"])) {
        $page = 1;
        $startrow = 0;
    } else {
        $page = (int)$_GET["page"];
        $startrow = ($page - 1) * $pagesize;
    }

    $sql = "SELECT * FROM comment";
    $result = mysqli_query($con, $sql); // 总记录数和总页数
    $records = mysqli_num_rows($result); // 总记录数
    $pages = ceil($records / $pagesize);

//    分页
    $sql = "SELECT * FROM comment ORDER BY id limit $startrow, $pagesize";
    $result = mysqli_query($con, $sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.1.min.js"></script>
<style>
    * {margin: 0; padding: 0;}
    body {
        background: #dddddd;
    }
    #box, #msg {
        margin: 0 auto;
        width: 980px;
        background: #ececec;
        min-height: 300px;
    }
    #msg {
        background: #eee;
    }
    .g-pd-20 {
        padding:20px;
    }
    .g-m-5 {
        margin: 5px;
    }
    .user-detail span:nth-child(1) {
        font-size: 10px;
        margin-right: 12px;
    }
</style>
<body>
    <div id="box" class="g-pd-20">

        <?php
            while($arr = mysqli_fetch_assoc($result)){

        ?>
                <div class="item g-pd-20">
                    <div class="user-detail"><span><?php echo $arr['username'] ?></span><span>发布于</span><span><?php echo $arr['time'] ?></span></div>
                    <div class="user-comment"><?php echo $arr['comment'] ?></div>
                </div>
        <?php } ?>
        <div class="pagelist">
            <span>总条数: <?php echo $records ?></span>
            <br>
            <span>总页数: <?php echo $pages ?></span>
            <br>
            <?php

                $prev = $page - 3;
                $next = $page + 3;
                if($prev < 1 ) { $prev = 1; }
                if($next > $pages) { $next = $pages; }
                for($i = $prev; $i <= $next; $i++){
                    if($i == $page){
                        echo "<span class='g-m-5'>$i</span>";
                    } else {
                        echo "<a  class='g-m-5' href='index.php?page=$i'>$i</a>";
                    }
                }

            ?>

        </div>
    </div>
    <div id="msg" class="g-pd-20">
        <lable>用户名:</lable>
        <input type="text" id="username">
        <br>
        <lable>邮箱:</lable>
        <input type="email" id="email">
        <br>
        <lable>评论:</lable>
        <input type="text" id="comment">
        <br>
        <button id="btn">发布</button>
    </div>
</body>
<script>
    window.onload = function(e) {
        $.ajax({
            url: '/backend/test1/getRenderCommit.php',
            type: 'get',
            success: function(res) {
                console.log()
            }
        })
    }
    $('#btn').click(function(){
        $.ajax({
            url: '/backend/test1/getCommit.php',
            type: "POST",
            data: {
                username: $('#username').val(),
                email: $('#email').val(),
                comment: $('#comment').val()
            },
            success: function(res){
                alert("发送成功");
                window.location.reload();
            },
            error: function(res) {
                console.log(res)
            }
        })
    })
</script>
</html>