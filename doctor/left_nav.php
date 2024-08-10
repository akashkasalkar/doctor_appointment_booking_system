<?php 
    include '../dbconn.php';
    include "../email.php"; 

?>

<?php

    session_start();
    if(!isset($_SESSION['email'])){ 
        header('Location:../index.php');

    }
    $dr_email = $_SESSION['email'];
    $dct_qry = "select * from user where user_email = '$dr_email'";
    $dr_exc = mysqli_query($con,$dct_qry);
    while($row = mysqli_fetch_array($dr_exc))
    {
        $doctor_id = $row['user_id'];
        $dr_name = $row['user_name'];
        $dr_email = $row['user_email'];
        $dr_phone = $row['phone'];
        $dr_address = $row['address'];
        $password_status = $row['pass_change_status'];

        

    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VISION CARE</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
     
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>

    
</head>
<body>
    
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Doctor Dashboard </div>
    <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="viewAllAppointment.php" class="list-group-item list-group-item-action bg-light">Appointments</a>
        <a href="viewPatient.php" class="list-group-item list-group-item-action bg-light">Patient Details</a>
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Reports</a> -->
        <a href="./profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="./logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>

    </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn " id="menu-toggle"><span class="h3">VISION CARE</span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $dr_email ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="./changePassword.php">Change Password</a>

                        <a class="dropdown-item text-danger" href="./logout.php">Logout</a>

                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <br>