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
                            <div class="card-header h3"> Profile</div>
                            <div class="card-body">
                                
                              
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $dr_email ?>" name="email" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $dr_name ?>" name="name" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" value="<?php echo $dr_phone ?>" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control" id="" required value="<?php echo $dr_address ?>"><?php echo $dr_address ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" name="update">Update</button>
                                    </div>
                                </form>
                         
                            </div>
                        </div>
                        <br>
                      
                       <?php 
                            if(isset($_POST['update'])){
                                $dr_name=$_POST['name'];
                                $dr_phone=$_POST['phone'];
                                $dr_address=$_POST['address'];
                                $dr_email=$_POST['email'];

                                $qry="UPDATE `user` SET user_name='$dr_name',phone='$dr_phone',address='$dr_address' where user_email='$dr_email' ";

                                $exc=mysqli_query($con,$qry);
                                if($exc){
                                    echo "<script>alert('Profile Updated.')
                                                location=location</script>";
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