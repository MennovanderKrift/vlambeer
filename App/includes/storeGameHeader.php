<?php
  session_start();
  require '../../config/Database.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <title>Vlambeer | Store</title>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">  
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <script src="../../assets/js/jquery-1.11.0.min.js"></script>
  
<script src="../../assets/js/lightbox.min.js"></script>
  <meta charset="UTF-8">
  <meta name="description" content="Vlambeer webstore">
  <meta name="keywords" content="vlambeer, games, action, schooter, shirt, webshop">
  <meta name="author" content="Mike Oerlemans, Koen de Bont, Friso Kin, Regilio Dielemans, Menno van der Krift, Daniel van Bavel">
</head>
<body>
    <div class="index-header">
    <img class="displayed" src="../../assets/img/logo.png" alt="">
    <p class="sloganscript" id="slogan"></p>
  </div>
  <nav>
    <div class="navcolour">
      <div class="navborder">
        <ul>
        <li><a href="../index.php">HOME</a></li>
        <li><a href="#">GAMES</a>
          <ul>
            <li><a href="#">PC</a></li>
            <li><a href="#">iOS</a></li>
            <li><a href="#">VITA</a></li>
          </ul></li>
        <li><a href="#">MERCHANDISE</a></li>
        <li><a href="#">MUSIC</a></li>
        <li><a href="#">CONTACT</a></li>
        </ul>
      </div>
    </div>    
  </nav>