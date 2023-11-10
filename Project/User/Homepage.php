<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Rubber House</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/tooplate-artxibition.css">
<!--

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

--><style>
    .rate-subtitle{
        color:white
    }
    .rate-title{
        color: black !important;
    font-size: 26px !important;

    }
    
</style>
<style>
.dropbtn {
  /* background-color: #04AA6D;
  color: white; */
  /* padding: 16px; */
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 10px;
  margin-bottom:10px;
  text-decoration: none;
  display: block;
}

/* .dropdown-content a:hover {background-color: #ddd;} */

.dropdown:hover .dropdown-content {display: block;}

/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
</style>
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
  
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a class="logo" style="font-family: auto;font-size: 38px;">Rubber <em>Hub</em></a>                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="Homepage.php" >Home</a></li>
                            <li><a href="MyProfile.php">Profile</a></li>
                            <li><a href="Complaint.php">Complaint</a></li>
                            <!-- <li><a href="WorkerRegistration.php">Worker Registration</a></li>  -->
                            <!-- <li><a href="Logout.php">Logout</a></li>  -->
                            <li>
                                <div class="dropdown">
                                    <a class="dropbtn">Search</a>
                                    <div class="dropdown-content">
                                        <a href="SearchMarket.php">Market</a>
                                        <a href="SearchWorker.php">Worker</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <a class="dropbtn">Others</a>
                                    <div class="dropdown-content">
                                        <a href="ViewRequest.php">View Request</a>
                                        <a href="ViewSalesRequest.php">View Sales Request</a>
                                    </div>
                                </div>
                            </li>
                            <li><a href="../Guest/Login.php" >Logout</a></li>

                        </ul>    
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="main-banner">
    <?php
                  include("../Assets/Connection/Connection.php");
                  $selQry = "select * from tbl_rate where rate_date=curdate()";
                  $row=$conn->query($selQry);
                  if($data=$row->fetch_assoc())
                  {
                ?>
        <div class="counter-content">
            <ul>
                <li class="rate-title">Date<span class="rate-subtitle"><?php echo $data["rate_date"] ?></span></li>
                <li class="rate-title">Low<span class="rate-subtitle"><?php echo $data["rate_low"] ?></span></li>
                <li class="rate-title">Price<span class="rate-subtitle"><?php echo $data["rate_amount"] ?></span></li>
                <li class="rate-title">High<span class="rate-subtitle"><?php echo $data["rate_high"] ?></span></li>
            </ul>
        </div>
        <?php
                  }
                ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                     
                        <h6></h6>
                        <h2 style="font-family: none;">Marketing Of Rubber Items</h2>
                        <div class="main-white-button">
                            <!-- <a href="Sea">place order</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- *** Owl Carousel Items ***-->
    <div class="show-events-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-show-events owl-carousel">
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-01.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-02.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-03.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-04.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-01.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-02.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-03.jpg" alt=""></a> 
                        </div>
                        <div class="item">
                            <a href="event-details.html"><img src="../Assets/Template/Main/assets/images/show-events-04.jpg" alt=""></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- *** Footer *** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="address">
                        <h4> Address</h4>
                        <span>Meenakshy Sajan <br>Kollikattil(H),Kothamagalam<br>Ph:9807650964</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="Homepage.php" >Home</a></li>
                            <li><a href="MyProfile.php">Profile</a></li>
                            <li><a href="Complaint.php">Complaint</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="hours">
                        <h4>About Us</h4>
                        <ul>
                            <li>It is possible to dry rubber sheets within 48 hours compared to 72 hours to 5 days which is the normal time taken. </li>
                            <li>1000+ installations in 8 Years. We had successfully built more than 1000 Rubber houses inside Kerala</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <p class="copyright">Copyright 2023 Rubber Hub
                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="sub-footer">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="logo"><span>Rubber<em>Hub</em></span></div>
                            </div>
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-3">
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../Assets/Template/Main/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../Assets/Template/Main/assets/js/popper.js"></script>
    <script src="../Assets/Template/Main/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../Assets/Template/Main/assets/js/scrollreveal.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/waypoints.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/jquery.counterup.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/imgfix.min.js"></script> 
    <script src="../Assets/Template/Main/assets/js/mixitup.js"></script> 
    <script src="../Assets/Template/Main/assets/js/accordions.js"></script>
    <script src="../Assets/Template/Main/assets/js/owl-carousel.js"></script>
    
    <!-- Global Init -->
    <script src="../Assets/Template/Main/assets/js/custom.js"></script>

  </body>
</html>