<?php
    include "./left_nav.php";

    if ($password_status == 0){
        header('Location:./changePassword.php');

    }
?>
    <div class="col-12">
                <div class="row">

                    <div class="col-5 border border-dark bg-dark text-light m-2 p-3 offset-1">
                        <p class="display-4">
                             Patients

                             <?php 
                             $user_total=0;
                             $user_slot_query="SELECT * from user u,appoitments ap
                                WHERE ap.fk_doctor_id ='$doctor_id'
                                and u.user_id = ap.fk_patient_id
                                and u.user_type='Patient'";
                             $user_slot_query_run=mysqli_query($con,$user_slot_query);
                             $user_total=mysqli_num_rows($user_slot_query_run)
                             ?>
                            <span class="float-right display-1"><?php echo $user_total ?></span>
                        </p>
                        
                    </div>

                    <div class="col-5 border border-dark bg-info text-light m-2 p-3 offset-1">
                        <p class="display-4">
                             Appointments
                             <?php 
                             $user_total=0;
                             $user_slot_query="SELECT * from appoitments ap
                                WHERE ap.fk_doctor_id ='$doctor_id'
                                ";
                             $user_slot_query_run=mysqli_query($con,$user_slot_query);
                             $user_total=mysqli_num_rows($user_slot_query_run)
                             ?>
                            <span class="float-right display-1"><?php echo $user_total ?></span>
                        </p>
                        
                    </div>
                 
                </div>
            </div>

<?php 
    include "./footer.php";
?>