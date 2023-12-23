<?php
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
?>
<?php

if (isset($_GET['sendToOwner'])) {


    // $crt_by = $_POST['crt_by'];
    // $user_booking_id = $_GET['user_booking_id'];
    $taxiInfo_id = $_GET['taxiInfo_id'];
    $checkbox = $_GET['check'];

    $status = "FO";

    for($i=0;$i<count($checkbox);$i++){
        $del_id = $checkbox[$i]; 
        // echo $del_id;
        // echo "<script>alert($del_id)</script>";
      
        
        $sql = "INSERT INTO `booking`( `user_booking_id`, `taxiInfo_id`) VALUES ('$del_id','$taxiInfo_id')";

    $sql1 = "UPDATE `user_booking` SET `status`='$status' WHERE `user_booking_id`='$del_id'";
    
        if($con->query($sql)===TRUE){   

    if (mysqli_query($con, $sql1)) {

        if (mysqli_query($con, $sql1)) {
            echo "<script>alert('Data inserted successfully');document.location='booking.php'</script>";

            // echo "goood to go ";
            //  echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error;
        echo "<script>alert('Data is Not inserted');document.location='booking.php'</script>";
        // echo "<script>alert('Data Not inserted');</script>";

        // echo "not good to go";

    }
        
        
        }          
           
    
    
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

                            </h3>
                        </div>
                        <form action="booking.php" method="get">
                                                        <input type="hidden" value="<?php echo $row['user_booking_id']; ?>" name="user_booking_id" id="">

                                                        <select class="form-control select2 m-2" name="taxiInfo_id" required style="width: 100%;">
                                                        <option value="">--Select--</option>
                                                            <?php
                                                            $role = $_SESSION['ID'];
                                                            $sql = "SELECT * FROM `ownerTaxiInfo` ";
                                                            $result = mysqli_query($con, $sql);
                                                            $sr = 1;
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {

                                                            ?>

                                                                    <option value="<?php echo $row['taxiInfo_id']; ?>"><?php echo $row['taxiNumber']; ?> </option>

                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>

                                                        <button type="submit" name="sendToOwner" class="btn btn-success m-2">Forwarded to Owner</button>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>name</th>
                                        <th>mobile</th>
                                        <th>address</th>
                                        <th>route</th>
                                        <th>stop_name</th>
                                        <th>distance_KM</th>
                                        <th>status</th>
                                        <th>Select</th>
                                        
                                </thead>
                                <tbody>
                                    <?php
                                    $role = $_SESSION['ID'];
                                    $sql = "SELECT * FROM `user_booking` WHERE `status`='FA' OR status='FO'";
                                    $result = mysqli_query($con, $sql);
                                    $sr = 1;
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                            <tr>
                                                <td><?php echo $sr++; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['mobile']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['route']; ?></td>
                                                <td><?php echo $row['stop_name']; ?></td>
                                                <td><?php echo $row['distance_KM']; ?></td>
                                                <td><?php $status = $row['status'];
                                                    if ($status == 'FA') { ?>
                                                      <center><p class="bg-warning rounded">Forwarded to Admin</p></center>
                                                    <?php  } elseif ($status == 'FO') { ?>
                                                        <center>  <p class="bg-success rounded">Forwarded to Owner</p> </center>
                                                    <?php } else { ?>
                                                        <center>   <p class="bg-danger rounded">Rejected</p></center>
                                                    <?php
                                                    }

                                                    ?>
                                                </td>
                                                <td><input type="checkbox" id="checkItem"  name="check[]"
                                                    value="<?php echo $row["user_booking_id"]; ?>" ></td>


                                            </tr>
                                    <?php }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>name</th>
                                        <th>mobile</th>
                                        <th>address</th>
                                        <th>route</th>
                                        <th>stop_name</th>
                                        <th>distance_KM</th>
                                        <th>status</th>
                                        <th>Select </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </form>
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
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>