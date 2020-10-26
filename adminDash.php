<?php
session_start();
require('dbHandler.php');
?>
<html lang ="en" dir="ltr">

<head>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel ="stylesheet" type="text/css" href="admin.css">
<title>Admin Dashboard</title>

</head>
<body>
  <div class ="container">
    <nav class ="navBar">
      <div class ="nav_icon" onclick="toggleSidebar()">
        <i class ="fa fa-bars"></i>
        </div>
        <div class ="navbar__left">
          <a href="#">Monthly Customers Data </a>
          <a href="#">Semesterly Customers Data </a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class ="fa fa-search"></i>
          </a>
          <a href ="#">
            <i class ="fa fa-clock-o"></i>
          </a>
          <a href ="#">
            <img width ="30" src ="mypic2.jpg" alt =" "/>

          </a>
        </div>
    </nav>
    <main>
      <div class ="main__container">
        <div class ="main__title">
          <img src ="newHavenDT.jpg" alt="">
          <div class ="main__greeting">
            <h1>Hello Khaled</h1>
            <p>Welcome to your dashboard</p>
        </div>
      </div>
      <div class ="main__cards">
        <div class ="card">
          <i class="fa fa-user-o fa-2x text-lightblue"></i>
          <div class ="card__inner">
            <p class ="text-primary-p">Total Monthly Customers</p>
            <span class="font-bold text-title">20</span>
          </div>
        </div>
        <div class ="card">
          <i class="fa fa-user-o fa-2x text-green"></i>
          <div class ="card__inner">
            <p class ="text-primary-p">Total Semesterly Customers</p>
            <span class="font-bold text-title">50</span>
          </div>
        </div>
      </div>
      <div class ="charts">
        <div class ="charts__left">
          <div class="charts__left__title">
            <div>
              <h1>
                Revenue Data
              </h1>
              <p>Year to date</p>
            </div>
            <i class ="fa fa-usd"></i>
          </div>
          <div id ="apex1">

          </div>
        </div>
        <div class = "charts__right">
          <div class ="charts__right__title">
            <div>
            <h1>Monthly Data</h1>
            <p>Monthly Customers</p>
          </div>
              <i class ="fa fa-usd"></i>
          </div>
          <div class ="charts__right__cards">
            <div class ="card1">
              <h1>Revenue</h1>
              <p>$20,000</p>
            </div>
            <div class ="card2">
              <h1>Number of Customers</h1>
              <p>30</p>
            </div>
            <div class ="card3">
              <h1>Number of vehicles</h1>
              <p>40</p>
            </div>
          </div><br>
          <div class ="charts__right__title">
            <div>
            <h1>Semesterly Data</h1>
            <p>Semesterly Customers</p>
          </div>
              <i class ="fa fa-usd"></i>
          </div>
          <div class ="charts__right__cards">
            <div class ="card1">
              <h1>Revenue</h1>
              <p>$50,000</p>
            </div>
            <div class ="card2">
              <h1>Number of Customers</h1>
              <p>50</p>
            </div>
            <div class ="card3">
              <h1>Number of vehicles</h1>
              <p>60</p>
            </div>
          </div>

        </div>
      </div>
    </main>
    <div id ="sidebar">
      <div class ="sidebar__title">
        <div class ="sidebar__img">
          <img src ="milkyWay.jpg" alt="">
          <h1>Expert Parking</h1>
        </div>
        <i class ="fa fa-times" id ="sideBarIcon" onclick="closeSideBar"></i>
      </div>

    </div>
    <div class ="sidebar__menu">
    <div class ="sidebar__link active_menu_link">
      <i class ="fa fa-home"></i>
      <a href="#">My Dashboard</a>
    </div>
    <h2>Admin Activities</h2>
    <div class="sidebar__link">
      <i class="fa fa-database"></i>
      <a href="manageCustomers.php">Manage Customer Data</a>
    </div>

    <div class="sidebar__link">
      <i class="fa fa-cog"></i>
      <a href="#">Dash Settings</a>
    </div>

    <div class="sidebar__logout">
      <i class="fa fa-power-off"></i>
      <a href="logout.php">Log Off</a>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src ="adminDash.js"></script>
</body>
</html>
