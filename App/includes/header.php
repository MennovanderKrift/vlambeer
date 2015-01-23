<?php
  session_start();
  require '../config/Database.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Vlambeer | Store</title>
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">  
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/sortable.css">
  <script src="../assets/js/jquery-1.11.0.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content=width=device-width, initial-scale="1.0">
  <meta name="description" content="Vlambeer webstore">
  <meta name="keywords" content="vlambeer, games, action, schooter, shirt, webshop">
  <meta name="author" content="Mike Oerlemans, Koen de Bont, Friso Kin, Regilio Dielemans, Menno van der Krift, Daniel van Bavel, Jan, Rick">

  <!-- Pagination js script -->
  <link rel="stylesheet" href="../assets/css/simplePagination.css">
  <script src="../assets/js/jquery.simplePagination.js" type="text/javascript"></script>
</head>
<body>
  

    <div class="index-header">
      <?php require 'profile.php'; ?>
    <img class="displayed" src="../assets/img/geanimeerd-logo.gif" width="160" height="130">
    <p class="sloganscript" id="slogan"></p>
  </div>
  <nav>
    <div class="navcolour">
      <div class="navborder">
        <ul>
          <li><a href="../store/index.php">HOME</a></li>
          <li><a href="#games">GAMES</a>
             <!-- <ul>
              <li><a href="../store/games/pcGames.php">PC</a></li>
              <li><a href="../store/games/iOSgames.php">iOS</a></li>
              <li><a href="../store/games/vitaGames.php">VITA</a></li>
            </ul> --> </li>
          <li><a href="../store/contact.php">CONTACT</a></li>
          <li><form class="search-form"><input type="text" placeholder="Search.."></form></li>
        </ul>
        </div>
      </div>   
  </nav> 

