 <!doctype html>

<?php
session_start();
ob_start();
?>
<html lang="en" style="height: 100%;">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>pGen- Faculty Login</title>
</head>
<body style="min-height: 100%; display: flex; flex-direction: column;">
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">pGen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="questionPaper.php">Home</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" aria-current="page" href="flogin.php">Login</a>
          </li>
        </ul>
        
        
      </div>
    </div>
  </nav>

  <div style="margin-bottom: 40px; margin-top: 10px ">
  <form method="post">
    <center> <h1> Faculty Login</h1> </center>
    <div class="container-md col-md-6 border border-primary rounded-3">
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Email Id:</p>
        <input type="email" name="txt-email" class="form-control" id="txt-email" placeholder="Enter Email Id" required title="Enter valid email address">
      </div>
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Password:</p>
        <input type="password" name="txt-pass" class="form-control" id="txt-pass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one uppercase, one lowercase letter, one number, and at least 8 or more characters" required minlength="8">
      </div>
    <center>
        <button class="btn btn-primary btn-lg" style="margin-top:20px; margin-bottom: 10px;" type="submit" name="btn-login">Login</button>
      </center>
      <center>
        <a href="http://localhost/pgen/admin/alogin.php" style="margin-top:10px; margin-bottom: 10px;" class="btn btn-outline-secondary" tabindex="-1" role="button">Admin Login?</a>
      </center>
      <center>
        <a href="http://localhost/pgen/student/slogin.php" style="margin-top:10px; margin-bottom: 10px;" class="btn btn-outline-secondary" tabindex="-1" role="button">Student Login?</a>
      </center>
    </div>
  </form>
</div>
  <footer class="bg-dark py-5" style="margin-top: auto;">
    <div class="container">
      <div class="small text-center text-muted">Copyright © 2021 - pGen</div>
    </div>
  </footer>


 

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->

<?php
  $c=mysqli_connect("localhost","root","");
      if($c)
      {
          mysqli_select_db($c,"pgen");
          
          if(isset($_POST["btn-login"]))
          {

          $email=$_POST['txt-email'];  
          $pass=MD5($_POST['txt-pass']);

          $qry="select * from tblfaculty where facultyEmail='$email' AND facultyPssword='$pass'";
          
          $log1=mysqli_query($c,$qry);
          if($row=mysqli_fetch_assoc($log1))
          {   
            $f=$row['facultyFname'];
            $_SESSION['facultyFname']=$f;
    
            $e=$row['facultyEmail'];
            $_SESSION['facultyEmail']=$e;
    
    
            echo"<script>alert('successfully Login');</script>";
            header("Location: http://localhost/pgen/faculty/questionPaper.php"); 
            ob_end_flush();
          }
          else
          {
            echo mysqli_error($c);
            echo"<script>alert('Login Failed enter valid email and password');</script>";
          }  
      }

}
else
{
   echo mysqli_error($c);
           
} 
?>


</body>

</html>