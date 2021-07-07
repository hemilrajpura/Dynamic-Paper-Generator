<?php
session_start();
error_reporting(0);
$conn = mysqli_connect('localhost','root','','pGen') or die("Connection Failed");

if (isset($_POST['log1'])){
	$sem = $_POST["semNum"];
	$degreeCode = $_POST["degCode"];
	$sql = "SELECT subjectCode, subjectName, sem, degreeCode FROM tblsubject WHERE sysStatus = 'A' AND sem = '$sem' AND degreeCode = '$degreeCode'";
	$result = mysqli_query($conn, $sql) or die("SQL query failed");
	$output= "<option value='0'>Select Subject</option>";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= "<option value='{$row["subjectCode"]}'>{$row["subjectCode"]} {$row["subjectName"]}</option>";
		}
		echo $output;
	}
	else
	{
		echo "<option value='0'>No Record Found</option>";
	}
}
elseif(isset($_POST['log2'])){
	$sem = $_POST["semNum"];
	$degreeCode = $_POST["degreeCode"];
	$subjectCode = $_POST["subjectCode"];
	$sql = "SELECT chapterNumber, chapterName, degreeCode, subjectCode, sem FROM `tblchapter` WHERE sysStatus= 'A' AND subjectCode = '$subjectCode'";
	$result = mysqli_query($conn, $sql) or die("SQL query failed");
	$output= "<option value='0'>Select Chapter</option>";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= "<option value='{$row["chapterNumber"]}'>{$row["chapterNumber"]} {$row["chapterName"]}</option>";
		}
		echo $output;
	}
	else
	{
		echo "<option value='0'>No Record Found</option>";
	}
}
elseif(isset($_POST['log3'])){
	$sem = $_POST["semNum"];
	$degreeCode = $_POST["degreeCode"];
	$subjectCode = $_POST["subjectCode"];
	$sql = "SELECT chapterNumber, chapterName, degreeCode, subjectCode, sem FROM `tblchapter` WHERE sysStatus= 'A' AND subjectCode = '$subjectCode'";
	$result = mysqli_query($conn, $sql) or die("SQL query failed");
	$output= "";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$output .= "<option value='{$row["chapterNumber"]}'>{$row["chapterNumber"]} {$row["chapterName"]}</option>";
		}
		echo $output;
	}
	else
	{
		echo "<option value='0'>No Record Found</option>";
	}
}
elseif(isset($_POST['log4'])){
	$sem = $_POST["semNum"];
	$degreeCode = $_POST["degreeCode"];
	$subjectCode = $_POST["subjectCode"];
	$sql = "SELECT sysId, sysStatus, chapterNumber, chapterName FROM `tblchapter` WHERE sysStatus = 'A' AND degreeCode = '$degreeCode' AND sem = '$sem' AND subjectCode = '$subjectCode' ORDER BY chapterNumber";
	$result = mysqli_query($conn, $sql) or die("SQL query failed");
	
  	if (mysqli_num_rows($result) > 0){
  		$output= '<table id="dataTable" class="table table-striped table-bordered">
				<thead>
		            <tr>
			            <th>Chapter No.</th>
	  					<th>Chapter Name</th>
	  					<th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>
  			';
  		while ($row = mysqli_fetch_array($result)) {
  		$output .='
  			<tr>
  				<td>'.$row["chapterNumber"].'</td>
  				<td>'.$row["chapterName"].'</td>
  				<td><button type="button" name="delete" class="btn-danger btn-sm delete" id="'.$row["sysId"].'">Delete</button></td>
  			</tr>
  		';
  		}
	  	$output .='</tbody>
			        <tfoot>
			        	<tr>
				            <th>Chapter No.</th>
		  					<th>Chapter Name</th>
		  					<th>Delete</th>
			            </tr>
			        </tfoot>
	  			</table>
	  			<script>
	  				$("#dataTable").DataTable({
		    			lengthMenu: [[5],[5]],
		    			show: false,
					});
				</script>';
	  	echo $output;
  	}
  	else
  	{
  		$output ='<table id="dataTable" class="table table-striped table-bordered">
				<thead>
		            <tr>
			            <th>Chapter No.</th>
	  					<th>Chapter Name</th>
	  					<th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>
		        <tr>
					<td colspan =3>No data available in table</td>  				
  				</tr>
  				</tbody>
			        <tfoot>
			        	<tr>
				            <th>Chapter No.</th>
		  					<th>Chapter Name</th>
		  					<th>Delete</th>
			            </tr>
			        </tfoot>
	  			</table>
	  			<script>
	  				$("#dataTable").DataTable({
		    			lengthMenu: [[5],[5]],
		    			show: false,
					});
				</script>';
  		echo $output;
  	}
  	
}
elseif(isset($_POST['log5'])){
	$output ='<table id="dataTable" class="table table-striped table-bordered">
				<thead>
		            <tr>
			            <th>Chapter No.</th>
	  					<th>Chapter Name</th>
	  					<th>Delete</th>
		            </tr>
		        </thead>
		        <tbody>
		        <tr>
					<td colspan =3>No data available in table</td>  				
  				</tr>
  				</tbody>
			        <tfoot>
			        	<tr>
				            <th>Chapter No.</th>
		  					<th>Chapter Name</th>
		  					<th>Delete</th>
			            </tr>
			        </tfoot>
	  			</table>';
	  	$output .='<script>
	  				$("#dataTable").DataTable({
		    			lengthMenu: [[5],[5]],
		    			show: false,
					});
				</script>'; 
  		echo $output;
}
elseif(isset($_POST['log6'])){
	$sem = $_POST["semNum"];
	$degreeCode = $_POST["degreeCode"];
	$subjectCode = $_POST["subjectCode"];
	$chapterNumber = $_POST["chapterNumber"];
	$chapterName = $_POST["chapterName"];
	$sql = "SELECT * FROM `tblchapter` WHERE sysStatus = 'A' AND degreeCode = '$degreeCode' AND subjectCode = '$subjectCode' AND sem = '$sem' AND chapterNumber = '$chapterNumber'";
	$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");

	$sql2 = "SELECT * FROM `tblchapter` WHERE sysStatus = 'A' AND degreeCode = '$degreeCode' AND subjectCode = '$subjectCode' AND sem = '$sem' AND chapterName = '$chapterName'";
	$result2 = mysqli_query($conn, $sql2) or die("SQL query failed check chapter number");
	// echo 'Sem:'.$sem.'<br> Degree'.$degreeCode.'<br> Subject'.$subjectCode.'<br> Chapter No'.$chapterNumber.'<br> Chapter Name'.$chapterName;
	
	if ($chapterNumber == '') {
		echo "<script>alert('Chapter No not defined')</script>";
	}
	else if ($chapterName == '') {
		echo "<script>alert('Chapter Name not defined')</script>";	
	}
	else if (mysqli_num_rows($result) > 0)
	{
		echo "<script>alert('Chapter Number existec')</script>";	
	}
	else if (mysqli_num_rows($result2) > 0)
	{
		//echo "<div id='errorMsg' class='container-md col-md-8 rounded-3 bg-success bg-gradient mt-3 p-3'>Successful</div>";
		echo "<script>alert('Chapter Name existec')</script>";	
	}
	else
	{
		$createdDate = date("Y-m-d");
		$query = "INSERT INTO tblchapter (createdDate, chapterNumber, chapterName, degreeCode, subjectCode, sem) 
		VALUES ('$createdDate', '$chapterNumber', '$chapterName', '$degreeCode', '$subjectCode', '$sem');";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Chapter added Successfully'); location.reload();</script>";
		}
	}
}
elseif(isset($_POST['log7'])){
	$sysId = $_POST["sysId"];
	$sql ="UPDATE tblchapter SET sysStatus = 'D' WHERE sysId = '$sysId';";
	if(mysqli_query($conn,$sql))
    {
        echo "Chapter Deleted";
    }
    else
    {
    	echo "Query Failed";
    }
}
elseif(isset($_POST['log8'])){
	session_start();
	$degreeCode = $_POST["degreeCode"];
	$sem = $_POST["sem"];
	$subjectCode = $_POST["subjectCode"];
	$chapter = $_POST["chapter"];

	$_SESSION['degcode'] = $degreeCode;
	$_SESSION['semes'] = $sem;
	$_SESSION['subcode'] = $subjectCode;
	$_SESSION['chap'] = $chapter;

	//echo $chapter. "--";

	$sql = "SELECT sysId, questionNumber, questionDesc, questionMarks FROM `tblquestion` WHERE sysStatus = 'A' AND degreeCode = '$degreeCode' AND subjectCode = '$subjectCode' AND chapterNumber = '$chapter'";
  	$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");

  	//echo mysqli_num_rows($result);

  if (mysqli_num_rows($result) > 0){
      $output= '<table id="dataTable" class="table table-striped table-bordered">
        <thead>
                <tr>
                  <th>Question No.</th>
                  <th>Question</th>
                  <th>Marks</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
        ';
      while ($row = mysqli_fetch_array($result)) {
		
		
      $output .='
        <tr>
          <td>'.$row["sysId"].'</td>
          <td>'.$row["questionDesc"].'</td>
          <td>'.$row["questionMarks"].'</td>
          <td>
            <button type="button" name="delete" class="btn-danger btn-sm delete" id="'.$row["sysId"].'">Delete</button>
            <button type="button" name="edit" class="btn-success btn-sm edit" id="'.$row["sysId"].'">Edit</button>
			
          </td>
        </tr>
      ';
	  
      }
	  
      $output .='</tbody>
              <tfoot>
                <tr>
                    <th>Question No.</th>
                    <th>Question</th>
                    <th>Marks</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
          </table>
          <script>
            $("#dataTable").DataTable({
              lengthMenu: [[5],[5]],
              show: false,
          });
        </script>';
      echo $output;
    }
    else
    {
      $output ='<table id="dataTable" class="table table-striped table-bordered">
        <thead>
                <tr>
                  <th>Question No.</th>
                  <th>Question</th>
                  <th>Marks</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
          <td colspan =3>No data available in table</td>          
          </tr>
          </tbody>
              <tfoot>
                <tr>
                    <th>Question No.</th>
                    <th>Question</th>
                    <th>Marks</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
          </table>
          <script>
            $("#dataTable").DataTable({
              lengthMenu: [[5],[5]],
              show: false,
          });
        </script>';
      echo $output;
    }		
}


