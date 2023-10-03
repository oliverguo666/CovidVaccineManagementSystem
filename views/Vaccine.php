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
    <form action="./listVaccination.php" class="form" method="POST">
        <div class="mb-3 row">
            <div class="col-sm-2">
                <label for="exampleFormControlInput1" class="form-label">VaccinationSite:</label>
            </div>
            <div class="col-sm-10">
                <select name="VaccinationSite" id="" class="form-select">
            <?php
                include_once '../connect.php';

                $sql = "SELECT * FROM `VaccinationSite`";
                $res = $dbh->query($sql);
                foreach($res  as $row){
                    echo "<option value=\"{$row['SiteName']}\">{$row['SiteName']}</option>";
                }
            ?>
          
        </select>
            </div>
        
      </div>
      <div class="mb-3 row">
            <div class="col-sm-2">
              <label for="exampleFormControlInput1" class="form-label">lotID: </label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Please enter you OHIP here" name="lotid"> 
            </div>
        
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
        
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Nj1D6pu2WnJojj+67GiU9ZFNwbl7bUWX5Kj5MS22C8bGjllemM9pvQyvj14zJb58" crossorigin="anonymous"></script>
</body>
</html>