<?php

// wish to check the username from a mysql db table
include('../db.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "delete from route where id='$id'";
 mysql_query( $sql);
}

?>