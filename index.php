
<!doctype html>
<html lang="en">
    <head>
        <title>Vision Care || Home Page</title>

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
            <?php include_once('dbconn.php');?>


            <section class="hero" id="hero">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slider/img13.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img4.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img2.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img3.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img1.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img7.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img10.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>

                                    <div class="carousel-item">
                                        <img src="images/slider/img12.jpg" style="width:90vw; height: 100vh; class="img-fluid" alt="">
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section class="section-padding" id="about">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-12">
                            
                            <h2 class="mb-lg-3 mb-3">About Us</h2>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima nisi aliquam, dolorum tempore consequatur unde quae, fugiat, earum reiciendis eligendi quia officia doloremque saepe laudantium. Nam rerum facere nulla atque.</p>

                        </div>

                        <div class="col-lg-4 col-md-5 col-12 mx-auto">
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number">12</span> Years<br> of Experiences</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="gallery">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-6 ps-0">
                            <img src="images/gallery/img3.jpg" style="width: 100%; height: 450px; class="img-fluid galleryImage" alt="get a vaccine" title="get a vaccine for yourself">
                        </div>

                        <div class="col-lg-6 col-6 pe-0">
                            <img src="images/gallery/img4.jpg" style="width: 100%; height: 450px; class="img-fluid galleryImage" alt="wear a mask" title="wear a mask to protect yourself">
                        </div>

                    </div>
                </div>
            </section>

            

            

            <section class="section-padding" id="booking">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="booking-form">
                                
                                <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                            
                                <form role="form" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required='true'>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="email" name="user_email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required='true'>
                                        </div>
                                   
                                        <div class="col-lg-6 col-12">
                                            <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="10" required>
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <input type="date" name="appointment_date" id="date" value="" class="form-control" required>
                                            
                                        </div>

                                            <div class="col-lg-6 col-12">
                                            <input type="time" name="appointment_time" id="time" value="" class="form-control" required>
                                            
                                        </div>




                                        <div class="col-lg-6 col-12">
                                    <select name="fk_doctor_id" id="doctorlist" class="form-control" required>
                                    <option value="">Select Doctor</option>
                                    <?php 
                                        $qry = "SELECT * from user where user_type ='Doctor'";
                                        $exc=mysqli_query($con,$qry);
                                        while($row=mysqli_fetch_array($exc)){
                                            ?>
                                            <option value="<?php echo $row['user_id'] ?>"><?php echo $row['user_name'] ?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                    </div>



                                        <div class="col-12">
                                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                            <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST['submit'])){
                                        $user_name = $_POST['name'];
                                        $email = $_POST['user_email'];
                                        $password = "Guest@123";
                                        $phone = $_POST['phone'];
                                        $fk_doctor_id = $_POST['fk_doctor_id'];
                                        // $address = ""; #todo
                                        $appointment_date = $_POST['appointment_date'];
                                        $appointment_time = $_POST['appointment_time'];
                                        $message = $_POST['message'];
                                        $user_type = "Patient";
                                        
                                        $final_time = $appointment_date. " ".$appointment_time.":00";
                                        $timestamp = strtotime($final_time);
                                        // Format the timestamp as a date
                                        $final_time = date("Y-m-d H:i:s", $timestamp);

                                        $alredy_user_exist_qry = "select * from user where user_email='$email'";
                                        $result = mysqli_query($con, $alredy_user_exist_qry);  
						                $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

                                        $last_insertd_id=$row['user_id'];
                                      
						                $count = mysqli_num_rows($result);
                                        

                                        $appointment_alredy_qry="select * from appoitments where fk_patient_id='$last_insertd_id' 
                                        and fk_doctor_id='$fk_doctor_id'
                                        and appoitment_status='Scheduled'";
                                        $app_result = mysqli_query($con, $appointment_alredy_qry);  
						                // $app_row = mysqli_fetch_array($app_result, MYSQLI_ASSOC); 
						                $app_count = mysqli_num_rows($app_result);

                                        if($app_count >0){
                                            echo "<script>alert('Appointment Alrdey Scheduled')</script>";
                                        }
                                        else{

                                            if($count==0){

                                            $qry = "INSERT INTO `user`(`user_email`, `user_password`, `user_type`, `user_name`, `phone`) VALUES ('$email','$password','$user_type','$user_name','$phone') ";

                                            $exc = mysqli_query($con,$qry);
                                            $last_insertd_id = mysqli_insert_id($con);


                                            }

                                            // add data in appointmnet table
                                            $qry2 = "INSERT INTO `appoitments`(`fk_patient_id`, `fk_doctor_id`, `appoitment_time`, `message`) VALUES ('$last_insertd_id','$fk_doctor_id','$final_time','$message') ";
                                            $exc2 = mysqli_query($con,$qry2);

                                            if($exc2){
                                                echo "<script>alert('Appointment Scheduled.')</script>";
                                            }
                                            else{
                                                echo "<script>alert('Error...')</script>";

                                            }

                                        }

                                    }
                                
                                ?>
                            </div>
                        </div>

                    </div>
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