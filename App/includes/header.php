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
  <div class="resizePage">

    <div class="index-header">
      <?php require 'profile.php'; ?>
    <img class="displayed" src="../assets/img/geanimeerd-logo.gif" width="160" height="130">
    <p class="sloganscript" id="slogan"></p>
  </div>
<<<<<<< HEAD


<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- <a href = "#" class="navbar-brand">Vlambeer</a> -->
    <button class="navbar-toggle" data-toggle="collapse" data-target = ".nav">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>


    <div class="collapse navbar-collapse nav">
  
<!--       <div class="navcolour">
                <div class="navborder">  -->

      <ul class="nav navbar-nav">

        <li><a href="../store/index.php">HOME</a></li>
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle = "dropdown">GAMES <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../store/games/pcGames.php">PC</a></li>
            <li><a href="../store/games/iOSgames.php">iOS</a></li>
            <li><a href="../store/games/vitaGames.php">VITA</a></li>
          </ul>
        </li>
        <li><a href="../store/contact.php">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--   <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            



<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>




          <ul>
=======
  <nav>
    <div class="navcolour">
      <div class="navborder">
        <ul>
>>>>>>> parent of 6c30c53... responsive
          <li><a href="../store/index.php">HOME</a></li>
          <li><a href="../store/games/index.php">GAMES</a>
            <ul>
              <li><a href="../store/games/pcGames.php">PC</a></li>
              <li><a href="../store/games/iOSgames.php">iOS</a></li>
              <li><a href="../store/games/vitaGames.php">VITA</a></li>
            </ul></li>
          <li><a href="../store/contact.php">CONTACT</a></li>
          <li><form class="search-form"><input type="submit" name="search" value="" class="search-btn"><input type="text" placeholder="Search.."></form></li>
        </ul>
<<<<<<< HEAD

        </div>
      </div>   
  </nav> -->


        <!-- Collect the nav links, forms, and other content for toggling -->

<!-- /.navbar-collapse -->


<!--       </div>
    </div> -->
=======
      </div>
    </div>    
  </nav>
>>>>>>> parent of 6c30c53... responsive
