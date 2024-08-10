<?php
    include "./left_nav.php";
    if ($password_status == 0){
        header('Location:./changePassword.php');

    }
?>
<?php
    if(isset($_GET['appoitment_id'])){
        $appoitment_id = $_GET['appoitment_id'];

        $qry = "SELECT * from user u,appoitments ap
                WHERE ap.appoitment_id ='$appoitment_id'
                and u.user_type='Patient' ";
        $exc= mysqli_query($con,$qry);
        while($row = mysqli_fetch_array($exc)){
            $appoitment_id =$row['appoitment_id'];
            $appoitment_time=$row['appoitment_time'];
            $appoitment_status=$row['appoitment_status'];
            $message=$row['message'];
            $user_email=$row['user_email'];
            $user_name=$row['user_name'];
            $phone=$row['phone'];
            $user_status=$row['user_status'];


        }
    }
?>
    <div class="col-12 ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header h3">Appointment Details</div>
                            <div class="card-body">
                                
                                <div class="row ">
                                <table id="example" class="display table table-bordered col-12  border border-info" >
                                    <tr>
                                        <th colspan="3" class="bg-dark text-light text-center">Appointment Details</th>
                                    </tr>
                                    <tr>
                                        <th class=""> Appointment Id</th>
                                        <th>Appointment Status</th>
                                        <th>Appointment Time</th>
                                    </tr> 
                                    <tr>
                                        <td>PATIENT-<?php echo  $appoitment_id ?></td>
                                        <td><?php echo  $appoitment_status ?></td>
                                        <td><?php echo  $appoitment_time ?></td>
                                    </tr>

                                    <tr>
                                        <th colspan="3" class="bg-dark text-light text-center">Patient Details</th>
                                    </tr>
                                 
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Patient Email</th>
                                        <th>Patient Phone</th>
                                    </tr> 
                                    <tr>
                                        <td><?php echo  $user_name ?></td>
                                        <td><?php echo  $user_email ?></td>
                                        <td><?php echo  $phone ?></td>
                                    </tr>
                                  
                                    <tr colspan="">
                                        <th colspan="1" class="text-center bg-dark text-light"> Note for Doctor</th>
                                        <td colspan="2"> <?php echo  $message ?></td>
                                    </tr>

                                    <?php 
                                    
                                        if($appoitment_status == "Scheduled"){
                                            ?>

                                           
                                    <tr>
                                        <td></td>
                                        <td colspan="" class="text-center">
                                            <a href="./viewAppointmentDetails.php?appoitment_status=Accepted&appoitment_id=<?php echo $appoitment_id ?>" class="btn btn-success">Accept</a>
                                        </td>
                                        <td colspan="" class="text-center">
                                            <a href="./viewAppointmentDetails.php?appoitment_status=Cancelled&appoitment_id=<?php echo $appoitment_id ?>" class="btn btn-danger">Cancell</a>

                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </table>
                                </div>
                            </div>
                        </div>
                        <br>
                      
                       
                    </div>
                 
                </div>
    </div>

    <?php
    
            //acept app
            if(isset($_GET['appoitment_status'])){
                $appoitment_id = $_GET['appoitment_id'];
                $appoitment_status = $_GET['appoitment_status'];
                

                $patient_qry = "select * from appoitments ap,user u
                            where ap.fk_patient_id = u.user_id
                            and ap.appoitment_id='$appoitment_id'
                            ";
                 $patient_exc = mysqli_query($con,$patient_qry);

                 while( $patient_row =  mysqli_fetch_array($patient_exc))
                {
                    $patient_name = $patient_row['user_name'];
                    $patient_email = $patient_row['user_email'];
                    $appoitment_time = $patient_row['appoitment_time'];

                }


                $patient_qry = "select * from appoitments ap,user u
                            where ap.fk_doctor_id = u.user_id
                            and ap.appoitment_id='$appoitment_id'
                            ";
                 $patient_exc = mysqli_query($con,$patient_qry);

                 while( $patient_row =  mysqli_fetch_array($patient_exc))
                {
                    $doctor_name = $patient_row['user_name'];
                    // $patient_email = $patient_row['user_email'];
                    // $appoitment_time = $patient_row['appoitment_time'];

                }

                $qry = "UPDATE `appoitments` SET appoitment_status='$appoitment_status'  where appoitment_id='$appoitment_id'";
                $exc=mysqli_query($con,$qry);
                if($exc){

                    if($appoitment_status == "Accepted"){
                        $msg="Dear ".$patient_name.",<br/><br/> ";
                        $msg.="Your Appointment is <span style='color:green;'> Scheduled</span> at ".$appoitment_time." with Dr.".$doctor_name."<br/> <br/>";
                        $msg.="Please be on time for the same. For any queries please call clinic <b>8073383574</b>.<br/><br/> ";
                        $msg.="Regards,<br/>";
                        $msg.="<b>VISION CARE - Belgaum</b>";
                    }
                    else
                    {
                        $msg="Dear ".$patient_name.",<br/><br/> ";
                        $msg.="Your Appointment is <span style='color:red;'> Cancelled</span> at ".$appoitment_time." with Dr.".$doctor_name."<br/> <br/>";
                        $msg.="For any queries please call clinic <b>8073383574</b>.<br/><br/> ";
                        $msg.="Regards,<br/>";
                        $msg.="<b>VISION CARE - Belgaum</b>";
                    }
                    

                    phpmailsend($patient_email, 'VISION CARE - APPOINTMENT DETAILS', $msg);
                    echo "<script>alert('Appointment $appoitment_status')
                                    location = './viewAllAppointment.php'</script>";
                }

            }
    ?>
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
   
<?php 
    include "./footer.php";
?>