<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
    
}
?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <?php 
          
          if ($_SESSION['ROLE'] =="A" ) {
            ?>
                <li class="nav-item">
                    <a href="add_route.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>

                        <p>Add Route</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="owner.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Owners</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="booking.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="adminBooking_history.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking-History</p>
                    </a>
                </li>

                <?php
          
          }         
          
          ?>


                <?php  if ($_SESSION['ROLE'] =="O" ) {  ?>

                <!-- Owner Nav -->

                <li class="nav-item">
                    <a href="add_Taxi.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Add Taxi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="owner_Booking.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="ownerBooking_History.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking-History</p>
                    </a>
                </li>
                <?php  }   ?>

                <?php  if ($_SESSION['ROLE'] =="U" ) {  ?>
                <!-- User Nav -->
                <li class="nav-item">
                    <a href="user_Booking.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Book Taxi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="userBooking_status.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking Status</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="userBooking_History.php" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Booking-History</p>
                    </a>
                </li> -->
                <?php  }   ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>