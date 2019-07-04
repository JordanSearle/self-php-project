<?php
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Rubik" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
  <title><?= isset($title) ? $title : "I\'m Jordan Searle"?></title>
</head>
<body>
 <div id="mySidebar" class="sidebar">
    <a href="index.html">HOME</a>
    <a href="About.html">ABOUT</a>
    <a href="https://github.com/JordanSearle" target="_blank">PROJECTS</a>
    <a href="#"class="dropdown-btn" onclick="drpDown()">CLIENTS
    <i class="fa fa-caret-down"></i>
  </a>
  <div class="dropdown-container">
    <a href="http://mlbrickworkandpropertyservices.co.uk/" target="_blank">M&L Brickwork</a>
    <a href="http://foweydarts.moonfruit.com/" target="_blank">Fowey Darts</a>
  </div>
    <a href="#">CONTACT</a>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="btn btn-dark btn-lg mr-5 p-3" onclick="nav()" ><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="index.html"><button type="button" class="btn btn-dark btn-lg bg-brand "><img src="http://imjsearle.com/favicon/android-chrome-192x192.png"/> JORDAN SEARLE</button></a>
      <ul class="navbar-nav ml-auto flex-nowrap">
        <li class="nav-item">
        </li>
      </ul>
  </nav>
