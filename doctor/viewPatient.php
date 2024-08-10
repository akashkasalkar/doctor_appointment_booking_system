<?php
    include "./left_nav.php";
    if ($password_status == 0){
        header('Location:./changePassword.php');

    }
?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.js"></script>

    <div class="col-12 ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header h3">Patient Details</div>
                            <div class="card-body">
                                
                                <div class="row">
                                <table id="example" class="display table table-bordered" style="width:100%">
                        <thead style="background-color: #17a2b8; color: #fff;">
                        <tr class="text-center">
                       
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Phone</th>
                            <th>Patient status</th>
                            <!-- <th>Action</th> -->
                           <!-- <th>Action</th> -->
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $qry = "SELECT * from user u,appoitments ap
                                WHERE ap.fk_doctor_id ='$doctor_id'
                                and u.user_id = ap.fk_patient_id
                                and u.user_type='Patient'   ";
                            $exc=mysqli_query($con,$qry);
                            while($row=mysqli_fetch_array($exc)){

                                if($row['user_status']==1){
                                    $status="<p class='text-success'>Active</p>";
                                }
                                else{
                                    $status="<p class='text-danger'>In Active<p>";

                                }
                                ?>
                            <tr class="text-center">
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['user_email'] ?></td>
                                <td><?php echo $row['phone'] ?></td>

                                <td><?php echo $status ?></td>

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