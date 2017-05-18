<?php
$link = mysqli_connect('ecdb.cdayvqtga1pg.ap-south-1.rds.amazonaws.com','ecadmin','ecpass123','ecDB',3306);

if(mysqli_connect_error()) {
  die("Could not connect to database");
}
?>
