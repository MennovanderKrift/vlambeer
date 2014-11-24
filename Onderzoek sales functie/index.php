<!DOCTYPE html>
<html>
<head>
  <title>Sales Functie</title>
</head>
<style>
* {
  margin: 0 auto;
  padding: 0 auto;
}
body {
  width: 80%;
  border: 1px solid black;
  border-bottom: 0px;
}
p {
  color:black;
  border-bottom: 1px solid black;
}
.insales {
  width: 100%;
  background-color: green;
}
.offsales {
  width: 100%;
  background-color: red;
}
</style>
<body>
<?php
  require 'Database.php';

  $sql = "SELECT * FROM salesfunctie WHERE sale = 0";
  $stmt = $db->query($sql);
  $queryinsales = $stmt->fetchAll(PDO::FETCH_OBJ);

  $sql2 = "SELECT * FROM salesfunctie WHERE sale = 1";
  $stmt2 = $db->query($sql2);
  $queryoffsales = $stmt2->fetchAll(PDO::FETCH_OBJ);
?>
  <div class="insales">
<?php
  foreach ($queryinsales as $queryinsales) {
    echo '<p class="bordertext">' . $queryinsales->voornaam . ' ' . $queryinsales->achternaam . ' ';
    echo '<a href="deactivate.php?id='. $queryinsales->id .'"><button>sales</button></a></p>';
  }
?>
  </div>

  <div class="offsales">
<?php
foreach ($queryoffsales as $queryoffsales) {
    echo '<p class="bordertext">' . $queryoffsales->voornaam . ' ' . $queryoffsales->achternaam . ' ';
    echo '<a href="activate.php?id='. $queryoffsales->id .'"><button>sales</button></a></p>';
  }
?>

</body>
</html>