elseif(isset($_POST['log9'])){
	$degreeCode = $_POST["degreeCode"];
	$sem = $_POST["sem"];
	$subjectCode = $_POST["subjectCode"];
	$paperStyle = $_POST["paperStyle"];


	$sql = "SELECT * FROM `tblpaperstyle` WHERE sysStatus = 'A' AND subjectCode = '$subjectCode'";
 	$result = mysqli_query($conn, $sql) or die("SQL query failed check chapter number");
 	//echo mysqli_num_rows($result);
 	
 	if (mysqli_num_rows($result) > 0)
 	{
 		while ($row = mysqli_fetch_array($result)) 
 		{
		 	$sql2 = "SELECT subjectCode, subjectName FROM `tblsubject` WHERE sysStatus = 'A' AND subjectCode = '$subjectCode'";
		 	$result2 = mysqli_query($conn, $sql2) or die("SQL query failed check chapter number");
		 	
		 	while ($row2 = mysqli_fetch_array($result2))
		 	{	
		 		$subcode = $row2['subjectCode'];
		 		$subname = $row2['subjectName'];
		 	}

		 	$_SESSION["subjectCode"] = $subcode;
		 	
	 		//echo "<script>alert('Data Found');</script>"; 
	 		$output = "
		  			<table id='dataTable' class='table table-striped table-bordered'>
		              <tbody>

		                  <!-- Subject -->
		                  <tr>
		                     <td colspan='3'><p id='title' class='fs-5 fw-bold text-center text-decoration-underline'>".$subcode.": ".$subname."</p></td>
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
		                        <select id='chap-1a' name='chap-1a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['1a'].">Chapter ".$row['1a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m1a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q1 b.</p></td>
		                     <td>
		                        <select id='chap-1b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['1b'].">Chapter ".$row['1b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m1b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q1 c.</p></td>
		                     <td>
		                        <select id='chap-1c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['1c'].">Chapter ".$row['1c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m1c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td>
		                     </td> 
		                  </tr>

		                  <!-- Question 2 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-2 Answer the following questions. (Any Three) &emsp; [15 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 a.</p></td>
		                     <td>
		                        <select id='chap-2a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['2a'].">Chapter ".$row['2a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m2a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 b.</p></td>
		                     <td>
		                        <select id='chap-2b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['2b'].">Chapter ".$row['2b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m2b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 c.</p></td>
		                     <td>
		                        <select id='chap-2c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['2c'].">Chapter ".$row['2c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m2c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q2 d.</p></td>
		                     <td>
		                        <select id='chap-2d' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['2d'].">Chapter ".$row['2d']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m2d' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>

		                  <!-- Question 3 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-3 Answer the following questions. (Any Two) &emsp; [14 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 a.</p></td>
		                     <td>
		                        <select id='chap-3a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['3a'].">Chapter ".$row['3a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m3a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 b.</p></td>
		                     <td>
		                        <select id='chap-3b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['3b'].">Chapter ".$row['3b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m3b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q3 c.</p></td>
		                     <td>
		                        <select id='chap-3c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['3c'].">Chapter ".$row['3c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m3c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
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
		                        <select id='chap-4a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['4a'].">Chapter ".$row['4a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m4a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q4 b.</p></td>
		                     <td>
		                        <select id='chap-4b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['4b'].">Chapter ".$row['4b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m4b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q4 c.</p></td>
		                     <td>
		                        <select id='chap-4c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['4c'].">Chapter ".$row['4c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m4c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='2'>[2 Marks]</option>
		                        </select>
		                     </td>
		                     </td> 
		                  </tr>

		                  <!-- Question 2 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-5 Answer the following questions. (Any Three) &emsp; [15 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 a.</p></td>
		                     <td>
		                        <select id='chap-5a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['5a'].">Chapter ".$row['5a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m5a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 b.</p></td>
		                     <td>
		                        <select id='chap-5b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['5b'].">Chapter ".$row['5b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m5b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 c.</p></td>
		                     <td>
		                        <select id='chap-5c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['5c'].">Chapter ".$row['5c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m5c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q5 d.</p></td>
		                     <td>
		                        <select id='chap-5d' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['5d'].">Chapter ".$row['5d']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m5d' class='form-select' aria-label='Default select example' disabled>
		                          <option value='5'>[5 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>

		                  <!-- Question 3 -->
		                  <tr>
		                     <td colspan='3'><p class='fs-6 fw-bold fst-italic'>Q-6 Answer the following questions. (Any Two) &emsp; [14 Marks]</p></td>
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 a.</p></td>
		                     <td>
		                        <select id='chap-6a' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['6a'].">Chapter ".$row['6a']."</option>
		                        </select>
		                     </td>
		                     <td>
		                      <select id='m6a' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 b.</p></td>
		                     <td>
		                        <select id='chap-6b' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['6b'].">Chapter ".$row['6b']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m6b' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td><p class='fs-6'>Q6 c.</p></td>
		                     <td>
		                        <select id='chap-6c' class='form-select' aria-label='Default select example' disabled>
		                          <option value=".$row['6c'].">Chapter ".$row['6c']."</option>
		                        </select>
		                     </td>
		                     <td>
		                       <select id='m6c' class='form-select' aria-label='Default select example' disabled>
		                          <option value='7'>[7 Marks]</option>
		                        </select>
		                     </td> 
		                  </tr>
		                  <tr>
		                     <td colspan='3'><p class='fs-4 fw-bold text-center'>******</p></td> 
		                  </tr>
		                  <tr>
		                     <td colspan='3' align='center'><button type='button' id='createPaper' class='btn btn-primary'>Create Paper</button></td> 
		                  </tr>
		              </tbody>
		        </table>
		        
		        <script>
		        	$(document).ready(function(){
      				$('#createPaper').on('click',function(e){
				        
				        //section 1
				        var q1a= $('#chap-1a').val();
				        var q1b= $('#chap-1b').val();
				        var q1c= $('#chap-1c').val(); 
				        
				        var q2a= $('#chap-2a').val();
				        var q2b= $('#chap-2b').val();
				        var q2c= $('#chap-2c').val();
				        var q2d= $('#chap-2d').val();

				        var q3a= $('#chap-3a').val();
				        var q3b= $('#chap-3b').val();
				        var q3c= $('#chap-3c').val();

				        //section 2
				        var q4a= $('#chap-4a').val();
				        var q4b= $('#chap-4b').val();
				        var q4c= $('#chap-4c').val();

				        var q5a= $('#chap-5a').val();
				        var q5b= $('#chap-5b').val();
				        var q5c= $('#chap-5c').val();
				        var q5d= $('#chap-5d').val();

				        var q6a= $('#chap-6a').val();
				        var q6b= $('#chap-6b').val();
				        var q6c= $('#chap-6c').val();

				        //sec1 marks
				        var m1a= $('#m1a').val();
				        var m1b= $('#m1b').val();
				        var m1c= $('#m1c').val();

				        var m2a= $('#m2a').val();
				        var m2b= $('#m2b').val();
				        var m2c= $('#m2c').val();
				        var m2d= $('#m2d').val();

				        var m3a= $('#m3a').val();
				        var m3b= $('#m3b').val();
				        var m3c= $('#m3c').val();

				        //sec2 marks
				        var m4a= $('#m4a').val();
				        var m4b= $('#m4b').val();
				        var m4c= $('#m4c').val();

				        var m5a= $('#m5a').val();
				        var m5b= $('#m5b').val();
				        var m5c= $('#m5c').val();
				        var m5d= $('#m5d').val();

				        var m6a= $('#m6a').val();
				        var m6b= $('#m6b').val();
				        var m6c= $('#m6c').val();

				        //alert('Hello World! Welcome'+ ' ' + q1a); 

				        $.ajax({
				          type : 'POST',
				          url : 'config.php',
				          data : {q1a: q1a, q1b: q1b, q1c: q1c, q2a: q2a, q2b: q2b, q2c: q2c, q2d: q2d, q3a: q3a, q3b: q3b, q3c: q3c, q4a: q4a, q4b: q4b, q4c: q4c, q5a: q5a, q5b: q5b, q5c: q5c, q5d: q5d, q6a: q6a, q6b: q6b, q6c: q6c, m1a: m1a, m1b: m1b, m1c: m1c, m2a: m2a, m2b: m2b, m2c: m2c, m2d: m2d, m3a: m3a, m3b: m3b, m3c: m3c, m4a: m4a, m4b: m4b, m4c: m4c, m5a: m5a, m5b: m5b, m5c: m5c, m5d: m5d, m6a: m6a, m6b: m6b, m6c: m6c, log12: 1},
				          success:function(data){
				            $('#main').html(data);
				          }
				        });

				      });
				    });
		        </script>
		  	";
	  	}	  
 	}
 	else
 	{
 		echo "<script>alert('Available Soon');</script>";
 	}
  		
  	echo $output;	
}
elseif(isset($_POST['log10'])){
	echo "<script>alert('Available Soon');</script>";
}
elseif(isset($_POST['log11'])){
	echo "";
}

elseif(isset($_POST['log12'])){
	$sysId = $_POST["sysId"];
	$sql ="UPDATE tblquestion SET sysStatus = 'D' WHERE sysId = '$sysId';";
	if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Question deleted')</script>";
    }
    else
    {
    	echo "Query Failed";
    }
}
elseif(isset($_POST['log13'])){
	session_start();
	$_SESSION["sysid"] = $_POST["sysId"];
	
}


?>		