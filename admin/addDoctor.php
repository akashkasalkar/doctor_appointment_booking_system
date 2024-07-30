<?php include_once('./header.php'); ?>

<?php include_once('./sidebar.php'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title h2">Add Doctor</h3>
              <a href="./viewDoctor.php" class="btn btn-dark float-right">View Doctor</a>
            </div>
            <div class="card-body">
            <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                     
                      <div class="form-group">
                        <label for="user_name">Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="xyz@gmail.com" required>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" name="add">Add</button>

                      </div>
                    
                  
                      </div>
                
                  </form>
            </div>
            </div>
          </div>
          <?php
                  if (isset($_POST['add'])) {
               
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                 
    
                    $user_type = "Doctor";
                    $user_password = "12345"; // You should handle password securely
                    

                    $alredy_user_exist_qry = "select * from user where user_email='$user_email'";
                    $result = mysqli_query($con, $alredy_user_exist_qry);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

                  
                    $count = mysqli_num_rows($result);

                    if($count > 0){
                      echo "<script>alert('Doctor Alredy Added.')</script>";
                    }
                  else{

                  

                    // Assuming $con is your database connection
                    $qry = "INSERT INTO user ( user_name, user_email, user_password, user_type) 
                    VALUES ( '$user_name',  '$user_email', '$user_password', '$user_type')";

                    if (mysqli_query($con, $qry)) {
                      $msg="Thank you for registering, ";
                      $msg.="login to VISION CARE <br/> ";
                      $msg.="Username : $user_email ";
                      $msg.="<br />Password : $user_password";
                      phpmailsend($user_email, 'Doctor registration', $msg);
                      echo "<script>
                        alert('Doctor Added');
                        window.location='./viewDoctor.php';
                      </script>";
                    } else {
                      echo "<script>alert('Error')</script>";
                    }
                  }
                  }
                  ?>
      </div></div>
  </div></div>
<?php include_once('./footer.php'); ?>
