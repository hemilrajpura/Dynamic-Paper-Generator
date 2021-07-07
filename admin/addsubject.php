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

    <!-- Here we have imported Bootstrap Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <title>pGen- Add Subjects</title>
</head>

<body style="min-height: 100%; display: flex; flex-direction: column;">

<!-- Here we are implementing the header section -->
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
            <a class="nav-link" aria-current="page" href="viewquestions.php">View Questions</a>
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
<!--implementation of the header section is finshed here -->
    
    <div >
        <h1 style="text-align: center;">Add Subject</h1>
    </div>
        <div style="margin-bottom: -25px; margin-top: -50px;">
<!-- Add Subject From Implemented Below, we are using POST as a method rather than GET -->
    <form method="POST">
        <div class="container-md col-md-6 border border-primary rounded-3"
            style="margin-top: 70px; padding: 20px; text-align: center; margin-bottom: 60px;">
<!-- Select degree dropdown menu is implemented below -->
            <p class="text-sm-start fw-bold">Select Degree:</p>
            
<?php
//connecting to localhost
        $c=mysqli_connect("localhost","root","");
        if($c){
//for fetching we have established the mysql connection
            mysqli_select_db($c,"pgen");

            $query = "SELECT degreeCode,degreeName FROM tbldegree where sysStatus='A' ";
            $result = mysqli_query($c,$query);
?>

    <select class="form-select" aria-label="Default select example" name="degreeCode" id="degreeCode" required>
    <option selected></option>
<?php 
//loop to fetch degree code from database
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value='".$row['degreeCode']."'>".$row['degreeCode']." ".$row['degreeName']."</option>";
            }
?>        
    </select>


<!-- Select semester dropdown menu is implemented below -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Semester:</p>
<?php

            $query = "SELECT semNum FROM tblsem";
            $result = mysqli_query($c,$query);
?>

    <select class="form-select" aria-label="Default select example"name="sem" id="sem" required>
    <option selected></option>
<?php 
//loop to fetch sem numbers from database
          while ($row = mysqli_fetch_array($result))
          { 
                echo "<option value='".$row['semNum']."'>".$row['semNum']."</option>";
          }
?>        
    </select>


<script type="text/javascript">
//javascript code to view the table  as per the query 
  $(document).ready(function(){
    $("#sem").on('change',function(){

        var degree = $("#degreeCode").val();
        var semn = $("#sem").val();
        $.ajax({
          url:'table.php',
          type:'POST',
          data: {degCode:degree,sem:semn,log1:1},
          success:function(data){
              $("#table-container").html(data);
              
          },
        })

    })
  })
  
</script>


<!-- subject id textbox is implemented below   -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Subject ID:</p>
            <input class="form-control me-2" type="text"  aria-label="Search" name="txt-subjectCode" required>
<!-- subject name text box is implemented below -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Subject Name:</p>
            <input class="form-control me-2" type="text"  aria-label="Search" name="txt-subjectName" required>


<!-- Here we have implemented submit button of this form -->
            <button class="btn btn-primary" style="margin-top:30px;" name="btn-addsub" href="addques2.html" role="button">Add Subject
            </button>
</form>
 <!-- Add Subject From Implementation Finished here Above-->
 <form method="POST">
<div id="table-container">
     <!-- Here below we are fetching existed subject from database and displaying in table form -->  
       <p class="text-sm-start fw-bold" style="margin-top: 20px; text-align: center;">Subjects:</p>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">Subject Code</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Degree Code</th>
                  <th scope="col">Sem</th>
                </tr>
              </thead>


<script type="text/javascript">
//javascript code to delete a record from databse  
    

    $(document).on('click','.delete',function(){
      var cell = $(this).attr("id");
      //alert(cell);
      if(confirm("Are you sure want to delete Subject?"))
      {
          $.ajax({
          type : "POST",
          url : "table.php",
          data : {sysId: cell, log7: 1},
          success:function(data){
            alert(data);
            //fetch_data();
            location.reload();
          }
          });
      }
      else
      {
        return false;
      }
    });



</script>
  
         
        </table>
    
</div>
</form>
        </div>
    

  </div>
    <footer class="bg-dark py-5" style="margin-top: auto;">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2021 - pGen</div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

<?php
//code to insert a subject in database
if(isset($_POST["btn-addsub"]))
{
  

      $subc=$_POST['txt-subjectCode'];
      $subn=$_POST['txt-subjectName'];
      $degc=$_POST['degreeCode'];
      $sem=$_POST['sem'];
      $cDate=date("Y-m-d");
// validation start 

      $qry="select * from tblsubject where sysStatus = 'A' AND subjectCode = '".$subc."' or subjectName='".$subn."'";
      $log1=mysqli_query($c,$qry);
      
      
      if(mysqli_num_rows($log1)>0)
      {
        echo '<script>alert("Duplicate Entry Not Allowded")</script>';
      }
      else
      {

        $ins= "insert into tblsubject(createdDate,subjectCode,subjectName,degreeCode,sem) values('$cDate','$subc','$subn','$degc','$sem')";

        if(mysqli_query($c,$ins))
        {
          echo '<script>alert("subject entered succesfully")</script>';
          //echo "inserted"; 
        }
        else
        {
          echo mysqli_error($c);
        }

        
//  validation end
      

    }
  }
}

mysqli_close($c);
//here we are closing the database
?>
  
</body>

</html>