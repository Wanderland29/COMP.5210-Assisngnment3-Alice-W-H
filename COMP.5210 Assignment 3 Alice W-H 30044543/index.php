<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/main.css"/> -->

<div class="p-3 mb-2 bg-secondary text-white">
    <title>SCP Web Application</title>
  </head>
  <body class="container">
      <?php include "connection.php"; ?>
      <ul class="nav bg-white">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="create.php" class="nav-link">Create new SCP Record</a></li>
          
          <!---- run php loop through DB and display item names here---->
          <?php foreach($result as $item): ?>
          <li class="nav-item">
              <a href="index.php?scp='<?php echo $item['item']; ?>'" class="nav-link"><?php echo $item['item']; ?></a>
          </li>

          <?php endforeach; ?>
      </ul>
    <?php
    
    if(isset($_GET['scp']))
    {
        //remove single quotes or 27% from GET value
        $scp = trim($_GET['scp'], "'");
        
        //run sql query based on our $scp get value
        $record = $mysqli->query("select * from scp where item='$scp'") or die($mysqli->error);
        
        // convert new $record into associative arrray
        $row = $record->fetch_assoc();
        
        //update and delete variables
        $id = $row['id'];
        $update = 'update.php?update=' . $id;
        $delete = 'connection.php?delete=' . $id;
        
        $image = $row['image'];
        
        if($image === "")
        {
            //display the record on screen with no image
        echo "
        <h1>{$row['item']}</h1>
        <h2>{$row['class']}</h2>
        <h3>Description</h3>
        <p>{$row['description']}</p>
        <h3>Containment</h3>
        <p>{$row['containment']}</p>
        <a href='{$update}' class='btn btn-warning'>Update</a>
        <a href='{$delete}' class='btn btn-danger'>Delete</a>
        </p>
        
        ";
        }
        else
        {
        //display the record on screen with image
        echo "
        <h1>{$row['item']}</h1>
        <h2>{$row['class']}</h2>
        <h3>Description</h3>
        <p>{$row['description']}</p>
        <h3>Containment</h3>
        <p>{$row['containment']}</p>
        <p><img width='400' height='400' src='{$image}'></p>
        <a href='{$update}' class='btn btn-warning'>Update</a>
        <a href='{$delete}' class='btn btn-danger'>Delete</a>
        </p>
        
        ";
        }
    }
    else
    {
        echo "
        
        <h1>Welome to the SCP page</h1>
        <p>Click in the links above to view an SCP subject</p>
        </div>
        ";
    }
    
    ?>
    
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>