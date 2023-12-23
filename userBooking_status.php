<?php 
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
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
                                <!-- Title -->
                                Booking Status
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
        <th>Status</th>
       
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
    user_booking.crt_by,
    booking.amount,
    booking.booking_id
FROM
    ownerTaxiInfo,
    user_booking,
    booking
WHERE
    booking.user_booking_id=user_booking.user_booking_id AND booking.taxiInfo_id=ownerTaxiInfo.taxiInfo_id   AND user_booking.crt_by='$role'  ";
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
                  
                   <p class="btn btn-warning"> Amount :- <?php echo $row['amount']; ?> </p>
                   

                </td>
                <td><?php $status = $row['status'];
                                                    if ($status == 'OA') { ?>
                                                      <center><p class="btn btn-success rounded">Approved</p></center>
                                                    <?php  } elseif ($status == 'OR') { ?>
                                                        <center>   <p class="bg-danger btn  rounded">Rejected</p></center>
                                                    <?php } elseif ($status == 'FA') { ?>
                                                        <center><p class="bg-warning rounded">Forwarded to Admin</p></center>
                                                      <?php  } elseif ($status == 'FO') { ?>
                                                          <center>  <p class="bg-success rounded">Forwarded to Owner</p> </center>
                                                      <?php } else { ?>
                                                          <center>   <p class="bg-danger rounded">Rejected</p></center>
                                                      <?php
                                                      }


                                                    ?>

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
        <th>Status</th>
       
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