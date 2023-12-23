<?php 
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
?>
<?php

if(isset($_POST['add_taxi'])) 
{  

   
    $crt_by = $_POST['crt_by'];
    $taxiNumber = $_POST['taxiNumber'];
    $passingYear = $_POST['passingYear'];
    $ownerName = $_POST['ownerName'];
    $address = $_POST['address'];
    $adharNumber = $_POST['adharNumber'];
    $modileNumber = $_POST['modileNumber'];
    $email = $_POST['email'];
    $seatsInTaxi = $_POST['seatsInTaxi'];

    
  
    
    $sql = "INSERT INTO `ownerTaxiInfo`(`taxiNumber`, `passingYear`, `ownerName`, `address`, `adharNumber`, `modileNumber`, `email`, `seatsInTaxi`, `crt_by`) VALUES ('$taxiNumber','$passingYear','$ownerName','$address','$adharNumber','$modileNumber','$email','$seatsInTaxi','$crt_by')";

    if (mysqli_query($con, $sql))
    {
       
       

        echo "<script>alert('Data inserted successfully');document.location='add_Taxi.php'</script>";

        // echo "goood to go ";
        //  echo "Error: " . $sql . "<br>" . $con->error;
    }
    else
    {
    // echo "Error: " . $sql . "<br>" . $con->error;
    echo "<script>alert('Data is Not inserted');document.location='add_Taxi.php'</script>";
    // echo "<script>alert('Data Not inserted');</script>";

    // echo "not good to go";
  
    }
}

?>
<!-- Modale Contant Start -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Route</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-default">
                    <div class="card-header">
                        <!-- <h3 class="card-title">Quick Example</h3> -->
                    </div>
                    <form action="add_Taxi.php" method="post">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Taxi Number</label>
                                    <input type="text" class="form-control" placeholder="Taxi Number" name="taxiNumber">
                                </div>
                                <input type="hidden" name="crt_by" value="<?php echo $_SESSION['ID']; ?>">  
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Passing Year</label>
                                    <input type="text" class="form-control" placeholder="Passing Year" name="passingYear">
                                </div>

                                <div class="col-6">
                                    <label for="exampleInputEmail1">Owner Name</label>
                                    <input type="text" class="form-control" placeholder="Owner Name" name="ownerName">
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>

                                <div class="col-6">
                                    <label for="exampleInputEmail1">Adhar Number</label>
                                    <input type="text" class="form-control" placeholder="Adhar Number" name="adharNumber">
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="text" class="form-control" placeholder="Mobile" name="modileNumber">
                                </div>

                                <div class="col-6">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="col-6">
                                    <label for="exampleInputEmail1">Seats in Taxi</label>
                                    <input type="text" class="form-control" placeholder="Seats in Taxi" name="seatsInTaxi">
                                </div>

                            </div>
                           
                        </div>
                </div>


                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="add_taxi" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- MOdale contane End Hear -->

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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-lg">
                                    Add
                                </button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Taxi Number</th>
                                        <th>PassingYear</th>
                                        <th>OwnerName</th>
                                        <th>Mobile</th>
                                        <th>Seats in Taxi</th>
                                    </tr>
                                </thead>
                                <tbody>


                               <?php
                    $role = $_SESSION['ID'];
                    $sql = "SELECT * FROM `ownerTaxiInfo` WHERE `crt_by` = '$role'";
                    $result = mysqli_query($con, $sql);
                    $sr = 1;
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                                    <tr>
                                    <td> <?php echo $sr++; ?></td>
                                        <td > <?php echo $row['taxiNumber']; ?> </td>
                                        <td><?php echo $row['passingYear']; ?></td>
                                        <td><?php echo $row['ownerName']; ?></td>
                                        <td><?php echo $row['modileNumber']; ?></td>
                                        <td><?php echo $row['seatsInTaxi']; ?></td>
                                    </tr>
                                    <?php }
                    }
                    ?>

                                </tbody>
                                <tfoot>
                                <th>Sr.No</th>
                                        <th>Taxi Number</th>
                                        <th>PassingYear</th>
                                        <th>OwnerName</th>
                                        <th>Mobile</th>
                                        <th>Seats in Taxi</th>
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