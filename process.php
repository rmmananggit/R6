<?php
session_start();    
include("config.php");

if(isset($_POST["registerButton"])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $fname = $_POST['fname'];
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '' ;
    $lname = $_POST['lname'];

    $check_email_query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $email_result = mysqli_query($con,$check_email_query);
    $email_count = mysqli_fetch_array($email_result)[0];

    if($email_count > 0){
        $_SESSION['status'] = "Email address already taken";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }

    if ($password !== $repassword){
        $_SESSION['status'] = "Password does not match";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
        exit();
    }


    $query = "INSERT INTO `user`(`email`, `password`, `fname`, `mname`, `lname`) VALUES ('$email','$password','$fname','$mname','$lname')";
    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Registration Sucess!";
        $_SESSION['status_code'] = "success";
        header("Location: login.php");
        exit();
    }
}

if(isset($_POST["loginButton"])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT `id`, `email`, `password`, `fname`, `mname`, `lname` FROM `user` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1 ";
    $login_result = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_result) == 1){
            $_SESSION['status'] = "Welcome!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
    }else{
        $_SESSION['status'] = "Invalid Username/Password";
        $_SESSION['status_code'] = "error";
        header("Location: login.php");
        exit();
    }
}

// Start Register Student
if(isset($_POST["handleRegisterStudent"])){
    // Start importing Variables to contain data for database
        $studentID = $_POST['studentID'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
    // End importing Variables to contain data for database

    // Start check ID query if there is result
        $check_student_id = "SELECT * FROM `student` WHERE `studentID` = '$studentID'";
        $check_id_result = mysqli_query($con,$check_student_id);
        $id_count = mysqli_fetch_array($check_id_result)[0]; //if 0, then its unique. If not, error.
    // End check ID query if there is 
    
    // Start checking if there is existing studentID
        if($id_count > 0){
            $_SESSION['status'] = "ID already exist.";
            $_SESSION['status_code'] = "error";
            header("Location: insert.php");   
            // exit();
        };
    // End checking if there is existing studentID

    // Start insert data if $id_count == 0
        $query = "INSERT INTO `student`(`studentID`, `firstName`, `middleName`, `lastName`, `dateOfBirth`, `emailAddress`, `phoneNumber`) VALUES ('$studentID','$firstName','$middleName','$lastName','$dateOfBirth','$emailAddress','$phoneNumber')";
        $query_result = mysqli_query($con, $query);
    // End insert data if $id_count == 0

    // Start show registration complete
        if($query_result){
            $_SESSION['status'] = "Registration Success!";
            $_SESSION['status_code'] = "success";
            header('Location: insert.php');
            exit();
        }
    // End show registration complete

// End Register Student
}
// Start Update Function
    if (isset($_POST["handleUpdate"])) {
        // Start Importing 
            $studentID = $_POST['studentID'];
            $firstName = $_POST['firstName'];
            $middleName = $_POST['middleName'];
            $lastName = $_POST['lastName'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $emailAddress = $_POST['emailAddress'];
            $phoneNumber = $_POST['phoneNumber'];
        //  End Importing

        // Start Updating Query
            $update_query = "UPDATE `student` SET `firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`dateOfBirth`='$dateOfBirth',`emailAddress`='$emailAddress',`phoneNumber`='$phoneNumber' WHERE `studentID` = '$studentID'";
        // End Updating Query

        // Start show result of update
            $update_result = mysqli_query($con, $update_query);
        // End show result of Update

        // Start IF statement if success or fail
            if($update_result){
                $_SESSION['status'] = "Update Successful";
                $_SESSION['status_code'] = "success";
                header('Location: index.php');
                exit();
            }else{
                $_SESSION['status'] = "Error updating record: ";
                $_SESSION['status_code'] = "error";
                header('Location: update.php');
                exit();
            }
        // End IF statement if success or fail
    }
// End Update Function 

// Start handleDelete 
    if(isset($_POST["handleDelete"])) {

        // Start Importing
            $studentID = $_POST['studentID'];
            $firstName = $_POST['firstName'];
            $middleName = $_POST['middleName'];
            $lastName = $_POST['lastName'];
        // End Importing

        // Start backup deleted student data
            $backup_deleted_student = "INSERT INTO `deleted_student`( `studentID`, `firstName`, `middleName`, `lastName`) VALUES ('$studentID','$firstName','$middleName','$lastName')";

            // Start fetching result
                $backup_deleted_student_result = mysqli_query($con, $backup_deleted_student);
            // End fetching result

        // End back up deleted student data

        // Start delete query from students
            $delete_student_query = "DELETE FROM `student` WHERE `studentID` = '$studentID'";

            // Start fetching result of deleted student
                $delete_student_query_result = mysqli_query($con, $delete_student_query);
            // End fetching result of deleted student

        // End delete query from student

        // Start confirming if there is error
            // Start IF(success)
                if($backup_deleted_student_result && $delete_student_query_result){
                    $_SESSION ['status'] = "Back up and deleting is secured!";
                    $_SESSION ['status_code'] = "success";
                    header('Location: index.php');
                    exit();
                }
            // End IF(success)
            
            // Start IF(fail)
                else{
                    $_SESSION['status'] = "Error";
                    $_SESSION['status_code'] = "error";
                    header('Location: index.php');
                    exit();
                }
                // End IF(fail)
        // End confirming if there is error
    }
// End handleDelete
?>