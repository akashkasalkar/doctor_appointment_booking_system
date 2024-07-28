<?php include("./header.php"); ?>
<?php include("./sidebar.php"); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title h2">Pending Appoitment</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="border: none;">  <thead>
                  <tr class="text-center bg-dark">
                                        <th class="text-center">Appointment ID</th>
                                        <th class="text-center">Patient Name</th>
                                        <th class="text-center">Doctor Name</th>
                                        <th class="text-center">Patient Email</th>
                                        <th class="text-center">Patient Phone</th>
                                        <th class="text-center">Appointment Time</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $qry = "SELECT a.appoitment_id, u.user_name, u.user_email, u.phone, a.appoitment_time, a.appoitment_status, user.user_name AS doctor_name
                                    FROM appoitments a
                                    INNER JOIN user u ON a.fk_patient_id = u.user_id
                                    INNER JOIN user ON a.fk_doctor_id = user.user_id  -- Join with user table again for doctor info
                                    WHERE a.appoitment_status = 'Scheduled' ";
                                    $exc = mysqli_query($con, $qry);

                                    while ($row = mysqli_fetch_array($exc)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['appoitment_id']; ?></td>
                                            <td class="text-center"><?php echo $row['user_name']; ?></td>
                                            <td class="text-center"><?php echo $row['doctor_name']; ?></td>
                                            <td class="text-center"><?php echo $row['user_email']; ?></td>
                                            <td class="text-center"><?php echo $row['phone']; ?></td>
                                            <td class="text-center"><?php echo $row['appoitment_time']; ?></td>
                                            <td class="text-center"><?php echo $row['appoitment_status']; ?></td>
                                    
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
            </div>
          </div>

      </div></div>
  </div></div>


<?php include("./footer.php"); ?>
