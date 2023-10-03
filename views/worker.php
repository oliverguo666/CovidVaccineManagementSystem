<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../style.css">    
<title>Document</title>
</head>
<body>

        <h5>SiteName: <?php echo $_POST['sitename'];?></h5>
        <h5>workers List</h5>
        <table class="table table-striped table-hover">
        <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Position</th>
            </tr>
            <?php
                include_once '../connect.php';
                $SiteName = $_POST['sitename'];
                $sql = "SELECT * FROM `DoctorWorksOn` WHERE `SiteName`='{$SiteName}'";
                $res = $dbh->query($sql);
                foreach($res as $row){
                    $id = $row['DoctorID'];
                    $sql = "SELECT * FROM `Doctor` WHERE `ID`='{$id}'";
                    $res2 = $dbh->query($sql);
                    foreach($res2 as $row2){
                        echo "<tr>
                          <td>{$row2['FName']}</td>
                          <td>{$row2['LName']}</td>
                          <td>{$row2['ID']}</td>
                          <td>Doctor</td>
                      </tr>";  
                    }
                    
                }

                $sql = "SELECT * FROM `NurseWorksOn` WHERE `SiteName`='{$SiteName}'";
                $res = $dbh->query($sql);
                foreach($res as $row){
                    $id = $row['NurseID'];
                    $sql = "SELECT * FROM `Nurse` WHERE `ID`='{$id}'";
                    $res2 = $dbh->query($sql);
                    foreach($res2 as $row2){
                        echo "<tr>
                          <td>{$row2['FName']}</td>
                          <td>{$row2['LName']}</td>
                          <td>{$row2['ID']}</td>
                          <td>Nurse</td>
                      </tr>";  
                    }
                    
                }
            ?>
        </table>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
</body>
</html>