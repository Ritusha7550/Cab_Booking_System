
<?php

// Include database connection file
include('dbconfig.php');



if (isset($_POST['owner_register'])) {
  
    
        $name = $con->real_escape_string($_POST['name']);
        $taxiNo = $con->real_escape_string($_POST['taxiNo']);
        $username = $con->real_escape_string($_POST['username']);
        $password = $con->real_escape_string(md5($_POST['password']));
        $cpassword = $con->real_escape_string(md5($_POST['cpassword']));
       $adharNo = $con->real_escape_string($_POST['adharNo']);
       $email_id = $con->real_escape_string($_POST['email_id']);
       $mobileNo = $con->real_escape_string($_POST['mobileNo']);
       $role = $con->real_escape_string($_POST['role']);
       

        if($password == $cpassword) {
        $query  = "INSERT INTO `ownerLogin`( `name`, `taxiNo`, `adharNo`, `username`, `password`, `email_id`, `mobileNo`, `role`) VALUES ('$name','$taxiNo','$adharNo','$username','$password','$email_id','$mobileNo','$role')";
        $result = $con->query($query);
      
        if ($result==true) {
          header("Location:index.php?msg=regsuccess");
          die();
        }else{
          $errorMsg  = "You are not Registred..Please Try again";
        }   
    } else {
        $errorMsg  = "Password Not Match";
    }
 

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="inc/bootstrap.min.css" rel="stylesheet">
    <script src="inc/bootstrap.bundle.min.js">
    </script>
    <script src="inc/popper.min.js">
    </script>
    <script src="inc/bootstrap.min.js">
    </script>
    <title>Book_Taxi |</title>
</head>
<body style="background-color: #f4f4f4;">


    <div class="container-sm">
        <div class="row justify-content-center" style="margin-top:130px;">

            <div class="col-md-5 ">
                <!-- <div class="col-md-12 my-5  py-5"> -->
                                <div class="card  ">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <label class="text-danger" for="">Owner Register|Form</label>
                        </div>
                    </div>

                    <?php 
            if (isset($errorMsg)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMsg;
            unset($errorMsg); ?>
                </div>
                <?php }
            ?>
                    <form action="owner_reg.php" method="post">
                        <div class="form-control py-5">
                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="taxiNo" name="taxiNo">
                            </div>
                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="adharNo" name="adharNo">
                            </div>
                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>

                            <div class="input-group mb-3 ">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="input-group mb-3 ">
                                <input type="password" class="form-control" placeholder="C Password" name="cpassword">
                            </div>

                            <div class="input-group  mb-3 ">
                                <input type="email" class="form-control" placeholder="Email" name="email_id">
                            </div>

                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="mobileNo" name="mobileNo">
                            </div>

                            <div class="input-group  mb-3 ">
                                <input type="hidden" class="form-control" placeholder="role" value="O" name="role">
                            </div>

                           

                            <div class="d-flex justify-content-end">
                                <button name="owner_register" class="btn btn-primary">Register</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="index.php" >Login </a>
                            </div>

                             


                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</body>

</html>