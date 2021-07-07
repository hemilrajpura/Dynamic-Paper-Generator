

<?php
session_start();
ob_start();
?>
<?php
error_reporting(0);
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>pGen- Add Questions</title>
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
  <form method="POST" action="addques3.php">
    <div class="container-md col-md-4 border border-primary rounded-3"
      style="margin-top: 70px; padding: 20px; text-align: center; margin-bottom: 60px">
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

      <!-- Select Chapter -->
      <p class="text-sm-start fw-bold" style="margin-top: 10px;">Select Chapter:</p>
      <select name="drp-chapter" id="drp-chapter" class="form-select" aria-label="Default select example">
       
      </select>
      <input type="submit" name="btn-next" class="btn btn-primary" style="margin-top:30px;" id="btn-next">
    </div>
  </form>
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
  
  <script type="text/javascript">


    $(document).ready(function(){
      function defaultSubjectLoad1(){
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
      defaultSubjectLoad1();
      function defaultSubjectLoad2(){
          var degreeCode= $("#drp-degree").val(); 
          var sem= $("#drp-sem").val();
          var subjectCode= $("#drp-subject").val();
          //alert("Hello World! Welcome-->2"+ " " + degreeCode + " " +sem+ " " + subjectCode);
          $.ajax({
            type : "POST",
            url : "ajax.php",
            data : {subjectCode: subjectCode, sem:sem, degreeCode:degreeCode, log2: 1},
            success:function(data){
              $("#drp-chapter").html(data);
            }
          });
        }
        defaultSubjectLoad2();

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
        function defaultSubjectLoad2(){
          var degreeCode= $("#drp-degree").val(); 
          var sem= $("#drp-sem").val();
          var subjectCode= $("#drp-subject").val();
          //alert("Hello World! Welcome-->2"+ " " + degreeCode + " " +sem+ " " + subjectCode);
          $.ajax({
            type : "POST",
            url : "ajax.php",
            data : {subjectCode: subjectCode, sem:sem, degreeCode:degreeCode, log2: 1},
            success:function(data){
              $("#drp-chapter").html(data);
            }
          });
        }
        defaultSubjectLoad2();
      });
    }); 

    $(document).ready(function(){
      $("#drp-subject").on('change',function(e){
        var subjectCode= $(this).val();
        var sem= $("#drp-sem").val();
        var degreeCode= $("#drp-degree").val();
        //alert("Hello World! Welcome"+ " " + degreeCode + " " +sem+ " " + subjectCode);
        $.ajax({
          type : "POST",
          url : "ajax.php",
          data : {subjectCode: subjectCode, sem:sem, degreeCode:degreeCode, log2: 1},
          success:function(data){
            $("#drp-chapter").html(data);
          }
        });
      });
    }); 

  </script>



  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>