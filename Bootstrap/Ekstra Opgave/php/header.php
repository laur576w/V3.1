<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!--stylesheet-->
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <title>Bootstrap</title>

  <!-- CSS-files and JavaScript-files currently in version 5.0 -->

</head>

<body>

  <header>


    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-start">


        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Wisdom Pet Medicine</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Our doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Testimonials</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">treatments</a>
              <ul class="dropdown-menu">
                <li><a href="#" class="dropdown-item">in-house diagnostics</a></li>
                <li><a href="#" class="dropdown-item">surgery and dental services</a></li>
                <li><a href="#" class="dropdown-item">behavioral consultation</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <?php
  //bringing the banner 
    include "./php/main-banner.php"
    ?>


<main class="container-md py-4">