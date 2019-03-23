<?php 

require_once 'db_connect.php';

if($_POST) {
   $rname = $_POST['resname'];
   $rphone = $_POST['restelephone'];
   $rtype = $_POST['type'];
    $rdesc = $_POST['resdescription'];
     $raddress = $_POST['resaddress'];
   $rimg = $_POST['resimg'];
   $rweb = $_POST['resweb'];
         


   $sql = "INSERT INTO restaurant(resname,restelephone,restype,resdescription,resaddress,resweb,resimg) VALUES ('$rname',$rphone,$rtype,'$rdesc','$raddress','$rweb','$rimg')";
   if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>";
       echo "<a href='../res_create.php'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error " . $sql . ' ' . $conn->conn_error;
   }

   $conn->close();
}

?>