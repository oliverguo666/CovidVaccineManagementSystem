<?php
    include_once './connect.php';
    $ohip = $_POST['ohip'];

    $sql = "SELECT * FROM `Patient` WHERE `OHIP`='{$ohip}'";
    $res = $dbh->query($sql);
    $flag = 0;
    foreach($res as $row){
        $flag = 1;
    }

    if($flag == 0){
        echo "<script>alert(\"Patient doesn't exist\")</script>";
        echo "<script>window.location.href=\"./views/insertPatient.html\"</script>";
    }else{
        setcookie("ohip", $ohip);
        echo "<script>window.location.href=\"./views/Vaccine.php\"</script>";
    }
?>