<?php
include('dbconfig.php');
session_start();
if (isset($_SESSION['ID'])) {
    header("Location:mainindex.php");
    exit();
}
// Include database connectivity

 if (isset($_POST['admin_login'])) {

    $AdminRole = $_POST['role'];

    if ($AdminRole == 'A') {
        $errorMsg = "";

    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string(md5($_POST['password']));
    
    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        $errorMsg = "Both Fields are required";  
    } 

else {
      $query  = "SELECT * FROM admins WHERE username = '$username'";
      $result = $con->query($query);
       if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($password == $row['password'] ){
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['EMAIL'] = $row['email'];
            header("Location:mainindex.php");
            die();  
          } 
          else{
            $errorMsg = "Password Not Match";
          }
                                     
      }else{
        $errorMsg = "No user found on this username";
      } 
  }
    } elseif ($AdminRole == 'O') {
        $errorMsg = "";

    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string(md5($_POST['password']));
    
    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        $errorMsg = "Both Fields are required";  
    } 

else {
      $query  = "SELECT * FROM ownerLogin WHERE username = '$username'";
      $result = $con->query($query);
       if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($password == $row['password'] ){
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['taxiNo'] = $row['taxiNo'];
            $_SESSION['EMAIL'] = $row['email_id'];
            header("Location:mainindex.php");
            die();  
          } 
          else{
            $errorMsg = "Password Not Match";
          }
                                     
      }else{
        $errorMsg = "No user found on this username";
      } 
  }
    } else {
        $errorMsg = "";

    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string(md5($_POST['password']));
    
    if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        $errorMsg = "Both Fields are required";  
    } 

else {
      $query  = "SELECT * FROM users WHERE username = '$username'";
      $result = $con->query($query);
       if($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if($password == $row['password'] ){
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['EMAIL'] = $row['email'];
            header("Location:mainindex.php");
            die();  
          } 
          else{
            $errorMsg = "Password Not Match";
          }
                                     
      }else{
        $errorMsg = "No user found on this username";
      } 
  }
    }

   
//   else{
//     $errorMsg = "Username and Password is required";
//   }
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
                            <label class="text-danger" for="">Login|Form</label>
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
                    <?php 
            if (isset($_GET['msg']) && $_GET['msg'] == 'regsuccess') { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo "Register Successfully Please Login...";
            unset($_GET['msg']); ?>
                    </div>
                    <?php }
            ?>
                    <form action="index.php" method="post">
                        <div class="form-control py-5">
                            <div class="input-group  mb-3 ">
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    aria-label="First name">
                            </div>


                            <div class="input-group mb-3 ">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    aria-label="First name">
                            </div>
                            <div class="input-group mb-3 ">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">user Type</i>
                                    </span>
                                </div>
                                <select name="role" class="custom-select">
                                    <!-- <option  >Select</option> -->
                                    <option value="A" selected>Admin</option>
                                    <option value="O">Owner</option>
                                    <option value="U">User</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button name="admin_login" class="btn btn-primary">Login</button>

                                <!-- <button name="user_login" class="btn btn-primary">Login</button> -->
                            </div>
                            <br><br>
                            <div class="d-flex justify-content-center">
                                <a href="register.php">Do Not Have an Account?. Please Register </a>
                            </div>



                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</body>

</html>