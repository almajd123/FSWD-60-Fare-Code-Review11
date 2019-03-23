<?php require_once 'actions/db_connect.php'; ?>

 <?php
      session_start();     
?>
<!DOCTYPE html>
<html>
<head>
	<title>Place</title>

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
   <legend>Add The Place</legend>
   <form action="actions/a_fpcreate.php" method="post">
     <table cellspacing="0" cellpadding="0">
      <div class="form-group">
        <label class="control-label col-sm-2">Place Name</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" name="fpname">
        </div>
      </div>
         <div class="form-group">
 <label class="control-label col-sm-2" for="pwd">Address</label>
   <div class="col-sm-10">          
     <input name="text" class="form control" name="fpaddress">  
   </div>
 </div>
      <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Place Type</label>
    <div class="col-sm-10">          
     <select name="fptype" >     
       <option value="1">historical site</option>
       <option value="2">museum</option>
       <option value="3">must_see</option>
     </select>  
  </div>
  </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Description</label>
        <div class="col-sm-10">          
         <input type="text" class="form-control"  name="fpdescription">     
       </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">website</label>
      <div class="col-sm-10">          
        <input type="" class="form-control" placeholder="https://examplelink" name="fpweb">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Image</label>
      <div class="col-sm-10">          
        <input type="" class="form-control" placeholder="https://examplelink" name="fpimg">
      </div>
    </div>

    <tr>
     <td><button type="submit">ADD</button></td>
     <td><a href="controlpanel.php"><button type="button">Back</button></a></td>
   </tr>
 </table>
</form>

</fieldset>

</body>
</html>
	<?php ob_end_flush(); ?>