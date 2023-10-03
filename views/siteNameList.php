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
          <h2><?php 
          include_once '../connect.php';
          echo $_POST['lotid'];
          ?>'s SiteName List</h2>
          <table class="table table-striped table-hover">
            <tr>
                <th>SiteName</th>
                <th>City</th>
                <th>Province</th>
                <th>StreetNumber</th>
                <th>StreetName</th>
            </tr>
    <?php
          
          $lot = $_POST['lotid'];
        //   var_dump($date, $time);

          $sql = "SELECT * FROM `ShipsTo` WHERE `LotID`='{$lot}'";
          $res = $dbh->query($sql);
          foreach($res as $row){
            $SiteName = $row['SiteName'];
            $sql = "SELECT * FROM `VaccinationSite` WHERE `SiteName`='{$SiteName}'";
            $res2 = $dbh->query($sql);
            foreach($res2 as $row2){
                echo "<tr>
                    <td>{$SiteName}</td>
                    <td>{$row2['City']}</td>
                    <td>{$row2['Province']}</td>
                    <td>{$row2['StreetNumber']}</td>
                    <td>{$row2['StreetName']}</td>
                </tr>"; 
            }
             
          }
    ?>
        </table>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
</body>
</html>