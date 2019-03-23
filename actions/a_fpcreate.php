<?php 

require_once 'db_connect.php';

if($_POST) {
   $fpname = $_POST['fpname'];
   $fpaddress = $_POST['fpaddress'];
   $fptype = $_POST['fptype'];
    $fpdesc = $_POST['fpdescription'];
   $fpimg = $_POST['fpimg'];
   $fpweb = $_POST['fpweb'];
         


   $sql = "INSERT INTO famousplace(fpname,fpaddress,fptype,fpdescription,fpweb,fpimg) VALUES ('$fpname','$fpaddress',$fptype,'$fpdesc','$fpweb','$fpimg')";
   if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>";
       echo "<a href='../famousplace_create.php'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error " . $sql . ' ' . $conn->conn_error;
   }

   $conn->close();
}

?>