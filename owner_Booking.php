<?php 
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
?>
<?php

if (isset($_GET['add_amount'])) {


    // $crt_by = $_POST['crt_by'];
    // $user_booking_id = $_GET['user_booking_id'];
    $booking_amount = $_GET['booking_amount'];
    // $checkbox = $_GET['check'];
    $user_booking_id = $_GET['user_booking_id'];
    $booking_id = $_GET['booking_id'];

    $status = "OA";

    
     
        
        $sql = "UPDATE `user_booking` SET `status`='$status' WHERE `user_booking_id`='$user_booking_id'";

    $sql1 = "UPDATE `booking` SET `amount`='$booking_amount' WHERE `booking_id`='$booking_id'";
    
        if($con->query($sql)===TRUE){   

    if (mysqli_query($con, $sql1)) {

        if (mysqli_query($con, $sql1)) {
            echo "<script>alert('Data inserted successfully');document.location='owner_Booking.php'</script>";

            // echo "goood to go ";
            //  echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error;
        echo "<script>alert('Data is Not inserted');document.location='owner_Booking.php'</script>";
        // echo "<script>alert('Data Not inserted');</script>";

        // echo "not good to go";

    }
        }          
   
}


if (isset($_GET['reject'])) {

    
    
    
    $user_booking_id = $_GET['user_booking_id'];

    $status = "OR";

    
     
        


    $sql1 = "UPDATE `user_booking` SET `status`='$status' WHERE `user_booking_id`='$user_booking_id'";
    
       

    if (mysqli_query($con, $sql1)) {

        if (mysqli_query($con, $sql1)) {
            echo "<script>alert('Data inserted successfully');document.location='owner_Booking.php'</script>";

            // echo "goood to go ";
            //  echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error;
        echo "<script>alert('Data is Not inserted');document.location='owner_Booking.php'</script>";
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

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                         <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Taxi Number</th>
                                        <th>Route</th>
                                        <th>Stop</th>
                                        <th>Distance KM</th>
                                        <th>Amount</th>
                                        <th>Reject</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $role = $_SESSION['ID'];
                                    $sql = "SELECT
                                    ownerTaxiInfo.taxiInfo_id,
                                    ownerTaxiInfo.taxiNumber,
                                    ownerTaxiInfo.ownerName,
                                    ownerTaxiInfo.modileNumber,
                                    ownerTaxiInfo.seatsInTaxi,
                                    user_booking.user_booking_id,
                                    user_booking.name,
                                    user_booking.mobile,
                                    user_booking.address,
                                    user_booking.route,
                                    user_booking.stop_name,
                                    user_booking.distance_KM,
                                    user_booking.status,
                                    booking.amount,
                                    booking.booking_id
                                FROM
                                    ownerTaxiInfo,
                                    user_booking,
                                    booking
                                WHERE
                                    booking.user_booking_id=user_booking.user_booking_id AND booking.taxiInfo_id=ownerTaxiInfo.taxiInfo_id AND  user_booking.status = 'FO'  ";
                                    $result = mysqli_query($con, $sql);
                                    $sr = 1;
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                            <tr>
                                                <td><?php echo $sr++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['taxiNumber']; ?></td>
                                                <td><?php echo $row['route']; ?></td>
                                                <td><?php echo $row['stop_name']; ?></td>
                                                <td><?php echo $row['distance_KM']; ?></td>
                                                <td>
                                                    <form action="owner_Booking.php" method="get">
                                                        <input type="hidden" name="user_booking_id" value="<?php echo $row['user_booking_id']; ?>">
                                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                                    <input type="number" value="<?php echo $row['amount']; ?>" required name="booking_amount" id="">
                                                    <button type="submit" class="btn btn-success" name="add_amount">Send</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="owner_Booking.php" method="get">
                                                        <input type="hidden" name="user_booking_id" value="<?php echo $row['user_booking_id']; ?>">
                                                      
                                                   
                                                    <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                                                    </form>
                                                </td>
                                              

                                               
                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Taxi Number</th>
                                        <th>Route</th>
                                        <th>Stop</th>
                                        <th>Distance KM</th>
                                        <th>Amount</th>
                                        <th>Reject</th>
                                       
                                    </tr>
                                </tfoot>
                            </table>
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

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>