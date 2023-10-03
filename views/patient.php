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
        <h1><?php 
          include_once '../connect.php';

          $ohip = $_POST['patient'];
          $sql = "SELECT * FROM `Patient` WHERE `OHIP`='{$ohip}'";
          $res = $dbh->query($sql);
          foreach($res as $row){
              echo $row['FName']." ".$row['LName'];
          }
        ?></h1>

        <h5>OHIP Number: <?php echo $ohip;?></h5>
        <h5>Vaccination List</h5>
        <table class="table table-striped table-hover">
        <tr>
                <th>LotID</th>
                <th>SiteName</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `VaccinationTrack` WHERE `PatientOHIP`='{$ohip}'";
                $res = $dbh->query($sql);
                foreach($res as $row){
                  echo "<tr>
                          <td>{$row['LotID']}</td>
                          <td>{$row['SiteName']}</td>
                          <td>{$row['Date']}</td>
                          <td>{$row['Time']}</td>
                      </tr>";  
                }
            ?>
        </table>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
</body>
</html>