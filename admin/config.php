<?php
error_reporting(0);
$conn = mysqli_connect('localhost','root','','pGen') or die("Connection Failed");
session_start();

    if(isset($_POST['log12'])){
      
      $q1a = $_POST['q1a'];
      $q1b = $_POST['q1b'];
      $q1c = $_POST['q1c'];
      
      $q2a = $_POST['q2a'];
      $q2b = $_POST['q2b'];
      $q2c = $_POST['q2c'];
      $q2d = $_POST['q2d'];

      $q3a = $_POST['q3a'];
      $q3b = $_POST['q3b'];
      $q3c = $_POST['q3c'];

      $q4a = $_POST['q4a'];
      $q4b = $_POST['q4b'];
      $q4c = $_POST['q4c'];
 
      $q5a = $_POST['q5a'];
      $q5b = $_POST['q5b'];
      $q5c = $_POST['q5c'];
      $q5d = $_POST['q5d'];

      $q6a = $_POST['q6a'];
      $q6b = $_POST['q6b'];
      $q6c = $_POST['q6c'];

     // echo $q1a, $q1b, $q1c, $q2a, $q2b, $q2c, $q2d, $q3a, $q3b, $q3c, $q4a, $q4b, $q4c, $q5a, $q5b, $q5c, $q5d, $q6a, $q6b, $q6c.'<br>';

      $m1a = $_POST['m1a'];
      $m1b = $_POST['m1b'];
      $m1c = $_POST['m1c'];
      
      $m2a = $_POST['m2a'];
      $m2b = $_POST['m2b'];
      $m2c = $_POST['m2c'];
      $m2d = $_POST['m2d'];

      $m3a = $_POST['m3a'];
      $m3b = $_POST['m3b'];
      $m3c = $_POST['m3c'];

      $m4a = $_POST['m4a'];
      $m4b = $_POST['m4b'];
      $m4c = $_POST['m4c'];
 
      $m5a = $_POST['m5a'];
      $m5b = $_POST['m5b'];
      $m5c = $_POST['m5c'];
      $m5d = $_POST['m5d'];

      $m6a = $_POST['m6a'];
      $m6b = $_POST['m6b'];
      $m6c = $_POST['m6c'];

      $ques = array(0);
      //print_r($ques);
      $x = null;

      $subjectCode = $_SESSION["subjectCode"];
      //echo $m1a, $m1b, $m1c, $m2a, $m2b, $m2c, $m2d, $m3a, $m3b, $m3c, $m4a, $m4b, $m4c, $m5a, $m5b, $m5c, $m5d, $m6a, $m6b, $m6c.'<br>';
    	//array_push($ques,'L');
    	//print_r($ques);	
    	$sql = "SELECT subjectCode, subjectName FROM `tblsubject` WHERE sysStatus = 'A' AND subjectCode = '$subjectCode'";
		 	$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
		 	
		 	while ($row = mysqli_fetch_array($result))
		 	{	

		 		$subcode = $row['subjectCode'];
		 		$subname = $row['subjectName'];
		 	}	

		 	// Question 1 A
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q1a' AND questionMarks = '$m1a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q1aId = $row['sysId'];
							$q1aDesc = $row['questionDesc'];
							$q1aMarks = $row['questionMarks'];

							$q1aimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end1a;
						}
						else
						{
							//echo ('found <br>');
						}


					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q1a' AND questionMarks = '$m1a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result1a = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q1aId = $row['sysId'];
							$q1aDesc = $row['questionDesc'];
							$q1aMarks = $row['questionMarks'];
							$q1aimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end1a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end1a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 1 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q1b' AND questionMarks = '$m1b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q1aId = $row['sysId'];
							$q1aDesc = $row['questionDesc'];
							$q1aMarks = $row['questionMarks'];
							$q1bimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end1b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q1b' AND questionMarks = '$m1b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q1bId = $row['sysId'];
							$q1bDesc = $row['questionDesc'];
							$q1bMarks = $row['questionMarks'];
							$q1bimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end1b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end1b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 1 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q1c' AND questionMarks = '$m1c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q1cId = $row['sysId'];
							$q1cDesc = $row['questionDesc'];
							$q1cMarks = $row['questionMarks'];
							$q1cimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end1c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q1c' AND questionMarks = '$m1c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q1cId = $row['sysId'];
							$q1cDesc = $row['questionDesc'];
							$q1cMarks = $row['questionMarks'];
							$q1cimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end1c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end1c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 2 a
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q2a' AND questionMarks = '$m2a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q2aId = $row['sysId'];
							$q2aDesc = $row['questionDesc'];
							$q2aMarks = $row['questionMarks'];
							$q2aimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end2a;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q2a' AND questionMarks = '$m2a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q2aId = $row['sysId'];
							$q2aDesc = $row['questionDesc'];
							$q2aMarks = $row['questionMarks'];
							$q2aimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end2a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end2a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 2 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q2b' AND questionMarks = '$m2b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q2bId = $row['sysId'];
							$q2bDesc = $row['questionDesc'];
							$q2bMarks = $row['questionMarks'];
							$q2bimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end2b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q2b' AND questionMarks = '$m2b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q2bId = $row['sysId'];
							$q2bDesc = $row['questionDesc'];
							$q2bMarks = $row['questionMarks'];
							$q2bimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end2b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end2b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 2 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q2c' AND questionMarks = '$m2c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q2cId = $row['sysId'];
							$q2cDesc = $row['questionDesc'];
							$q2cMarks = $row['questionMarks'];
							$q2cimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end2c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q2c' AND questionMarks = '$m2c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q2cId = $row['sysId'];
							$q2cDesc = $row['questionDesc'];
							$q2cMarks = $row['questionMarks'];
							$q2cimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end2c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end2c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 2 d
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q2d' AND questionMarks = '$m2d' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q2dId = $row['sysId'];
							$q2dDesc = $row['questionDesc'];
							$q2dMarks = $row['questionMarks'];
							$q2dimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end2d;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q2d' AND questionMarks = '$m2d' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q2dId = $row['sysId'];
							$q2dDesc = $row['questionDesc'];
							$q2dMarks = $row['questionMarks'];
							$q2dimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end2d;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end2d: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 3 a
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q3a' AND questionMarks = '$m3a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q3aId = $row['sysId'];
							$q3aDesc = $row['questionDesc'];
							$q3aMarks = $row['questionMarks'];
							$q3aimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end3a;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q3a' AND questionMarks = '$m3a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q3aId = $row['sysId'];
							$q3aDesc = $row['questionDesc'];
							$q3aMarks = $row['questionMarks'];
							$q3aimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end3a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end3a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 3 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q3b' AND questionMarks = '$m3b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q3bId = $row['sysId'];
							$q3bDesc = $row['questionDesc'];
							$q3bMarks = $row['questionMarks'];
							$q3bimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end3b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q3b' AND questionMarks = '$m3b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q3bId = $row['sysId'];
							$q3bDesc = $row['questionDesc'];
							$q3bMarks = $row['questionMarks'];
							$q3bimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end3b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end3b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 3 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber = '$q3c' AND questionMarks = '$m3c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q3cId = $row['sysId'];
							$q3cDesc = $row['questionDesc'];
							$q3cMarks = $row['questionMarks'];
							$q3cimg = $row['questionImage'];
							//print_r($ques);
							//echo 'Need<br>';
							goto end3c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q3c' AND questionMarks = '$m3c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q3cId = $row['sysId'];
							$q3cDesc = $row['questionDesc'];
							$q3cMarks = $row['questionMarks'];
							$q3cimg = $row['questionImage'];
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end3c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end3c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 4 a
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4a' AND questionMarks = '$m4a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q4aId = $row['sysId'];
							$q4aDesc = $row['questionDesc'];
							$q4aMarks = $row['questionMarks'];
							$q4aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end4a;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4a' AND questionMarks = '$m4a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q4aId = $row['sysId'];
							$q4aDesc = $row['questionDesc'];
							$q4aMarks = $row['questionMarks'];
							$q4aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end4a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end4a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 4 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4b' AND questionMarks = '$m4b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q4bId = $row['sysId'];
							$q4bDesc = $row['questionDesc'];
							$q4bMarks = $row['questionMarks'];
							$q4bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end4b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4b' AND questionMarks = '$m4b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q4bId = $row['sysId'];
							$q4bDesc = $row['questionDesc'];
							$q4bMarks = $row['questionMarks'];
							$q4bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end4b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end4b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 4 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4c' AND questionMarks = '$m4c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q4cId = $row['sysId'];
							$q4cDesc = $row['questionDesc'];
							$q4cMarks = $row['questionMarks'];
							$q4cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end4c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q4c' AND questionMarks = '$m4c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q4cId = $row['sysId'];
							$q4cDesc = $row['questionDesc'];
							$q4cMarks = $row['questionMarks'];
							$q4cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end4c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end4c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 5 a
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5a' AND questionMarks = '$m5a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q5aId = $row['sysId'];
							$q5aDesc = $row['questionDesc'];
							$q5aMarks = $row['questionMarks'];
							$q5aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end5a;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5a' AND questionMarks = '$m5a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q5aId = $row['sysId'];
							$q5aDesc = $row['questionDesc'];
							$q5aMarks = $row['questionMarks'];
							$q5aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end5a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end5a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 5 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5b' AND questionMarks = '$m5b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q5bId = $row['sysId'];
							$q5bDesc = $row['questionDesc'];
							$q5bMarks = $row['questionMarks'];
							$q5bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end5b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5b' AND questionMarks = '$m5b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q5bId = $row['sysId'];
							$q5bDesc = $row['questionDesc'];
							$q5bMarks = $row['questionMarks'];
							$q5bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end5b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end5b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 5 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5c' AND questionMarks = '$m5c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q5cId = $row['sysId'];
							$q5cDesc = $row['questionDesc'];
							$q5cMarks = $row['questionMarks'];
							$q5cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end5c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5c' AND questionMarks = '$m5c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q5cId = $row['sysId'];
							$q5cDesc = $row['questionDesc'];
							$q5cMarks = $row['questionMarks'];
							$q5cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end5c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end5c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 5 d
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5d' AND questionMarks = '$m5d' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q5dId = $row['sysId'];
							$q5dDesc = $row['questionDesc'];
							$q5dMarks = $row['questionMarks'];
							$q5dimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end5d;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q5d' AND questionMarks = '$m5d' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q5dId = $row['sysId'];
							$q5dDesc = $row['questionDesc'];
							$q5dMarks = $row['questionMarks'];
							$q5dimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end5d;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end5d: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 6 a
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6a' AND questionMarks = '$m6a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q6aId = $row['sysId'];
							$q6aDesc = $row['questionDesc'];
							$q6aMarks = $row['questionMarks'];
							$q6aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end6a;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6a' AND questionMarks = '$m6a' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q6aId = $row['sysId'];
							$q6aDesc = $row['questionDesc'];
							$q6aMarks = $row['questionMarks'];
							$q6aimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end6a;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end6a: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 6 b
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6b' AND questionMarks = '$m6b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q6bId = $row['sysId'];
							$q6bDesc = $row['questionDesc'];
							$q6bMarks = $row['questionMarks'];
							$q6bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end6b;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6b' AND questionMarks = '$m6b' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q6bId = $row['sysId'];
							$q6bDesc = $row['questionDesc'];
							$q6bMarks = $row['questionMarks'];
							$q6bimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end6b;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end6b: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';

		 	// Question 6 c
		 	for ($i=0; $i < 5; $i++) 
		 	{ 
		 		//echo '<br>'.$i.'<br>';
		 		$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6c' AND questionMarks = '$m6c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
				$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							//array_push($ques,$row1b['sysId']);
							$q6cId = $row['sysId'];
							$q6cDesc = $row['questionDesc'];
							$q6cMarks = $row['questionMarks'];
							$q6cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//print_r($ques);
							//echo 'Need<br>';
							goto end6c;
						}
						else
						{
							//echo ('found <br>');
						}
					}
				}
		 	}
		 	$sql = "SELECT * FROM `tblquestion` WHERE sysStatus = 'A' AND chapterNumber != '$q6c' AND questionMarks = '$m6c' AND subjectCode = '$subcode' ORDER BY rand() LIMIT 1";
			$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
			if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						//echo '<br>while <br>';
						//echo $row1a['sysId'].'<br>';

						$x = array_search($row['sysId'],$ques);
						if($x == '')
						{
							array_push($ques,$row['sysId']);
							$q6cId = $row['sysId'];
							$q6cDesc = $row['questionDesc'];
							$q6cMarks = $row['questionMarks'];
							$q6cimg = $row['questionImage'];
							//echo "<img src='data:image/jpeg;base64,".base64_encode($q4aimg)."' height = '400px' width = '400px' />";
							//echo $row1a['chapterNumber'].'<br>';
							//print_r($ques);
							//echo 'No need<br>';
							goto end6c;
						}
						else
						{
							echo ("<script>alert('Server Down'); location.reload();</script>");
						}


					}
				}
		 	end6c: 
		 	//echo '<b>The END</b><br>'.$q1aId.'--'.$q1aDesc.' ['.$q1aMarks.']';
				


    	$output = 
    	"
		  		<table id='dataTable' class='table table-striped table-bordered'>
		            <tbody>

		                  <!-- Subject -->
		                  <tr>
		                     <td colspan='3'><p class='fs-5 fw-bold text-center text-decoration-underline'>".$subcode.": ".$subname."</p></td>
		                  </tr>

		                  <!-- Instructions -->
		                  <tr>
		                     <td colspan='3'>
		                      <div class='fs-6 fw-bold' style='float: left;''>Time- 3 Hours</div>
		                      <div class='fs-6 fw-bold' align='right'>Maximun Marks- 70</div>
		                      <div>
		                        <p></p>
		                        <p class='fs-6 fw-bold fst-italic text-decoration-underline'>Instructions:</p>
		                        <p class='fs-6'>1. The question paper comprises two sections.</p>
		                        <p class='fs-6'>2. Section I and II must be attempted in separate answer sheets.</p>
		                        <p class='fs-6'>3. Make suitable assumptions and draw neat figures wherever required.</p>
		                        <p class='fs-6'>4. Use of scientific calculator is allowed.</p>
		                      </div>
		                    </td>
		                  </tr>

		                  <!-- Section 1 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-5 fw-bold text-center text-decoration-underline'>Section - &#x2160;</p></td>
		                  </tr>

		                  <!-- Question 1 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-1 Answer the following questions. &emsp; [6 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q1 a.</p></td>
		                     <td>
		                        <div>".$q1aDesc."  [".$q1aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                      [".$m1a."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q1 b.</p></td>
		                     <td>
		                        <div>".$q1bDesc."  [".$q1bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m1b."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q1 c.</p></td>
		                     <td>
		                        <div>".$q1cDesc."  [".$q1cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m1c."]
		                     </td>
		                  </tr>

		                  <!-- Question 2 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-2 Answer the following questions. (Any Three) &emsp; [15 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 a.</p></td>
		                     <td>
		                        <div>".$q2aDesc."  [".$q2aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m2a."]
		                     </td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 b.</p></td>
		                     <td>
		                        <div>".$q2bDesc."  [".$q2bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m2b."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 c.</p></td>
		                     <td>
		                        <div>".$q2cDesc."  [".$q2cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m2c."]
		                     </td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 d.</p></td>
		                     <td>
		                        <div>".$q2dDesc."  [".$q2dMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m2d."]
		                     </td> 
		                  </tr>

		                  <!-- Question 3 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-3 Answer the following questions. (Any Two) &emsp; [14 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 a.</p></td>
		                    <td>
		                        <div>".$q3aDesc."  [".$q3aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m3a."]
		                     </td>  
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 b.</p></td>
		                     <td>
		                        <div>".$q3bDesc."  [".$q3bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m3b."]
		                     </td>  
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 c.</p></td>
		                     <td>
		                        <div>".$q3cDesc."  [".$q3cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m3c."]
		                     </td>  
		                  </tr>

		                  <!-- Section 2 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-5 fw-bold text-center text-decoration-underline'>Section - &#8545;</p></td>
		                  </tr>

		                  <!-- Question 1 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-4 Answer the following questions. &emsp; [6 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q4 a.</p></td>
		                     <td>
		                        <div>".$q4aDesc."  [".$q4aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m4a."]
		                     </td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q4 b.</p></td>
		                     <td>
		                        <div>".$q4bDesc."  [".$q4bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m4b."]
		                     </td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q4 c.</p></td>
		                     <td>
		                        <div>".$q4cDesc."  [".$q4cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m4c."]
		                     </td>
		                  </tr>

		                  <!-- Question 2 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-5 Answer the following questions. (Any Three) &emsp; [15 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 a.</p></td>
		                     <td>
		                        <div>".$q5aDesc."  [".$q5aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m5a."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 b.</p></td>
		                     <td>
		                        <div>".$q5bDesc."  [".$q5bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m5b."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 c.</p></td>
		                     <td>
		                        <div>".$q5cDesc."  [".$q5cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m5c."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 d.</p></td>
		                     <td>
		                        <div>".$q5dDesc."  [".$q5dMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m5d."]
		                     </td> 
		                  </tr>

		                  <!-- Question 3 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-6 Answer the following questions. (Any Two) &emsp; [14 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 a.</p></td>
		                     <td>
		                        <div>".$q6aDesc."  [".$q6aMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m6a."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 b.</p></td>
		                     <td>
		                        <div>".$q6bDesc."  [".$q6bMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m6b."]
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 c.</p></td>
		                     <td>
		                        <div>".$q6cDesc."  [".$q6cMarks."]</div>
		                        <div></div>
		                     </td>
		                     <td align='right'>
		                       [".$m6c."]
		                     </td>
		                  </tr>
		                  <tr>
		                     <td colspan='3'><p class='fs-4 fw-bold text-center'>******</p></td> 
		                  </tr>
		                  <tr>
		                     <td colspan='3' align='center'><button type='button' id='createPaper' class='btn btn-primary'>Print Paper</button></td> 
		                  </tr>
		            </tbody>
		        </table>
    	";
    	echo $output;
    	//echo "<script>alert('hi');</script>";
   }
?>