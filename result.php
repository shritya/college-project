<?php
session_start(); //access to user informations through session variables
include "Partial/dpconnect.php"; // connection with database
error_reporting(E_ERROR | E_PARSE);
$_SESSION['testStatus']=true;
$username=$_SESSION['username']; 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {  // for not login
    header("location: login.php");
} 
?>



<?php
    include ("header.php");

?>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    </head>

<style>
body {
    /* background-color: rgb(209, 203, 255); */

}


</style>

<body>









    <!-- body  -->


    <!-- Navbar -->
   
    <!--Sidebar Profile  -->
    <div class="contents">
        <!-- <div class="row"> -->

            <!-- Rest bar  -->

            <!-- <div class="col-md-4 mt-1"> -->
<!-- <div class="rcard"> -->
                <!-- <div class="card mb-1"> -->
                    <!-- Body -->





                    <?php
$quiz_subject_id = $_SESSION['quiz_subject_id'];
$sid = $_SESSION['sid'];
$email = $_SESSION['email'];
$subject = $_SESSION['subject'];
$totalmark = $_SESSION['totalmark'];
$zsql = "SELECT * FROM `quiz_questions` WHERE `quiz_subject_id` = '$quiz_subject_id'";
$zresult = mysqli_query($conn, $zsql);
$totalquestion=mysqli_num_rows($zresult);
$i=1;

$correct= 0;
$wrong = 0;
?>
                    <div class="lp-child4">
                        <div class="login-heading-one">
                            Result 
                        </div>
                        <div class="">
                            <h4><?php echo $_SESSION['subject'] ?></h4>
                            <?php
                                $sql = "SELECT * FROM `quiz_questions` WHERE `qno` = '$queno' AND `quiz_subject_id` = '$quiz_subject_id'";
                                $result = mysqli_query($conn, $sql);
                                while ($i<=$totalquestion) {
                                    $selected_answer = $_SESSION["answer"][$i];
                                    $sql = "SELECT * FROM `quiz_questions` WHERE `qno` = '$i' AND `quiz_subject_id` = '$quiz_subject_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    $correct_answer = $row['answer'];
                                    $qid = $row['qid'];
                                    $question = $row['question'];
                                    if ($_SESSION['testStatus']!=false) {
                                        echo $correct_answer;
                                        $vsql = "INSERT INTO `view` (`vno`, `email`, `sid`, `quiz_subject_id`, `subject`, `qid`, `question`, `answer`, `selected_option`) VALUES (NULL, '$email', '$sid', '$quiz_subject_id', '$subject', '$qid', '$question', '$correct_answer', '$selected_answer')";
                                        $vresult = mysqli_query($conn, $vsql);
                                    }
                                    
                                    if ($selected_answer==$correct_answer) {
                                        $correct++;
                                    }
                                    
                                    $i++;
                                    
                                }
                                ?>

                            <h5>
                                <?php
$wrong=$totalquestion-$correct;
echo "
<hr>
<center>
Total Questions = ".$totalquestion." <br>
Correct Answers = ".$correct." <br>
Wrong Answers = ".$wrong." <br>
</h5>
<hr>
<h4>
<u>
Marks Obtained </u> = ".($totalmark/$totalquestion)* $correct." / ".$totalmark." <br>

<h4>
</center>
<hr>

";
$class_id=$_SESSION['class_id'];
if ($_SESSION['testStatus']!=false) {
    $rsql = "INSERT INTO `results` (`rid`,`student_name`, `email`, `class_id`, `sid`, `quiz_subject_id`, `subject`, `total_question`, `correct_answer`, `wrong_answer`, `subject_marks`) VALUES (NULL, '$username', '$email', '$class_id', '$sid', '$quiz_subject_id', '$subject', '$totalquestion', '$correct', '$wrong', '$totalmark');";
    $rresult = mysqli_query($conn, $rsql);
}
$_SESSION['testStatus']=false;
?>

                                <button class="btn btn-outline-success" type='submit' data-bs-toggle='modal'
                                    data-bs-target='#modal'> View Questions</button>
                                <a href="./index.php">
                                    <button class="btn btn-warning" type="submit"> Re-Attempt</button>
                                </a>

                        </div>
                        <div class="login-heading-one">
                            Thank You !!!
                        </div>
                    </div>











                </div>
                <!-- </div> -->

            <!-- </div> -->

        <!-- </div> -->
    </div>
    </center>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->





    <!-- modal  -->

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalLabel">View Questions</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php
                $qsql = "SELECT * FROM `quiz_questions` WHERE `quiz_questions`.`quiz_subject_id` = '$quiz_subject_id'";
                $qresult = mysqli_query($conn, $qsql);

                while($qrow = mysqli_fetch_assoc($qresult)){
?>

                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <?php 
                            $question = $qrow['question'];
                            $display_question = str_replace("\n","<br>",$question);
                            echo "Q.".$qrow['qno']."] ".$display_question.".";  
                            ?>
                        </div>
                        <div class="card-body bg-light">
                            <ol>
                                <li>
                                    <?php

                            
$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}


