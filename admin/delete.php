
<?php 
error_reporting(0);
session_start();
$c=mysqli_connect("localhost","root","");
//for fetching we have established the mysql connection
if($c){
//here we have selected the database on which we want to perform the operations

    mysqli_select_db($c,"pgen");
    //from ajax

if(isset($_POST['log7'])){

	$sysId = $_POST["sysId"];
//Here we have implemented the logic og delete degree 
//but we are performing the update operation,we are changing the status from A to D
	$sql ="UPDATE tbldegree SET sysStatus = 'D' WHERE sysId = '".$sysId." '";
    
	if(mysqli_query($c,$sql))
    {
        echo "Degree Deleted";
    }
    else
    {
    	echo "Query Failed";
    }
}
    
    


}




?>
