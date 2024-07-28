<?php
include_once('./header.php');
include_once('./sidebar.php');
$stmt = $con->prepare("SELECT clinic_name, clinic_address, clinic_phone FROM clinic");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $clinicName = $row["clinic_name"];
    $clinicAddress = $row["clinic_address"];
    $clinicPhone = $row["clinic_phone"];
} else {
    echo "No clinic data found.";
}

$stmt->close();
$con->close();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-12">
        
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title ">Clinic Details</h3>
        

          </div>
          <!-- /.card-header -->
          <div class="card-body">
         
            <table class="table table-bordered">
              
              <tr>
                <th colspan="3" class="text-center text-danger h3">Clinic Details</th>
              </tr>
            
              <tr>
                <th>Clinic Name</th>
                <td><?php echo $clinicName; ?></td>
                
              </tr>
              <tr>
                <th>Address</th>
                <td><?php echo $clinicAddress; ?></td>
              </tr>
              <tr>
             
                <th>Clinic Phone</th>
                <td><?php echo $clinicPhone; ?></td>

              </tr>

            </table>
        
         
          
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      

      </div><!-- /.container-fluid -->
     
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php include_once('./footer.php');?>

 