<!-- Start allowing to use config.php and the database to use -->
    <?php session_start();
        include ("config.php");
    ?>
<!-- End allowing to use config.php and the database to use -->

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
    <link rel="stylesheet" href="./css/stylenav.css">
</head>
<body>

<h1 class="text-center">Insert Student Data</h1>
<nav class="navigation">
    <a href="index.php">Home</a>
    <h6>
        >
    </h6>
    <a>Insert</a>
</nav>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <form action="process.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="studentId" class="form-label">Student I.D</label>
                        <input type="text" class="form-control" id="studentId" name="studentID">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middleName">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="emailAddress">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Phone Number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="Phone Number" name="phoneNumber">
                    </div>

                    <div class="col-md-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary"  style="float: right;" name="handleRegisterStudent">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
