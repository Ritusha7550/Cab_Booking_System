
text/x-generic Route-Change1.php ( PHP script, ASCII text, with very long lines )
<?php 

session_start();

// mysqli_set_charset($connect,'UTF8');


if(!$_SESSION['username'])
{
    header('Location: index.php');
}

include('dbconfig.php');
        include('includes/header.php'); 
        include('includes/navbar.php');  
        ?>
<?php
include_once 'dbconfig.php';
if(isset($_POST['save'])){
    $UpdateAssignedRoute = $_POST['UpdateAssignedRoute'];
	$checkbox = $_POST['check'];
    $select_route = $_POST['select_route'];

    if(empty($_POST["UpdateAssignedRoute"]) || empty($_POST["check"]))  
    {  
        // echo '<script>alert("Both Fields are required")</script>';  
        // echo'<script>window.location.href='admin/ahm/panel';</script>'
        echo "<script>alert('Both Fields are required');document.location='Route-Change1.php?select_route=". $_POST['select_route'] ."&submit_route='</script>";
    }  
    else
    { 
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
    // echo $del_id;
    // echo $UpdateAssignedRoute;
	// mysqli_query($connect,"UPDATE `SGI_Student` SET `fk_pk_route_key`='$UpdateAssignedRoute' WHERE pk_stud_key='".$del_id."'");
    // header("Location:Route-Change1.php?select_route=". $_GET['select_route'] ."&submit_route=");
   
    $sql = "UPDATE `SGI_Student` SET `fk_pk_route_key`='$UpdateAssignedRoute' WHERE pk_stud_key='".$del_id."'";

    if($connect->query($sql)===TRUE){
        // echo "DATA updated";
        header("Location:Route-Change1.php?select_route=". $_POST['select_route'] ."&submit_route=");
    
    
    }          
       


    }
}
}
?>
<div class="content">
    <div class="container-fluid">
        <!-- Modal -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-12">
                        <form id="TypeValidation" class="form-horizontal" action="" method="get">
                            <div class="card-header card-header-text" data-background-color="rose">
                                <h4 class="card-title">Select Route</h4>
                            </div>
                            <div class="card-content">

                                <div class="row">
                                    <label class="col-sm-1 label-on-left"></label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <!-- <label class="bmd-label"> Assign Route <span style="color:red;">*</span></label> -->
                                            <!-- <br> -->
                                            <select class="selectpicker form-control" data-live-search="true"
                                                data-live-search-style="startsWith" name="select_route"
                                                id="" data-style="select-with-transition" required>
                                                <option></option>

                                                <?php
                                        include('dbconfig.php');
                                        $sql = "SELECT * FROM SGI_Route WHERE `del_flag`='n'";
                                        $result = mysqli_query($connect,$sql);
                                    
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['pk_route_key'];?>"><?php echo $row['route_name'];?></option>

                                            <?php 
                                                }
                                            } else 
                                            {
                                                echo "0 results";
                                            }
                                            //   $connect->close();
                
                                            ?>
                                        </select>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="card-footer text-center">
                           <button  type="submit" name="submit_route" class="btn btn-rose btn-fill">Submit</button>    
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end content-->
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <?php
              if(isset($_GET["submit_route"]))
              {
                $route=$_GET['select_route']; 
                // $trip_type=$_POST['trip_type'];  
             ?>
                <?php
                                        include('dbconfig.php');
                                        $sql = "SELECT * FROM SGI_Route WHERE pk_route_key='$route' AND `del_flag`='n'";
                                        $result = mysqli_query($connect,$sql);
                                    
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_array($result)) {
                                            $Rname =  $row['route_name'];

                                        }}


                ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title"> AssignedRoute  (Selected Route :- <?php echo $Rname; ?>) </h4>

                    </div>
                    <form action="" method="POST">
                        <div class="card-footer text-right">
                            <div class="form-check mr-auto">

                            </div>
                            <div class="form-group col-4">
                                    <!-- <label class="bmd-label"> Assign Route <span style="color:red;">*</span></label> -->
                                    <br>
                                    <select class="selectpicker form-control" data-live-search="true"
                                        data-live-search-style="startsWith" name="UpdateAssignedRoute"
                                        id="AssignedRoute" data-style="select-with-transition" required>
                                        <option></option>
                                        <?php
                                        include('dbconfig.php');
                                        $sql = "SELECT * FROM SGI_Route WHERE `del_flag`='n'";
                                        $result = mysqli_query($connect,$sql);
                                    
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['pk_route_key'];?>"><?php echo $row['route_name'];?></option>

                                            <?php 
                                                }
                                            } else 
                                            {
                                                echo "0 results";
                                            }
                                            //   $connect->close();
                
                                            ?>
                                        </select>
                                </div>
                            <button type="submit" class="btn btn-success" name="save">Update Route</button>

                        </div>
                        <div class="card-body">
                       
                            <div class="toolbar">

                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                                        <input type="hidden" name="select_route"
                                                    value="<?php echo $route; ?>" >
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th><input type="checkbox" id="checkAl"> Select All</th>
                                        <th class="disabled-sorting "> Sr.No </th>
                                            <th class="disabled-sorting "> StudentName </th>
                                            <th class="disabled-sorting "> Route Name </th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                        <?php
                                         $sesson = $_SESSION['id'];                                    $i=0;
                                    $cnt = 1;
                                    $result = mysqli_query($connect,"SELECT SGI_Route.route_name,SGI_Student.pk_stud_key,SGI_Student.fk_pk_route_key,SGI_Student.first_name,SGI_Student.middle_name,SGI_Student.last_name, SGI_Student.mobile_no, SGI_Student.gender, SGI_Student.address,SGI_Student.standard, SGI_Student.division, SGI_Student.board, SGI_Student.name_marathi ,SGI_Route.route_name , SGI_Route.pk_route_key FROM SGI_Student , SGI_Route WHERE SGI_Route.pk_route_key = SGI_Student.fk_pk_route_key AND SGI_Student.fk_pk_route_key = SGI_Route.pk_route_key AND SGI_Student.del_flag='n' AND SGI_Student.fk_pk_route_key = '$route'
                                   AND SGI_Student.crt_by= '$sesson'");

                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" id="checkItem" name="check[]"
                                                    value="<?php echo $row["pk_stud_key"]; ?>" ></td>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row["first_name"]; ?> <?php echo $row["middle_name"]; ?> <?php echo $row["last_name"]; ?><input type="hidden" id="pk_stud_key"
                                                    name="StudentName[]" value="<?php echo $row["pk_stud_key"]; ?>">
                                            </td>
                                            <td><?php echo $row["route_name"]; ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                            $cnt = 1+$cnt;
                                        }
               } 
                                       ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>


<?php 
        include('includes/footer.php'); 
        include('includes/scripts_data.php'); 
        
 ?>

<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>