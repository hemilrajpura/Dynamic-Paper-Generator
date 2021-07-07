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
  
  <title>pGen- Add SignUp</title>
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
            <a class="nav-link" aria-current="page" href="viewquestions.php">View Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="fsignup.php">Add faculty</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Add
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="adddegree.php">Degree</a></li>
                            <li>
                                <hr class="dropdown-divider"> 
                            </li>
                            <li><a class="dropdown-item" href="addsubject.php">Subject</a></li>
                            <li>
                                <hr class="dropdown-divider"> 
                            </li>
                            <li><a class="dropdown-item" href="addchapters.php">Chapters</a></li>
                            <li>
                                <hr class="dropdown-divider"> 
                            </li>   
                            <li><a class="dropdown-item" href="addques.php">Questions</a></li>
                        </ul>   
          </li>
          
          
        </ul>

        <div>ADMIN</div>
        <div style="color: white">
        <?php
             
        if(isset($_SESSION['adminEmail']))
        {
          echo "welcome Admin ".$_SESSION['adminFname'];
        }
          else
        {
              header("location:alogin.php");
        } 
        
        ?>
      </div>
                 
        
        <div class="mx-2">
          <a class="btn btn-danger" href="logout.php">LogOut</a>
        </div>


      </div>
    </div>
  </nav>

 <div style="margin-bottom: 40px; margin-top: 10px ">
  <form method="post">
    <center> <h1>Add Faculty</h1> </center>
    <div class="container-md col-md-6 border border-primary rounded-3">
      
      <div class="mb-3" >
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">First Name:</p>
        <input type="text"  name="txt-fname" class="form-control" id="txt-fname" placeholder="Enter First Name" required pattern="[A-Za-z]+" title="please enter letters only">
      </div>     
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Last Name:</p>
        <input type="text"  name="txt-lname" class="form-control" id="txt-lname" placeholder="Enter Lirst Name" required pattern="[A-Za-z]+" title="please enter letters only">
      </div>
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Contact Number:</p>
        <input type="text" name="txt-contact" class="form-control" id="txt-contact" placeholder="Enter Contact Number "required maxlength="10" pattern="[06789][0-9]{9}" title="please enter numbers only">
      </div>

 <fieldset class="form-group row">
      <div class="col-form-legend col-sm-2 fw-bold" style="margin-top: 10px;">Gender:</div>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" style="margin-top: 14px;" type="radio" name="rd-gender" id="rd-gender" value="male">
            <label class="form-check-label" style="margin-top: 10px;" for="inlineRadio1">Male</label>
        </div>
       <div class="form-check form-check-inline">
            <input class="form-check-input" style="margin-top: 14px;" type="radio" name="rd-gender" id="rd-gender" value="female">
            <label class="form-check-label" style="margin-top: 10px;" for="inlineRadio1">Female</label>
        </div>
      </div>
      </fieldset>
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Email Id:</p>
        <input type="email" name="txt-email" class="form-control" id="txt-email" placeholder="Enter Email Id" required title="Enter valid email address">
      </div>
      <div class="mb-3">
        <p class="text-sm-start fw-bold" style="margin-top: 10px;">Password:</p>
        <input type="password" name="txt-pass" class="form-control" id="txt-pass" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one uppercase, one lowercase letter, one number, and at least 8 or more characters" required minlength="8">
      </div>
    <center>
        <button class="btn btn-primary btn-lg" style="margin-top:20px; margin-bottom: 10px;" type="submit" name="btn-signup">Add Faculty</button>
      </center>
    </div>
  </form>
</div>

  <footer class="bg-dark py-5" style="margin-top: auto;">
    <div class="container">
      <div class="small text-center text-muted">Copyright © 2021 - pGen</div>
    </div>
  </footer>

  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>-->

	

<?php
		$c=mysqli_connect("localhost","root","");
			if($c)
			{
					mysqli_select_db($c,"pgen");
					
					if(isset($_POST["btn-signup"]))
					{

						$Fname=$_POST['txt-fname'];
            $Lname=$_POST['txt-lname'];
            $Contact=$_POST['txt-contact'];
            $Gender=$_POST['rd-gender'];
            $Email=$_POST['txt-email'];
            $Pass=$_POST['txt-pass'];
						$cDate=date("Y-m-d");

            $qry="select * from tblfaculty where sysStatus = 'A' AND facultyEmail = '".$Email."'";
            $log1=mysqli_query($c,$qry);
            if(mysqli_num_rows($log1)>0)
            {
              echo '<script>alert("Email Duplicate Entry Not Allowd")</script>';
            }
            
            if($Gender =='')
            {
              echo '<script>alert("please select gender")</script>';
            }

            else{
            $ins= "insert into tblfaculty(createdDate,facultyFname,facultyLname,facultyMob,facultyGender,facultyEmail,facultyPssword) values('$cDate','$Fname','$Lname','$Contact','$Gender','$Email',MD5('$Pass'))";
            
           

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
					}
			}
	
		   else
			{
				echo "n";
			}
		
		
		
		
	mysqli_close($c);
		?>
			
</body>

</html>