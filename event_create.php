<?php require_once 'actions/db_connect.php'; ?>

 <?php
      session_start();     
?>
<!DOCTYPE html>
<html>
<head>
	<title> Events</title>

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
   <legend>Add Event</legend>
   <form action="actions/a_eventcreate.php" method="post">
     <table cellspacing="0" cellpadding="0">
      <div class="form-group">
        <label class="control-label col-sm-2">Event Name</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" name="eventname">
        </div>
      </div>
      
     <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Event Date</label>
    <div class="col-sm-10">          
     <input type="date" class="form-control"  name="eventDate">     
       </div>
     </div>

       <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Event Time</label>
      <div class="col-sm-10">          
       <input type="time" class= "form-control" name="eventTime">     
  </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Price </label>
    <div class="col-sm-10">          
     <input name="number" class="form control" name="price">     
   </div>
 </div>
      <div class="form-group">
 <label class="control-label col-sm-2" for="pwd">location</label>
   <div class="col-sm-10">          
     <input name="text" class="form control" name="location">  
   </div>
 </div>
 <div class="form-group">
  <label class="control-label col-sm-2" for="pwd">Image URL</label>
  <div class="col-sm-10">          
    <input type="" class="form-control" placeholder="https://examplelink" name="eventimg">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="pwd">Event website</label>
  <div class="col-sm-10">          
    <input type="" class="form-control" placeholder="https://examplelink" name="eventweb">
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