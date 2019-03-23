<?php 

 ob_start();
session_start();

require_once 'actions/db_connect.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM restaurant WHERE resID = {$id}";
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title>Update The Data</title>

   <style type="text/css">
       fieldset {
           margin: auto;
           margin-top: 100px;
           width: 50%;
       }

       table tr th {
           padding-top: 20px;
       }
   </style>

</head>
<body>

  <fieldset>
   <legend>Update Data</legend>
   <form action="actions/a_resupdate.php" method="post">
     <table cellspacing="0" cellpadding="0">
      <div class="form-group">
        <label class="control-label col-sm-2">Restaurant Name</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" name="resname">
        </div>
      </div>
      
     <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Telephone</label>
    <div class="col-sm-10">          
     <input type="number" class="form-control"  name="restelephone">     
       </div>
     </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Restaurant Type</label>
    <div class="col-sm-10">          
     <select name="restype" >     
       <option value="1">viennese</option>
       <option value="2">chinese</option>
       <option value="3">syrien</option>
        <option value="3">indian</option>

     </select>  
  </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Restaurant Description</label>
    <div class="col-sm-10">          
     <input name="text" class="form control" name="resdescription">     
   </div>
 </div>
      <div class="form-group">
 <label class="control-label col-sm-2" for="pwd">Address</label>
   <div class="col-sm-10">          
     <input name="text" class="form control" name="resaddress">  
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2" for="pwd">Image URL</label>
  <div class="col-sm-10">          
    <input type="" class="form-control" placeholder="https://examplelink" name="resimg">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="pwd">Restaurant website</label>
  <div class="col-sm-10">          
    <input type="" class="form-control" placeholder="https://examplelink" name="resweb">
  </div>
</div>
<tr>  
               <input type="hidden" name="id" value="<?php echo $data['resID']?>" />
               <td><button type="submit">Save Changes</button></td>
               <td><a href="controlpanel.php"><button type="button">Back</button></a></td>
           </tr>
       </table>
   </form>

</fieldset>

</body>
</html>
<?php
} ob_end_flush();
?>