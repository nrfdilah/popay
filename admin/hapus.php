<?php
// include database connection file
require("../db/database.php");

$mysqli = new Database();
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$mysqli->query("DELETE FROM user WHERE id = $id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>