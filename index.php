<?php
    $insert = false;
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success conecting to the database";

    $name =$_POST['name'];
    $age =$_POST['age'];
    $email =$_POST['email'];
    $gender =$_POST['gender'];
    $phone =$_POST['phone'];
    $size =$_POST['size'];
    $other =$_POST['other'];
    $sql = "INSERT INTO `store`.`store` (`name`, `age`, `gender`, `email`, `phone`, `size`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$size', '$other', current_timestamp())";
    
    if($con->query($sql)== true){
        // echo "Succesfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Store Form</title>
</head>

<body>
    <div class="container">
        <h1>Welcome To Mayo College Store Form</h1>
        <p>Fill The Required Details To Confirm Your Order</p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name Here" />
            <input type="text" name="age" id="age" placeholder="Enter Your Age Here" />
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender Here" />
            <input type="email" name="email" id="email" placeholder="Eneter Your Email Here" />
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number Here" />
            <input type="text" name="size" id="size" placeholder="Enter your Size Here" />
            <textarea name="other" id="other" cols="30" rows="10"
                placeholder="Enter Any Other Information Here"></textarea>
            <?php
            if($insert == true){
                echo "<p class='submit_msg'>
                Thanks for Submiting your form. We have placed your order succesfully
            </p>";}
            ?>
            <button class="btn">SUBMIT</button>
        </form>
    </div>
</body>

</html>