if (strpos($qrow['option1'],'opt_images/')!== false) {
    $option1 = '<img src="admin/'.$qrow['option1'].'" width="50" height="50" >';

}else {
  $option1 = $qrow['option1'];
}



if ($sel_opt=='option1' && $qrow['answer']!='option1') {
    echo "<div class='text-danger'><b>".$option1."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option1') {
    echo "<div class='text-success'><b>".$option1."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option1;
}

?>
                                </li>

                                <li>
                                    <?php

                            
                                        $qid = $qrow['qid'];
                                        $vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
                                        $vresult = mysqli_query($conn, $vsql);
                                        while ($vrow = mysqli_fetch_assoc($vresult)) {
                                            $sel_opt = $vrow['selected_option'];
                                        }

                                        if (strpos($qrow['option2'],'opt_images/')!== false) {
                                            $option2 = '<img src="admin/'.$qrow['option2'].'" width="50" height="50" >';
                                        
                                        }else {
                                          $option2 = $qrow['option2'];
                                        }
                                        
                                        if ($sel_opt=='option2' && $qrow['answer']!='option2') {
                                            echo "<div class='text-danger'><b>".$option2."&nbsp;"."<i data-feather='x'></i></b></div>";
                                        }
                                        else if ($qrow['answer']=='option2') {
                                            echo "<div class='text-success'><b>".$option2."&nbsp;"."<i data-feather='check'></i></b></div>";
                                        }
                                        else {
                                            echo $option2;
                                        }

                                ?>
                                </li>

                                <li>
                                    <?php

                            
$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}

if (strpos($qrow['option3'],'opt_images/')!== false) {
    $option3 = '<img src="admin/'.$qrow['option3'].'" width="50" height="50" >';

}else {
  $option3 = $qrow['option3'];
}

if ($sel_opt=='option3' && $qrow['answer']!='option3') {
    echo "<div class='text-danger'><b>".$option3."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option3') {
    echo "<div class='text-success'><b>".$option3."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option3;
}

?>
                                </li>

                                <li>
                                    <?php

                            
$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}

if (strpos($qrow['option4'],'opt_images/')!== false) {
    $option4 = '<img src="admin/'.$qrow['option4'].'" width="50" height="50" >';

}else {
  $option4 = $qrow['option4'];
}
if ($sel_opt=='option4' && $qrow['answer']!='option4') {
    echo "<div class='text-danger'><b>".$option4."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option4') {
    echo "<div class='text-success'><b>".$option4."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option4;
}

?>
                                </li>


                            </ol>
                            <?php
                                $vresult = mysqli_query($conn, $vsql);
                    while ($vrow = mysqli_fetch_assoc($vresult)) {
                        $sel_opt = $vrow['selected_option'];
                    }
                    if ($sel_opt == "") {
                        echo "<div class='text-danger'><b><i data-feather='slash'></i> [Not Attempted]</b></div>";
                    }
                    ?>
                        </div>
                        <div class="card-footer bg-light">
                            <b>For: </b> <?php 
                            echo $totalmark/$totalquestion." Marks";  
                            ?>
                        </div>
                    </div>
                    <br>








                    <?php
                    
                }

                $_SESSION['testStatus']=false;

?>


                </div>
            </div>
        </div>
    </div>

    <script>
    feather.replace()
    </script>

                <?php include("footer.php"); ?>
</body>

</html>