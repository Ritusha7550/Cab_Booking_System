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

                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Taxi No</th>
                                        <th>Adhar Number</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                <?php
                    $role = $_SESSION['ID'];
                    $sql = "SELECT * FROM `ownerLogin` ";
                    $result = mysqli_query($con, $sql);
                    $sr = 1;
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                    ?>
                                    <tr>
                                        <td><?php echo $sr++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['taxiNo']; ?></td>
                                        <td> <?php echo $row['adharNo']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email_id']; ?></td>
                                        <td><?php echo $row['mobileNo']; ?></td>
                                    </tr>
                                    <?php }
                    }
                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Taxi No</th>
                                        <th>Adhar Number</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
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