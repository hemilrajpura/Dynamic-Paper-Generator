<?php
    error_reporting(0);
    session_start();
    
    //featching data from session
    $sem = $_SESSION["sem"];
    $degreeCode = $_SESSION["degreeCode"];
    $subjectCode = $_SESSION["subjectCode"];
    $chapterNumber = $_SESSION["chapterNumber"];
    $nul = '';    //database call
    $conn =  mysqli_connect('localhost','root','','pGen');

    if(isset($_POST["btn-insert"]))
    {
        $file = addcslashes(file_get_contents($_FILES["img-question"]["tmp_name"]));
        $question = $_POST["txt-question"];
        $marks = $_POST["drp-marks"];
        $createdDate=date("Y-m-d");

        if ($question == '') {
            $nul = 'Question Description Missing';
        }
        else{
                if ($_FILES['img-question']['tmp_name'] == '') {
                $query = "INSERT INTO tblquestion(createdDate ,degreeCode, subjectCode, chapterNumber, questionMarks, questionDesc , sem) VALUES ('$createdDate' ,'$degreeCode','$subjectCode','$chapterNumber','$marks','$question','$sem')";
                if(mysqli_query($conn,$query))
                {
                    echo "<script>alert('Question uploaded without Image')</script>";
                }
                echo $_FILES['img-question']['tmp_name']."<br>";
                // echo $question."<br>";
                // echo $marks."<br>";
            }
            else
            {
                $query = "INSERT INTO tblquestion(degreeCode, subjectCode, chapterNumber, questionMarks, questionDesc ,questionImage, sem) VALUES ('$degreeCode','$subjectCode','$chapterNumber','$marks','$question','file','$sem')";
                if(mysqli_query($conn,$query))
                {
                    echo "<script>alert('Question uploaded with Image')</script>";
                }
                echo $_FILES['img-question']['tmp_name']."<br>";
                // echo $question."<br>";
                // echo $marks."<br>";
            }
        }
        

        
        
        

    }
    
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
    <div style="height: 50px">
        <p class="text-info bg-dark"><?php echo "Sem: ".$sem." -- Degree: ".$degreeCode." -- Subject: ".$subjectCode." -- Chapter: ".$chapterNumber ?></p>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="container-md col-md-6 border border-primary rounded-3"
            style="margin-top: 70px; padding: 20px; text-align: center; margin-bottom: 60px;">

            <div><h3><?php echo $nul ?></h3></div>
            <!--Write Question -->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Question Description:*</p>
            <textarea maxlength="500" class="form-control" placeholder="Add question here" id="txt-question" name='txt-question' style="height: 100px"></textarea>

            <!-- <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <td><input type="text" name="point[]" id="point" placeholder="" class="form-control name_list"></td>
                    <td><button name="add" id="add" class="btn btn-success">Add More</button></td>
                </tr>
            </table> -->

            <!-- <script>

                $(document).ready(function () {
                    var i = 1;
                    $('#add').click(function () {
                        i = i + 1;
                        $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="point[]" id="point" class="form-control name_list"></td><td><button name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });
                    $(document).on('click', '.btn_remove', function () {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });
                });
            </script> -->

            <!--Uplode question image-->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Upload Image:</p>
            <input type="file" class="form-control" id="img-question" name="img-question" accept="image/*" />

            <!--Selecting Question Marks-->
            <p class="text-sm-start fw-bold" style="margin-top: 10px;">Marks:*</p>
            <select class="form-select" aria-label="Default select example" id="drp-marks" name="drp-marks">
                <option selected value='1'>1</option>
                <option value='2'>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>


            <input type="submit" name="btn-insert" value="Insert" class="btn btn-primary" style="margin-top:30px;" id="btn-insert" />
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
    //     $(document).ready(function(){
    //     $("#drp-sem").on('click',function(e){
    //         var question= $("#txt-question").val();
    //         var marks= $("#drp-marks").val(); 
    //         alert("Hello World! Welcome-Change");
    //         $.ajax({
    //             type : "POST",
    //             url : "ajax.php",
    //             data : {question:question, marks:marks, log4: 1},
    //             success:function(data){
    //                 $("#btn-add").html(data);
    //             }
    //         });
    //     });
    // });

    $(document).ready(function(){
        $('#btn-insert').click(function(){
            var image_name = $('#img-question').val();
            var extention = $('#img-question').val().split('.').pop().toLowerCase();
            if(jquery,inArray(extention, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#img-question').val('');
                return false;
            }
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