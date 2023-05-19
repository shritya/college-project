<?php
session_start(); //access to user informations through session variables
include "Partial/dpconnect.php"; // connection with database

// $sql = "Select * from users where role=1";
// $result = mysqli_query($conn, $sql); 
// $rows = mysqli_fetch_assoc($result); 
// $admin_pass = $rows['password'];

// $email = $_SESSION['email'];
// $ssql = "UPDATE `users` SET `password` = '$admin_pass' WHERE `users`.`email` = '$email'";
// $sresult = mysqli_query($conn, $ssql)

error_reporting(E_ERROR | E_PARSE);
?>
<?php $subject= $_SESSION['subject']; ?>



<!doctype html>
<html lang="en">
<?php
    include ("header.php");

?>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    </head>




<body>
    <!-- body  -->




    <?php
// Not loginned index page 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: login.php");
}   // Checks login  false
  
    





/////////// FOR ADMIN //////////

if ($_SESSION['role']==1) {
    header("location: admin/addsubjects.php");
}

?>




    <!-- Navbar -->
    
    <!--Sidebar Profile  -->
    <div class="main">
        <div class="">
            <!--  -->
            <!--  -->
            <!--  -->
            

            <!-- Rest bar  -->

            <div class="">

                <div class="card  contents">
                    <!-- Body -->






                    <div class="lp-child3">
                        <div class="card-header bg-secondary text-white">
                            Welcome! <?php echo $_SESSION['username'];  ?>
                        </div>
                        <div class="card-body bg-light">
                            <h4>General Instructions</h4>
                            <ol align="left">
                                <li>You are allowed to start the test whenever you want to. The timer would start only
                                    when you start the test. However remember that admin has full rights to disable the
                                    test at any time. So it is recommended to start the test at the prescribed time.
                                </li>
                                <li>To start the test, click on 'Enter Exam'.</li>
                                <li>You need a good internet connection and device for exam. </li>
                                <li>After login, you will not able to login again. </li>
                                <li>Once test start, you can't re-attempt the test.</li>
                                <li>Test will be automatically submited, after the given test time gets over.</li>
                                <li>Result will be displayed after test.</li>
                            </ol>
                            <hr>
                            <h4 align="left"><b> Exam Details:</b></h4>

                            <h5 class="card-title"><?php echo "<b>".$_SESSION['subject'];  ?>  | <?php echo $_SESSION['totalmark']." marks" ?> </b> -- <?php 
                    
                            if ($_SESSION['exam_time']<999) {
                                echo $_SESSION['exam_time']." mins";
                            }
                            else {
                                echo "No Time Limit";
                            }
                             
                            
                            ?></h5>
                            <p class="card-text">Questions will be of MCQ types. You have to finished the exam within
                                the given time. Click below to Start.
                            </p>

                                    <input type="button" value="Enter Exam" class="btn btn-success" onclick="set_exam_type_session('<?php echo $subject ?>');">
                                    <?php
                                
                            ?>
                            
                        </div>
                        <!-- <div class="card-footer bg-secondary text-white">
                            All the Best !!! 
                        </div> -->
                    </div>

  









                </div>

            </div>
        </div>
    </div>



   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    feather.replace()
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
         function set_exam_type_session(exam_subject)
         {
            var xmlhttp = new  XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    window.location="quiz.php";
                };
            };
            xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_subject="+exam_subject,true);  
            xmlhttp.send(null);
         }
    </script>
    <?php
        include("./footer.php");
    ?>
</body>

</html>
