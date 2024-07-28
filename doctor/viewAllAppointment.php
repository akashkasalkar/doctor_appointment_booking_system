<?php
    include "./left_nav.php";
?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.js"></script>
<div class="col-12">
    
    <a href="./viewAllAppointment.php" class="btn btn-primary">All Appointment</a>
    <a href="./pendingAppointments.php" class="btn btn-info">Scheduled Appointment</a>
    <a href="./acceptedAppointments.php" class="btn btn-success">Accepted Appointment</a>
    <a href="./rejectedAppointments.php" class="btn btn-danger">Cancelled Appointment</a>


   
</div>
    <div class="col-12 mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header h3">All Appointments</div>
                            <div class="card-body">
                                
                                <div class="row">
                                <table id="example" class="display table table-bordered" style="width:100%">
                        <thead style="background-color: #17a2b8; color: #fff;">
                        <tr>
                            <th>Appointment Code</th>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Appointment Date & Time</th>
                            <th>Appointment status</th>
                            <th>Action</th>
                           <!-- <th>Action</th> -->
                            
                        </tr>
                        </thead>
                        <tbody>
                      <?php
                    
                        $qry = "SELECT * from user u,appoitments ap
                                WHERE ap.fk_doctor_id ='$doctor_id'
                                and u.user_type='Patient'
                                and u.user_id = ap.fk_patient_id";
                        $exc = mysqli_query($con,$qry);
                        while($row = mysqli_fetch_array($exc)){
                      ?>
                        <tr>
                            <td><?php echo "PATIENT-".$row['user_id'] ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['user_email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['appoitment_time'] ?></td>
                            <td><?php echo $row['appoitment_status'] ?></td>
                            <td><a href="./viewAppointmentDetails.php?appoitment_id=<?php echo $row['appoitment_id'] ?>" class="btn btn-primary">View</a></td>
                          <!-- <td><a href="">View </a></td> -->
                        </tr> 
                        <?php
                        }
                        
                        ?>
                         
                            
                        </tbody>  
                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                      
                       
                    </div>
                 
                </div>
    </div>
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
   
<?php 
    include "./footer.php";
?>