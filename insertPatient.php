<?php
    include_once './connect.php';

    $ohip = $_POST['ohip'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $date = $_POST['date'];

    $sql = "INSERT INTO `Patient` VALUES('{$fname}', '{$lname}', '{$ohip}', '{$date}')";
    var_dump($dbh->query($sql));

    setcookie('ohip', $ohip);
    echo "<script>window.location.href=\"./views/Vaccine.php\"</script>";
?>