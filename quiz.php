<?php
session_start(); //access to user informations through session variables
include "Partial/dpconnect.php"; // connection with database
error_reporting(E_ERROR | E_PARSE);

?>

<?php
// Not loginned index page 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {  
    header("location: login.php");
} // Checks login  false
  ?>

<!doctype html>
<html lang="en">




<?php
    // include ("header.php");

?>
 <head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./quiz.css">

    </head>












<body>

    <?php
if (isset($_POST['choose'])) {
    $choose = $_POST['choose'];
    echo $choose;

}


?>



    <!-- body  -->




    <!-- Navbar -->
   
    <!--Sidebar Profile  -->


    <section class="navapurte">
    <div class="content2">


    <div class="quiz_box">
        <header>
            <div class="title">Subject : <?php echo $_SESSION['subject'];  ?></div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <?php
                if ($_SESSION['exam_time']<999) {
                    ?>
<div id="countdowntimer" class="timer_sec">00:00:00</div>
                    <?php
                }
                else {
                    ?>
                    <div class="timer_sec"><i data-feather="pause"></i></div>
                    <?php
                }
                ?>
                
            </div>
        </header>

        <section>
            <div id="load_questions"></div>
        </section>

        <footer>
            <div class="total_que">
            <span>
                <p><div id="current_que">0</div></p>
                of
                <p><div id="total_que">0</div></p>
                Questions
            </span>
            </div>
            
            <input class="next_btn" type="button" value="Next" onclick="load_next();">

        </footer>
    </div>

    </section>












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
        setInterval(function() {
            timer();
        }, 1000);

        function timer() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "00:00:01") {
                        window.location = "result.php";
                    }
                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "forajax/load_timer.php", true);
            xmlhttp.send(null);
        }
        </script>


        <script type="text/javascript">
        function load_total_que() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                };
            };
            xmlhttp.open("GET", "forajax/load_total_que.php", true);
            xmlhttp.send(null);
        }

        var questionno = "1";
        load_questions(questionno);

        function load_questions(questionno) {
            document.getElementById("current_que").innerHTML = questionno;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "over") {
                        window.location = "result.php";
                    } else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }

                };
            };
            xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
            xmlhttp.send(null);
        }

        function radioclick(radiovalue, questionno) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                };
            };
            xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue,
                true);
            xmlhttp.send(null);
        }


        function load_previous() {
            if (questionno == "1") {
                load_questions(questionno);
            } else {
                questionno = eval(questionno) - 1;
                load_questions(questionno);
            }
        }

        function load_next() {
            questionno = eval(questionno) + 1;
            load_questions(questionno);
        }
        </script>
</body>

</html>