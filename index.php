

<?php
    include ("loginvalidation.php");
    include ("header.php");

?>

    <head>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <section class="navapurte">

  <div class="content">
  <!-- <div class="tableform">  -->
  <form  action="login.php" method="post">
    <section class="lp-child">
          <h3 class="login-heading-one">
            User Login
          </h3>
          <div class="lp-child-one">
        <!-- <i class="fas fa-user-circle"></i> -->
        <!-- <h2>Login</h2> -->
                <input class="greys-txt" type="email" id="email" name="email" aria-describedby="email" placeholder="Email" required>
                <!-- <h4 class="grey-txt-one">+91</h4> -->
                <!-- <input class="grey-txt" type="text" name="username" id="" placeholder="User Name" fdprocessedid="z9tmvf"> -->
            </div>
            <input class="greys-txt" type="password" id="password" name="password" placeholder="Password" required>
            <!-- <input class="greys-txt" type="password" name="password" id="" placeholder="Enter Password" fdprocessedid="s0r3hn"> -->
            <button type="submit" >Login</button>
            <!-- <button type="submit" value="Login" onclick="return adminvalidate()" fdprocessedid="rv935"> Login</button> -->
        </section>
    </form>
    <!-- </div> -->
      <!-- </div> -->
      <section class="lp-child1">
         <h3 class="login-heading-one" style="margin: 0;">
           Notice
         </h3>
         <marquee onmouseover="stop()" onmouseout="start()" style="height: 250px;" behavior="scroll" scrollamount="2" direction="up">

            <p style="margin: 0;"><span style="font-weight: 600; font-size: 25px;">1.</span> A multiple-choice question (MCQ) is composed of two parts: a stem that identifies the question or problem, and a set of alternatives or possible answers that contain a key that is the best answer to the question, and a number of distractors that are plausible but incorrect answers to the question.</p>
            <br>
            <p style="margin: 0;"><span style="font-weight: 600; font-size: 25px;">2.</span> A multiple-choice question (MCQ) is composed of two parts: a stem that identifies the question or problem, and a set of alternatives or possible answers that contain a key that is the best answer to the question, and a number of distractors that are plausible but incorrect answers to the question.</p>
            <br>
            <p style="margin: 0;"><span style="font-weight: 600; font-size: 25px;">3.</span> A multiple-choice question (MCQ) is composed of two parts: a stem that identifies the question or problem, and a set of alternatives or possible answers that contain a key that is the best answer to the question, and a number of distractors that are plausible but incorrect answers to the question.</p>
            
         </marquee>
       </section>
   </div>
</section>












    
    <!--Login Form -->




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
    <?php
        include("footer.php");
    ?>
</body>

</html>
