<?php 
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
?>
<?php

if(isset($_POST['user_booking'])) 
{  

   
    $crt_by = $_POST['crt_by'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $route = $_POST['route'];
    $stop_name = $_POST['stop_name'];
    $distance_KM = $_POST['distance_KM'];
    
    $status = "FA"; 
    
  
    
    $sql = "INSERT INTO `user_booking`(`name`, `mobile`, `address`, `route`, `stop_name`, `distance_KM`, `status`, `crt_by`) VALUES ('$name','$mobile','$address','$route','$stop_name','$distance_KM','$status','$crt_by')";

    if (mysqli_query($con, $sql))
    {
       
       

        echo "<script>alert('Data inserted successfully');document.location='user_Booking.php'</script>";

        // echo "goood to go ";
        //  echo "Error: " . $sql . "<br>" . $con->error;
    }
    else
    {
    // echo "Error: " . $sql . "<br>" . $con->error;
    echo "<script>alert('Data is Not inserted');document.location='user_Booking.php'</script>";
    // echo "<script>alert('Data Not inserted');</script>";

    // echo "not good to go";
  
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">
                                Booking
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="user_Booking.php" method="post">
                            <div class="row">
                               
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                    <input type="hidden" name="crt_by" value="<?php echo $_SESSION['ID']; ?>"  id="">

                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="mobile">
                                </div>

                                <div class="col-6">
                                    <br>
                                    <label for="exampleInputEmail1">Location(Address)</label>
                                    <input type="text" class="form-control" placeholder="Location(Address)" name="address">
                                </div>
                                <div class="col-6">
                                    <br>
                                    <!-- <label for="exampleInputEmail1">Route</label>
                                    <input type="text" class="form-control" placeholder="Route" name="route"> -->
                                    <div class="form-group">
                                        <label>Route</label>
                                        <select class="form-control select2" name="route" style="width: 100%;">
                                            <?php
                    $role = $_SESSION['ID'];
                    $sql = "SELECT * FROM `route` ";
                    $result = mysqli_query($con, $sql);
                    $sr = 1;
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                    ?>

                                            <option><?php echo $row['start']."-".$row['end']; ?> </option>

                                            <?php }
                    }
                    ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <label for="exampleInputEmail1">Stop</label>
                                    <input type="text" class="form-control" placeholder="Stop" name="stop_name">
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Distance (KM)</label>
                                    <input type="text" class="form-control" placeholder="Distance (KM)"
                                        name="distance_KM">
                                </div>

                                <div class="col-6 ">
                                    <br><br>
                                    <div class="justify-content-center">
                                        <button type="submit" name="user_booking" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
 include 'footer.php';
 include 'scripts.php';
?>