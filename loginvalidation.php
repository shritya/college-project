<?php
$login= false;       //stores the login status
$showError= false;    // store the errors while filling the form


// checks the valid login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Partial/dpconnect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "Select * from users where email='$email'";

    $result = mysqli_query($conn, $sql); 
    $rows = mysqli_fetch_assoc($result);  // Fetching data from Database 

    $username = $rows["username"];         //storing required infos
    $subject = $rows["test"];
    $class_id = $rows["class_id"];
    $quiz_subject_id = $rows["quiz_subject_id"];
    $testStatus = $rows["testStatus"];
    $role= $rows["role"];


    $ssql = "SELECT * FROM `quiz_subjects` WHERE `quiz_subject_id` = '$quiz_subject_id'";
    $sresult = mysqli_query($conn, $ssql); 
    $srows = mysqli_fetch_assoc($sresult); 
    $totalquestion = $srows['quiz_total_questions']; 
    $totalmark = $srows['quiz_total_marks']; 
    $exam_time= $srows['quiz_exam_time']; 
    $sid = $srows['sid']; 
    
    //checks the user exit in the database or not
    $num = mysqli_num_rows($result); 
    if ($num == 1 && $password == $rows['password']) {
        $login= true;
        // assigning data to session variables
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['subject']=$subject;
        $_SESSION['testStatus']=$testStatus;
        $_SESSION['password']=$password;
        $_SESSION['role']=$role;
        $_SESSION['sid']=$sid;
        $_SESSION['totalquestion']=$totalquestion;
        $_SESSION['totalmark']=$totalmark;
        $_SESSION['exam_time']=$exam_time;
        $_SESSION['quiz_subject_id']=$quiz_subject_id;
        $_SESSION['class_id']=$class_id;

        header("location: exam.php");   // redirect to home page after successfull login.
    }
    else {
        $showError = "Invalid Input";    // Error after unsuccessfull login
    }
}



error_reporting(E_ERROR | E_PARSE);
?>
