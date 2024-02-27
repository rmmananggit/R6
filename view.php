<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="text-center">Update Student Data</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $users = "SELECT * FROM `student` WHERE `id` = '$id'";
                $user_result = mysqli_query($con, $users);

                if(mysqli_num_rows($user_result) > 0 )
                {
                    foreach($user_result as $user)
                    {
        ?>
                <form action="update.php" method="POST">

                <input type="hidden" name="id" value="<?=$user['id'];?>">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="studentId" class="form-label">Student I.D</label>
                        <input type="text" class="form-control" id="studentId" value="<?=$user['studentID'];?>" name="studentID" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" value="<?=$user['firstName'];?>" name="firstName" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" value="<?=$user['middleName'];?>" name="middleName" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" value="<?=$user['lastName'];?>" name="lastName" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dateOfBirth" value="<?=$user['dateOfBirth'];?>" name="dateOfBirth" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" value="<?=$user['emailAddress'];?>" name="email" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" value="<?=$user['phoneNumber'];?>" name="phoneNumber" readonly>
                    </div>

                    <div class="col-md-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary"  style="float: right;" name="submit">Submit</button>
                    </div>
                    <div class="col-md-12 mb-3 text-center">
                        <a class="btn btn-primary" href="index.php" style="float: right;" ">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
                }
            }
            else
            {
                ?>
                <h4>No Record Found!</h4>
                <?php
            }
        }
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


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















<!-- <?php session_start();
    include ("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/view.css">
</head>
<body>
    <?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $users = "SELECT * FROM `student` WHERE `id` = '$id'";
        $users_run = mysqli_query($con, $users);
        if(mysqli_num_rows($users_run) > 0)
        {
            foreach($users_run as $user)
            {
    ?>
        <nav class="navigation-bar">
            <a href="index.php">Home</a>
            <a>></a>
            <a>Student Profile</a>
        </nav>
        <div class="left-container" style="width: 20%">
            
        </div>
        <div class="center-container" style="width: 60%;">
            <h1>
                <?php echo 'Student ID: ' . $user['studentID']; ?>
            </h1>
            <div class="information">
                <h1>
                    <?php echo $user['firstName']; ?>
                </h1>
                <h1>
                    <?php echo $user['middleName']; ?>
                </h1>
                <h1>
                    <?php echo $user['lastName']; ?>
                </h1>
                <h1>
                    <?php echo $user['firstName']; ?>
                </h1>
            </div>
            
        </div>
        <div class="right-container">

        </div>
    <?php
            }
        }
    }
    ?>

</body>


</html> -->