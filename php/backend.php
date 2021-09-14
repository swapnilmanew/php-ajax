<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "student";
    $con = mysqli_connect($host, $username,$password,$db_name);
    extract($_POST);

    // inserting data into the database
        if(isset($_POST['studentName']) || isset($_POST['age']) || isset($_POST['city']) || isset($_FILES) )
            {
            $filename = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            $path = "images/".$filename;
            move_uploaded_file($tmp_name, $path);
            
            $insert_query = "INSERT INTO data VALUES(' ', '$studentName', '$age', '$city', '$filename')";
            $fire_query = mysqli_query($con,$insert_query);
            }

        //fetching data from the database
        if(isset($_POST['records']))
            {
                $display_query = "SELECT * FROM data ORDER BY id DESC LIMIT 1";
                $display_fire = mysqli_query($con,$display_query);
                $result = mysqli_fetch_assoc($display_fire);
                echo "
                <div class='card p-3'>
                <img src='./images/".$result['image']."' alt=''>
                <div class='card-body'>
                <h3>Name : ".$result['name']."</h3>
                <h3>Age : ".$result['age']."</h3>
                <h3>City : ".$result['city']."</h3>
                </div>
                </div>
                    ";
        }

?>