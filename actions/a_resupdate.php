<?php 

require_once 'db_connect.php';

if($_POST) {
   $rname = $_POST['resname'];
   $rphone = $_POST['restelephone'];
   $rtype = $_POST['restype'];
    $rdesc = $_POST['resdescription'];
     $raddress = $_POST['resaddress'];
   $rimg = $_POST['resimg'];
   $rweb = $_POST['resweb'];

   $id = $_POST['id'];

   echo $sql = "UPDATE restaurant SET  resname ='$resname', restelephone = $rphone,restype =$rtype,resdescription ='$rdesc', resaddress ='$raddress',resweb ='$rweb', resimg = '$rimg' WHERE resID = {$id}";
   if($conn->query($sql) === TRUE) {
       echo "<p>Successfully Updated</p>";
       echo "<a href='../resupdate.php?id=".$id."'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error while updating record : ". $conn ->error;
   }

   $conn->close();

}

?>