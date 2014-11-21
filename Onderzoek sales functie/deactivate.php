<?php
  require 'Database.php';

  $id = $_GET['id'];

  if ( isset($_GET['id']) ) {
    $sql = "UPDATE salesfunctie SET sale = 1 WHERE id = '$id'";
    $stmt = $db->query($sql);
    header('location: index.php');
  }
?>
