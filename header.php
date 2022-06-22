<!DOCTYPE html>
<html lang="en">
<style> 
  .logo {
      display: inline-block;
      vertical-align: top;
      width: 60px;
      height: 60px;
      margin-right: 0px;
      margin-top: 0px;
  }
  </style>
  <?php 
  include "switchlan.php";
  session_start();
	if (!isset($_SESSION['userid'])){
		$_SESSION['userid'] = 0;
		$_SESSION['username'] = "Login";
	}

  if ($_SESSION['lang'] == "en")  
      $hdStyle = "font-family: Phetsarath OT; font-size:12px;";
  else
      $hdStyle = "font-family: Phetsarath OT; font-size:14px;";
  ?>

  <head>
   
    <title>Poly Solutions</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <section>
      <nav class="navbar navbar-expand-lg" style="background-color:lightgreen;">
        <div class="container" id="div_Data">
          <a class="navbar-brand" href="index.php">
          <!--<img class="logo" src="images/logo2.jpeg"> -->
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item <?php echo $_SESSION["hotel"]; ?>">
                <a class="nav-link" href="hotelview.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['hotel'] ?></a>
              </li>
              <li class="nav-item <?php echo $_SESSION["guesthouse"]; ?>">
                <a class="nav-link" href="guesthouseview.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['guesthouse'] ?></a>
              </li>
              <li class="nav-item <?php echo $_SESSION["room"]; ?>">
                <a class="nav-link" href="roomview.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['room'] ?></a>
              </li>
               <li class="nav-item <?php echo $_SESSION["house"]; ?>">
                <a class="nav-link" href="houseview.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['house'] ?></a>
              </li>
              <li class="nav-item <?php echo $_SESSION["car"]; ?>">
                <a class="nav-link" href="carview.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['rentcar'] ?></a>
              </li>
              <li class="nav-item <?php echo $_SESSION["about"]; ?>">
                <a class="nav-link" href="aboutus.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['aboutus'] ?></a>
              </li>

              <li class="nav-item <?php echo $_SESSION["contact"]; ?>">
                <a class="nav-link" href="contact.php" style="<?php echo $hdStyle; ?>"><?php echo $lang['contactus'] ?></a>
              </li>

              <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="lblLoginStatus" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: Phetsarath OT; font-size:12px;"><?php echo $_SESSION['username']; ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" id="btnLogin" href="login.php" style="font-family: Phetsarath OT; font-size:12px;"><?php echo $lang['login'] ?></a>
                                <a class="dropdown-item" id="btnLogout" href="#" style="font-family: Phetsarath OT; font-size:12px;"><?php echo $lang['logout'] ?></a>
                            </div>
              </li>

              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary" onclick="location.href='index.php?lang=la'" style="<?php echo $hdStyle; ?>"><?php echo $lang['lang_la'] ?></button>
                <button type="button" class="btn btn-outline-primary" onclick="location.href='index.php?lang=en'" style="<?php echo $hdStyle; ?>"><?php echo $lang['lang_en'] ?></button>
              </div>

            </ul>

              </ul>
    
          </div>


        </div>
      </nav>
    </section>
 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script>
        $(document).ready(function () {
          var sessionUserId = "<?php echo $_SESSION['userid']; ?>";
          if(sessionUserId == 1){
            $("#btnLogin").hide();
            $("#btnLogout").show();
          }else{
            $("#btnLogin").show();
            $("#btnLogout").hide();
          }

          $('#btnLogout').on('click', function() {
            location.href = "Logout.php?";
          });
        });
    </script>

 </body>
</html>
 