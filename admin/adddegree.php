<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en" style="height: 100%;">

<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Here we have imported Bootstrap Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        

        <a href="deleteDegree.php"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

</style>

   <title>pGen- Add Questions</title>
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
   
<!-- Add Degree From Implemented Below, we are using POST as a method rather than GET -->
    <form method="POST">  
        <div class="container-md col-md-6 border border-primary rounded-3"  
            style="margin-top: 70px; padding: 20px; text-align: center; margin-bottom: 60px;">  
<!-- Degree Code text box is implemented below -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Degree Code:</p> 
            <input type="text" class="form-control" placeholder="Degree Code" name="degreeId"
                style=""></input>   

<!-- Degree Name text box is implemented below -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Add Degree:</p>
            <input type="text" class="form-control" placeholder="Degree Name" name="degreeName" required></input>
<!-- Here we have implemented submit button of this form -->
                <input type="submit" class="btn btn-primary"  style="margin-top:30px;" name="addDegree" value="Add Degree" required></input>

       
           
        </div>
    </form>
<!-- Add Subject From Implementation Finished here Above-->

<!-- table The .table-hover class enables a hover state on table rows  -->
    <div class="container">
        <h2>Existed Degree</h2>
<!-- Here below we are fetching existed Degree from database and displaying in table form -->               
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>State</th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            
          
          <?php
				$c=mysqli_connect("localhost","root","");
//for fetching we have established the mysql connection
				if($c){
//here we have selected the database on which we want to perform the operations

					mysqli_select_db($c,"pgen");
				$qry="select * from tbldegree where sysStatus = 'A'";
				$log1=mysqli_query($c,$qry);
				while($row = mysqli_fetch_array($log1)){
//have have fired the select query and fetching each and every data which is presented in tbldegree table by while loop
//Here we are fetching the degree whose status is 'A' 
				?>
                
 <form method="POST" action="delete.php"> 
            <tr>
<!-- here we have written html code to create a table and inside table we have written php code to fetch degree -->
           <?php
$output = '
             <td>'.$row['degreeCode'].'</td>
              <td>'.$row['sysStatus']. '</td>
              <td>'.$row['degreeName']. '</td>
            
<td><button type="button" name="delete" class="btn-danger btn-sm delete" id='.$row["sysId"].'>Delete</button></td>';
echo $output;
   ?>
            </tr>
            </form>
				</option>   
				<?php			

		}
			?> 		
          </tbody>
        </table>
      </div>

<!-- table  -->
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

            <script type="text/javascript">
  	
      $(document).on('click','.delete',function(){
      var cell = $(this).attr("id");
      //alert(cell);
      if(confirm("Are you sure want to delete degree?"))
      {
          $.ajax({
          type : "POST",
          url : "delete.php",
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
    </body>
</html>
<?php
//now we are here implemented the logic of insert query 
		if(isset($_POST["addDegree"]))
		{
            
//checking if the add degree button is clicked or not
		$dName=$_POST['degreeName'];
		$dId=$_POST['degreeId'];
		$cDate=date("Y-m-d");  
//duplicate entry validation
$qry="select * from tbldegree where sysStatus = 'A'";
$log1=mysqli_query($c,$qry);
while($row = mysqli_fetch_array($log1)){
if($dId==$row['degreeCode'] OR $dName==$row['degreeName']){
echo '<script>alert("Duplicate Entry Not Allowded")</script>';
break;
}
else{
    $ins= "insert into tbldegree(createdDate,degreeCode,degreeName) values('$cDate','$dId','$dName')";
    
    //we are storing the degree data into different variables and firing the insert query            
            if(mysqli_query($c,$ins))
            {
              echo '<script>alert("Degree entered successfully")</script>';
            //header("location:http://localhost/pakhi-web/web/addchapters.php"); 
            }
                else
                {
                    echo mysqli_error($c);
                }
                break;
}
}

//duplicate entry validation end


            }
            else
            {
                echo mysqli_error($c);
            }
            
            }    

            
            


		/*
		$q="delete from user where fname like 'Zehn'";
		mysqli_select_db($c,"lensart");
		if(mysqli_query($c,$q))
		{
		echo "<br><br>Record is deleted successfully";
		}
		else
		{
		echo mysqli_error($c);
		
		} */
//here we are closing the database
		mysqli_close($c);
		?>
			