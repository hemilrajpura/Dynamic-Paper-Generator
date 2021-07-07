<?php
	error_reporting(0);
	session_start();

	$sem = $_POST["drp-sem"];
    $degreeCode = $_POST["drp-degree"];
    $subjectCode = $_POST["drp-subject"];
    $chapterNumber = $_POST["drp-chapter"];
   	
   	if ($subjectCode == '0') {
   		echo "<script>alert('Select Subject')</script>";
   		header("Location:addques.php");
   	}
   	else
   	{
   		if ($chapterNumber == '0') {
   		echo "<script>alert('Select Chapter')</script>";
   		header("Location:addques.php");
	   	}
	   	else
	   	{
	   		$_SESSION["sem"] = $sem;
			$_SESSION["degreeCode"] = $degreeCode;
			$_SESSION["subjectCode"] = $subjectCode;
			$_SESSION["chapterNumber"] = $chapterNumber;
	   		header("Location:addques2.php");	
	   	}
   	}

   	

    // echo $sem."<br>";
    // echo $degreeCode."<br>";
    // echo $subjectCode."<br>";
    // echo $chapterNumber."<br>";
    //storing data in session
    

    //header("Location:addques2.php");

?>