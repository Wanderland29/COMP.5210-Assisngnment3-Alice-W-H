<div class="p-3 mb-2 bg-secondary text-white">
<?php

//create connection object save as $mysqli variable
$mysqli = new mysqli('localhost', 'a3004454_scpuser', 'Spongebob2992', 'a3004454_scp') or die(mysqli_error($mysqli));


//variable that will hold all information from database
$result = $mysqli->query("select * from scp");


// receive data from create form
    if(isset($_POST['create']))
    {
        $item = $_POST['item'];
        $class = $_POST['class'];
        $description = $_POST['description'];
        $containment = $_POST['containment'];
        $image = $_POST['image'];
       
       // create insert sql command
        $insert = "insert into scp(item, class, containment, description, image)
        values('$item', '$class', '$containment', '$description', '$image')";
       
        if($mysqli->query($insert) === TRUE)
        {
            echo "
           
                <h1>Record was added successfully</h1>
                <p><a href='index.php'>Back to index page</a></p>
           
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$mysqli->error()}</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
       
    }
    
    //check if update form has been posted
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $class = $_POST['class'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        
        $update ="update scp set item='$item', class='$class', containment='$containment', description='$description', image='$image' where id='$id'";
        
        //run the update query with success or errror messages
        if($mysqli->query($update) === TRUE)
        {
            echo "
            <h1>Record updated successfully</h1>
            <p><a href='index.php'>Back to index page</a></p>
            
            ";
        }
        else
        {
            echo "
            <h1>Error Updating Record</h1>
            <p>{$mysqli->error()}</p>
            <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
    
    //delete code
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        $delete = "delete from scp where id=$id";
        
        if($mysqli->query($delete) === TRUE)
        {
            echo "
            <h1>Record delete successfully</h1>
            <p><a href='index.php'>Back to index page</a></p>
            
            ";
        }
        else
        {
            echo "
            <h1>There was an error deleting the Record</h1>
            <p>{$mysqli->error()}</p>
            <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
    


?>
</div>