<?php include './dbconn.php' ?>
<!doctype html>
<html lang="en">
    <head>
       

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

    </head>
    
    <body id="top">
    
        <main>

            <?php include_once('includes/header.php');?>

          
       
            

            

            <section class="section-padding" id="booking">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-12 col-12 mx-auto">
                            <div class="booking-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Search Appointment History by Email</h2>
                            
                                <form role="form" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input id="searchdata" type="email" name="email" required="true" class="form-control" placeholder="email@gmail.com">
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6 ">
                                            <button type="submit" class="form-control" name="search" id="submit-button">Check</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

    <?php
        if(isset($_POST['search'])){
            $email=$_POST['email'];
            // $email="om@gmail.com";

            ?>

       
  <h4 align="center">Result against "<?php echo $email;?>" </h4>
                    
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead class="bg-dark text-light text-center">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Appointment Number</th>
                                        <th>Patient Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                  
                                    </tr>
                                </thead>
                            
                                <tbody>
                                <?php 

                                    $qry = "SELECT * from user u,appoitments ap
                                            where u.user_email='$email'
                                            and ap.fk_patient_id = u.user_id ";
                                    $exc=mysqli_query($con,$qry);
                                    $count = mysqli_num_rows($exc); 
                                    while($row=mysqli_fetch_array($exc)){
                                        $i=1;
                                        ?>

                                     
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php  echo "PATIENT-".$row['appoitment_id'];?></td>
                                        <td><?php  echo $row['user_name'];?></td>
                                        <td><?php  echo $row['phone'];?></td>
                                        <td><?php  echo $row['user_email'];?></td>
                                      

                                        <td><?php echo $row['appoitment_status']; ?></td>
                                        
                                        

                                            
                                        
                                    </tr>
                                    <?php
                                    $i=$i+1;
                                    }


                                    if($count==0){
                                        ?>
                                        <td colspan='6' class="text-center h3">No data found</td>
                                        <?php
                                    }
                                ?>
    
                                </tbody>
             
                                

                                

                            </table>
                        </div>

                    </div>

                    <?php
                        }
                    ?>
                </div>
            </section>
             
        </main>
        <?php include_once('includes/footer.php');?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>