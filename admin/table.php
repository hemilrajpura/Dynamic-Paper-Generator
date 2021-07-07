
<?php 

$c=mysqli_connect("localhost","root","");
if($c)
{
    mysqli_select_db($c,"pgen");
    if(isset($_POST['log1']))
    {

        $degcode = $_POST['degCode'];
        $sem = $_POST['sem'];

              $output = '
              <p class="text-sm-start fw-bold" style="margin-top: 20px; text-align: center;">Subjects:</p>
                  <table class="table">
                      <thead>
                          <tr>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Degree Code</th>
                            <th scope="col">Sem</th>
                          </tr>
                      </thead>';

        

          $qry="select * from tblsubject where sysStatus = 'A' AND degreeCode ='".$degcode."' AND sem = '".$sem."'";

          $result=mysqli_query($c,$qry) or die("SQL query failed");

          if(mysqli_num_rows($result) > 0)
         {
              while($row = mysqli_fetch_assoc($result))
             {
                 $output .='<tr>
                    <th scope="row">'.$row['subjectCode'].'</th>
                    <td>'.$row['subjectName'].'</td>
                    <td>'.$row['degreeCode'].'</td>
                    <td>'.$row['sem'].'</td>
                    <td><button type="button" name="delete" class="btn-danger btn-sm delete" id="'.$row["sysID"].'">Delete</button></td>
                    </tr> ';
              }
              echo $output;
          }
          else
          {
            $output .='<tbody>
              <tr>
              <td colspan =3>No data available in table</td>          
              </tr>
              </tbody> </table>';
            echo $output;
          }
      }


      if(isset($_POST['log7']))
      {
          $sysId = $_POST["sysId"];
          echo $sysId;
          $sql ="UPDATE tblsubject SET sysStatus = 'D' WHERE sysID = '".$sysId."';";
          if(mysqli_query($c,$sql))
          {
            echo "Subject Deleted";
          }
          else
          {
            echo "Query Failed";
          }
      }
}
      ?>    
         
        
