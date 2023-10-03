<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">    
<title>Document</title>
</head>
<body>
    <form action="./ohip.php" class="form" method="POST">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Enter your OHIP:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Please enter you OHIP here" name="ohip">
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
        
    <form action="./views/siteNameList.php" class="form" method="POST">
        <h2>LotID for Vaccination Search</h2>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Search Vaccination:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter LotID for Vaccination Search" name="lotid">
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    
    <form action="./views/patient.php" class="form" method="POST">
        <h2>Querying Patient Information</h2>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Patient</label>
        <select name="patient" id="" class="form-select">
            <?php
                include_once './connect.php';

                $sql = "SELECT * FROM `Patient`";
                $res = $dbh->query($sql);
                foreach($res  as $row){
                    echo "<option value=\"{$row['OHIP']}\">{$row['FName']}  {$row['LName']}</option>";
                }
            ?>
          
        </select>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>

    <form action="./views/worker.php" class="form" method="POST">
        <h2>Search Medical Workers</h2>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">SiteName</label>
        <select name="sitename" id="" class="form-select">
            <?php

                $sql = "SELECT * FROM `VaccinationSite`";
                $res = $dbh->query($sql);
                foreach($res  as $row){
                    echo "<option value=\"{$row['SiteName']}\">{$row['SiteName']}</option>";
                }
            ?>
          
        </select>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
</body>
</html>