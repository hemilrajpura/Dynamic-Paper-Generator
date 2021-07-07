<?php
  error_reporting(0);
  session_start();
  ob_start();
  $mysqli = NEW MySQLi('localhost','root','','pGen');
?>

<!doctype html>
<html lang="en" style="height: 100%;">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">


  

  <title>pGen- Add Chapters</title>
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
             
        if(isset($_SESSION['facultyEmail']))
        {
          echo "welcome ".$_SESSION['facultyFname'];
        }
          else
        {
              header("location:flogin.php");
        } 
        
        ?>
      </div>
                 
        
        <div class="mx-2">
          <a class="btn btn-danger" href="logout.php">LogOut</a>
        </div>


      </div>
    </div>
  </nav>
  <div id="divResult" style="color: white"><!--<div class="container-md col-md-8 rounded-3 bg-danger bg-gradient mt-3 p-3"></div>--></div>
  <div>
    <div class="container-md col-md-4 border border-primary rounded-3"
      style="margin-top: 50px; padding: 20px; text-align: center; margin-bottom: 60px; margin-left: 50px; float: left;">

      <!-- Select Degree -->
      <p class="text-sm-start fw-bold">Select Degree:</p>
      <select name="drp-degree" id="drp-degree" class="form-select" aria-label="Default select example">
        <?php
        $resultDegree = $mysqli->query("Select degreeCode, degreeName from tbldegree WHERE sysStatus = 'A'");
        while ($row= $resultDegree->fetch_assoc()) {
        	$degreeCode = $row['degreeCode'];
        	$degreeName = $row['degreeName'];
        	echo "<option value='$degreeCode'>$degreeCode $degreeName</option>";
        }
        ?>
      </select>

      <!-- Select Sem -->
      <p class="text-sm-start fw-bold" style="margin-top:10px;">Select Semester:</p>
      <select name="drp-sem" id="drp-sem" class="form-select" aria-label="Default select example">
                <option value='1'>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option selected value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
      </select>

      <!-- Select Subject -->
      <p class="text-sm-start fw-bold" style="margin-top: 10px;">Select Subject:</p>
      <select name="drp-subject" id="drp-subject" class="form-select" aria-label="Default select example">
        <object value='0'>Select Subject</object>
      </select>

      <p class="text-sm-start fw-bold" style="margin-top: 10px;">Chapter Number:</p>
      	<input type="number" class="form-control" id="txt-chapterNumber" name="txt-chapterNumber" placeholder="Chapter Number" min="1" required>

      <p class="text-sm-start fw-bold" style="margin-top: 10px;">Chapter Name:</p> 
      	<input type="text" class="form-control" id="txt-chapterName" name="txt-chapterName"  placeholder="Chapter Name" required>

	
      <!--<input type="submit" name="btn-add" value="Add" class="btn btn-primary" style="margin-top:30px;" id="btn-add">-->
      <button name="btn-add" value="Add" class="btn btn-primary" style="margin-top:30px;" id="btn-add">ADD</button>
    </div>
    

    <!-- Chapters Table -->
    <div class="container-md col-md-7  row justify-content-center" id="divDataTable" style="margin-top: 50px; padding: 20px; text-align: center; margin-bottom: 60px; float: right; margin-right: 50px; height: 540px;">
  		<table id="dataTable" class="table table-striped table-bordered" style="width: 100%">
  				<thead>
		            <tr>
			            <th>Chapter No.</th>
    	  					<th>Chapter Name</th>
    	  					<th>Delete</th>
		            </tr>
		        </thead>
            <tbody>
                <tr>
                   <td>Empty</td>
                   <td>Empty</td>
                   <td>Empty</td> 
                </tr>
            </tbody>
  		</table>
  	</div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>

  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>-->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
  	
  	
      function defaultSubjectLoad(){
        var degreeCode= $("#drp-degree").val(); 
        var sem= $("#drp-sem").val();
        //alert("Hello World! Welcome"+ " " + sem + " " + degreeCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {semNum: sem, degCode: degreeCode, log1: 1},
          success:function(data){
            $("#drp-subject").html(data);
          }
        });
      }
      defaultSubjectLoad();
      $('#dataTable').DataTable({	
		}); 

    $(document).ready(function(){
  		$("#drp-sem").on('change',function(e){
  			var sem= $(this).val();
  			var degreeCode= $("#drp-degree").val(); 
  			//alert("Hello World! Welcome-Change"+ " " + sem + " " + degreeCode);
  			$.ajax({
  				type : "POST",
  				url : "ajax.php",
  				data : {semNum: sem, degCode: degreeCode, log1: 1},
  				success:function(data){
  					$("#drp-subject").html(data);
  				}
  			});
  		});
  	});	

  	$(document).ready(function(){
      $("#drp-degree").on('change',function(e){
        var degreeCode= $(this).val();
        var sem= $("#drp-sem").val(); 
        //alert("Hello World! Welcome"+ " " + sem + " " + degreeCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {semNum: sem, degCode: degreeCode, log1: 1},
          success:function(data){
            $("#drp-subject").html(data);
          }
        });
      });
    });

    $(document).ready(function(){
      $("#drp-subject").on('change',function(e){
        var degreeCode= $("#drp-degree").val();
        var sem= $("#drp-sem").val();
        var subjectCode= $("#drp-subject").val(); 
        //alert("Hello World! Welcome"+ " " + sem + " " + degreeCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {semNum: sem, degreeCode: degreeCode, subjectCode: subjectCode, log4: 1},
          success:function(data){
            $("#divDataTable").html(data);
          }
        });
      });
    });

    $(document).ready(function(){
      $("#drp-degree").on('change',function(e){ 
        //alert("Hello World! Welcome"+ " " + sem + " " + degreeCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {log5: 1},
          success:function(data){
            $("#divDataTable").html(data);
          }
        });
      });
    });

    $(document).ready(function(){
      $("#drp-sem").on('change',function(e){ 
        //alert("Hello World! Welcome"+ " " + sem + " " + degreeCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {log5: 1},
          success:function(data){
            $("#divDataTable").html(data);
          }
        });
      });
    });

    $(document).ready(function(){
      $("#btn-add").on('click',function(e){
        var degreeCode= $("#drp-degree").val();
        var sem= $("#drp-sem").val();
        var subjectCode= $("#drp-subject").val(); 
        var chapterNumber= $("#txt-chapterNumber").val();
        var chapterName= $("#txt-chapterName").val();
        // alert("Hello World! Welcome"+ " " + sem + " " + degreeCode+" "+chapterNumber+" "+chapterName);
        if (subjectCode == '0'){
          alert("Subject not selected");
        }
        else
        {
          //alert("Send");
          $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {semNum: sem, degreeCode: degreeCode, subjectCode: subjectCode, chapterNumber: chapterNumber, chapterName: chapterName, log6: 1},
          success:function(data){
            $("#divResult").html(data);
          }
          });
        } 
      });
    });

    $(document).on('click','.delete',function(){
      var cell = $(this).attr("id");
      //alert(cell);
      if(confirm("Are you sure want to delete chapter?"))
      {
          $.ajax({
          type : "POST",
          url : "ajax.php",
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

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    
    
</body>

</html>