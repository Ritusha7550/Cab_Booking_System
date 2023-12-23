<?php 
include 'header.php';
require_once 'dbconfig.php';
include 'nav.php';
?>


<?php

if(isset($_POST['add_route'])) 
{  

   
    $crt_by = $_POST['crt_by'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    
    
  
    
    $sql = "INSERT INTO `route`(`start`, `end`, `crt_by`) VALUES ('$start','$end','$crt_by')";

    if (mysqli_query($con, $sql))
    {
       
       

        echo "<script>alert('Data inserted successfully');document.location='add_route.php'</script>";

        // echo "goood to go ";
        //  echo "Error: " . $sql . "<br>" . $con->error;
    }
    else
    {
    // echo "Error: " . $sql . "<br>" . $con->error;
    echo "<script>alert('Data is Not inserted');document.location='add_route.php'</script>";
    // echo "<script>alert('Data Not inserted');</script>";

    // echo "not good to go";
  
    }
}


// if(isset($_GET['deleteid'])) 
// {  

   
//     $id = $_GET['deleteid'];
    
    
//     // echo "<script>alert('Access')</script>";
  
// $sql = "DELETE FROM academic_workload WHERE workLoad_id='$id' ";
// if (mysqli_query($con, $sql)) {
//     echo "<script>alert(' Data Deleted successfully');document.location='workLoad.php'</script>";
//       }else{
//         echo "<script>alert(' Data is NOT Deleted');document.location='workLoad.php'</script>";
//       }
//       mysqli_close($con);
// }


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
                   <form action="add_route.php" method="post">
                        <div class="card-body">

                        <div class="row">
                  <div class="col-6">
                  <label for="exampleInputEmail1">Start To :-</label>
                    <input type="text" class="form-control" name="start" placeholder="Start Route">
                    <input type="hidden" name="crt_by" value="<?php echo $_SESSION['ID']; ?>"  id="">
                  </div>
                  <div class="col-6">
                  <label for="exampleInputEmail1">End</label>
                    <input type="text" class="form-control" name="end" placeholder="End Route">
                  </div>
                 
                </div>
                            
                          
                        </div>
                </div>

                
             
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_route"  class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
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
                                            <th>Start Route</th>
                                            <th>End Route</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                    $role = $_SESSION['ID'];
                    $sql = "SELECT * FROM `route` WHERE `crt_by` = '$role'";
                    $result = mysqli_query($con, $sql);
                    $sr = 1;
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                                    <tr>
                                        <td> <?php echo $sr++; ?></td>
                                        <td > <?php echo $row['start']; ?> </td>
                                        <td > <?php echo $row['end']; ?> </td>
                                        <td ><a href="add_route.php?deleteid=<?php echo $row['route_id']; ?>" onclick="return confirm('Are you sure you want to update this item')"><i class="fas fa-trash-alt"></i></a>  </td>
                                    </tr>
                                    <?php }
                    }
                    ?>
                                    <tfoot>
                                        <tr>
                                        <th>Sr.No</th>
                                            <th>Start Route</th>
                                            <th>End Route</th>
                                           
                                            <th>Action</th>
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
