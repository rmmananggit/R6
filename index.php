<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

<div class="container-fluid mt-4">
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Information</h5>

              <a href="insert.php" style="float: right;" class="btn btn-primary">Add Student</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">

                <!-- Start display label -->
                  <thead>
                    <tr>
                      <th class="col">Name</th>
                      <th class="col">Student ID</th>
                      <th class="col">Email</th>
                      <th class="col">Birthday</th>
                      <th class="col">Phone Number</th>
                      <!-- <th class="col">Address</th> -->
                      <th class="col">Action</th>
                    </tr>
                  </thead>
                <!-- End display label -->

                <tbody>

                  <!-- Start initializing data in student table in database R6_activity -->
                    <?php
                      $query = "SELECT * FROM `student`";
                      $query_run = mysqli_query($con, $query);
                      if(mysqli_num_rows($query_run) > 0)
                      {
                        foreach($query_run as $row)
                      {
                    ?>
                  <!-- End initializing data in student table in database R6_activity -->

                  <!-- Start display in student Information using table row-->
                  <tr>

                    <!-- Start display of data in student table using table data  -->
                      <td><b><?= $row['firstName']; ?> <?= $row['middleName']; ?> <?= $row['lastName']; ?></b></td>
                      <td><?= $row['studentID']; ?></td>
                      <td><?= $row['emailAddress']; ?></td>
                      <td><?= $row['dateOfBirth']; ?></td>
                      <td><?= $row['phoneNumber']; ?></td>
                    <!-- End display of data in student table using table data -->

                    <!-- Start: I dont know the purpose of address not unless given in the instruction -->
                      <!-- <td><?= $row['address']; ?></td> -->
                    <!-- End: I dont know the purpose of address not unless given in the instruction -->
                    <td class="action">
                      <a type="button" class="btn btn-outline-primary feature" href="view.php?id=<?=$row['id'];?>">VIEW</a>
                      <a type="button" class="btn btn-outline-warning feature" href="update.php?id=<?=$row['id'];?>">UPDATE</a>

                      <!-- Start delete button -->
                        <form action="process.php" method="POST">
          
                          <!-- Start exporting data to handle delete -->
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="studentID" value="<?= $row['studentID']; ?>">
                            <input type="hidden" name="lastName" value="<?= $row['lastName']; ?>">
                            <input type="hidden" name="firstName" value="<?= $row['firstName']; ?>">
                          <!-- End exporting data to handle delete -->

                          <button type="submit" class="btn btn-outline-danger feature" name="handleDelete">DELETE</button>
                        </form>
                      <!-- End delete button -->

                    </td>
                  </tr>
                  <!-- End display in student Information using table row-->
                  
                  <?php
                    } 
                    } else
                    {
                      ?>
                      <tr>
                      <td colspan="6">No Record Found</td>
                      </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script> 
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
}
?>
  </body>
</html>