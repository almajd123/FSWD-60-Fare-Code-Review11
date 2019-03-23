<?php 

require_once 'db_connect.php';

if($_POST) {
   $fpname = $_POST['fpname'];
   $fpaddress = $_POST['fpaddress'];
   $fptype = $_POST['fptype'];
    $fpdesc = $_POST['fpdescription'];
   $fpimg = $_POST['fpimg'];
   $fpweb = $_POST['fpweb'];

   $id = $_POST['id'];

   echo $sql = "UPDATE famousplace SET  fpname ='$fpname', fpaddress = '$fpaddress',fptype =$fptype,fpdescription ='$fpdesc',fpweb ='$fpweb', fpimg = '$fpimg' WHERE fplaceID = {$id}";
   if($conn->query($sql) === TRUE) {
       echo "<p>Successfully Updated</p>";
       echo "<a href='../fplace_update.php?id=".$id."'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error while updating record : ". $conn ->error;
   }

   $conn->close();

}

?>