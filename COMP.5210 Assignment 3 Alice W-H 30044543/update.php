<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<div class="p-3 mb-2 bg-secondary text-white">
    <title>Enter new SCP record</title>
  </head>
  <body class="container">
      
    <h1>Update SCP record</h1>
    
    <?php
    
    include 'connection.php';
    $id = $_GET['update'];
    $record = $mysqli->query("select * from scp where id=$id") or die($mysqli->error());
    $row = $record->fetch_assoc();
    
    ?>
    
    <form class="form-group" method="post" action="connection.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>SCP Item:</label>
        <br>
        <input type="text" class="form-control" name="item" value="<?php echo $row['item']; ?>">
        <br>
         <label>SCP Class:</label>
        <br>
        <input type="text" class="form-control" name="class" value="<?php echo $row['class']; ?>">
        <br>
         <label>SCP Description:</label>
        <br>
        <textarea class="form-control" name="description" rows="5"><?php echo $row['description']; ?></textarea>
        <br>
        <label>SCP Containment:</label>
        <br>
        <textarea class="form-control" name="containment" rows="5"><?php echo $row['containment']; ?></textarea>
        <br>
        <label>SCP Image (Optional)</label>
        <br>
        <input type="text" name="image" class="form-control" value="<?php echo $row['image']; ?>">
        <br>
        <input type="submit" class="btn btn-info" name="update" value="Update SCP record">
        
    </form>
    
    <div class="my-3">
        <a href="index.php" class="btn btn-primary">Back to index page</a>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>