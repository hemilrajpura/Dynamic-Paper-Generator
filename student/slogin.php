 <!doctype html>

 <?php
 

  require "configuration.php";

  $login_button = '';
  
  if(isset($_GET["code"]))
  {
    $token =  $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token["error"]))
    {
      $google_client->setAccessToken($token["access_token"]);

      $_SESSION["access_token"]  = $token["access_token"];

      $google_service = new Google_Service_Oauth2($google_client);

      $data = $google_service->userinfo->get();
      
      if(!empty($data['given_name']))
      {
        $_SESSION['given_name'] = $data['given_name'];
      }
      if(!empty($data['family_name']))
      {
        $_SESSION['family_name'] = $data['family_name'];
      }
      if(!empty($data['email']))
      {
        $_SESSION['email'] = $data['email'];
      }
      if(!empty($data['gender']))
      {
        $_SESSION['gender'] = $data['gender'];
      }
      if(!empty($data['picture']))
      {
        $_SESSION['image'] = $data['picture'];
      }


      $c=mysqli_connect("localhost","root","");
			if($c)
			{
					mysqli_select_db($c,"pgen");
					
					

            $email=$_SESSION['email'];  
            $fname=$_SESSION['given_name'];
            $lname=$_SESSION['family_name'];
            $cDate=date("Y-m-d");

            
            $ins= "insert into tblstudent(createdDate,studentFname,studentLname,studentEmail) values('$cDate','$fname','$lname','$email')";
            
           

						if(mysqli_query($c,$ins))
						{
              echo'<script>alert("Data inserted")</script>';
						//header("location:http://localhost/pakhi-web/web/addchapters.php"); 
						 // window.alert("success");
						}
						else
						{
              //echo mysqli_error($c);
							
						}
          
					
			}
	
		   else
			{
				echo "n";
			}
		
		
		
		
	mysqli_close($c);
    }
  }
  

if(!isset($_SESSION['access_token']))
{
  $login_button = "<a href=".$google_client->createAuthUrl()."></a>"
  
 ?>
<html lang="en" style="height: 100%;">
<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>pGen- Student Login</title>
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
            <a class="nav-link" aria-current="page" href="home.php">Home</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" aria-current="page" href="slogin.php">Login</a>
          </li>
        </ul>
        
        
      </div>
    </div>
  </nav>

  <div style="margin-bottom: 40px; margin-top: 10px ">
  <form method="post">
    <center> <h1> Student Login</h1> </center>
    <div class="container-md col-md-6 border border-primary rounded-3">
      
    <center>
        <a class="btn btn-primary btn-lg" href="<?php echo $google_client->createAuthUrl(); ?>" style="margin-top:20px; margin-bottom: 10px;" type="submit" name="btn-login">Login with google</a>
      </center>
      <center>
        <a href="http://localhost/pgen/admin/alogin.php" style="margin-top:10px; margin-bottom: 10px;" class="btn btn-outline-secondary" tabindex="-1" role="button">Admin Login?</a>
      </center>
      <center>
        <a href="http://localhost/pgen/faculty/flogin.php" style="margin-top:10px; margin-bottom: 10px;" class="btn btn-outline-secondary" tabindex="-1" role="button">Faculty Login?</a>
      </center>
    </div>
  </form>
</div>
  <footer class="bg-dark py-5" style="margin-top: auto;">
    <div class="container">
      <div class="small text-center text-muted">Copyright © 2021 - pGen</div>
    </div>
  </footer>
  <?php } ?>

 

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

</body>

</html>