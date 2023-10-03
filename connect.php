<?php
    $dbms='mysql';     //数据库类型
    $host=''; //数据库主机名
    $dbName='covidDB';    //使用的数据库
    $user='';      //数据库连接用户名
    $pass='';          //对应的密码
    $dsn="$dbms:host=$host;dbname=$dbName";

    try {
        $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//         echo "连接成功<br/>";
        
    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage() . "<br/>");
    }
?>