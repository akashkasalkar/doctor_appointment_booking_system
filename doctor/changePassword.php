<?php
    include "./left_nav.php";
?>

    <div class="col-12 ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header h3"> Change Password</div>
                            <div class="card-body">
                                
                              
                                <form action="" method="post">
                                   
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" class="form-control"  name="old_pass" placeholder="*****" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control"  name="new_pass" placeholder="*****" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" class="form-control"  name="confirm_pass" placeholder="*****" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" name="update">Change Password</button>
                                    </div>
                                </form>
                         
                            </div>
                        </div>
                        <br>
                      
                       <?php 
                            if(isset($_POST['update'])){
                                 $old_pass=$_POST['old_pass'];
                                $new_pass=$_POST['new_pass'];
                                $confirm_pass=$_POST['confirm_pass'];

                                 $qry = "select * from user where user_id = '$doctor_id' and user_password='$old_pass'";
                                $exc=mysqli_query($con,$qry);
                                 
						         $count = mysqli_num_rows($exc); 
                                if($count == 0){
                                    echo "<script>alert('Incorrect Old password.')
                                    location=location</script>";
                                                
                                }

                                if($new_pass != $confirm_pass){
                                    echo "<script>alert('Incorrect new and confirm password.')
                                    location=location</script>";
                                }
                              

                                $qry="UPDATE `user` SET user_password='$new_pass',	pass_change_status='1' where user_email='$dr_email' ";

                               $exc= mysqli_query($con,$qry);
                               if($exc){
                                echo "<script>alert('Password Changed.')
                                    location='./logout.php'</script>";
                               }



                            }
                       ?>
                    </div>
                 
                </div>
    </div>

    <?php
    
            //acept app
            if(isset($_GET['appoitment_status'])){
                $appoitment_id = $_GET['appoitment_id'];
                $appoitment_status = $_GET['appoitment_status'];

                $qry = "UPDATE `appoitments` SET appoitment_status='$appoitment_status'  where appoitment_id='$appoitment_id'";
                $exc=mysqli_query($con,$qry);
                if($exc){
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