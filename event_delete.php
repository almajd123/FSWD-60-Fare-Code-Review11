<?php 
session_start();

require_once 'actions/db_connect.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM events WHERE eventID = {$id}";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Delete The Event</title>
</head>
<body>

<h3>Do you really want to delete this user?</h3>
<form action="actions/a_eventdelete.php" method="post">

   <input type="hidden" name="id" value="<?php echo $data['eventID'] ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="controlpanel.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
} 
?>