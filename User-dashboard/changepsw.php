<?php
session_start();
//$user = $_SESSION['sess_username'];
//$un = $_SESSION['sess_username'];
$uid = $_SESSION['sess_uid'];
$uuid = $_SESSION['sess_uid'];
if (!isset($_SESSION['sess_uid']) || $uid != $uuid) {
  header('location:http://localhost/Project/login.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Adarsha Hostel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>


  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
    .fa-eye-slash {
      color: #070c0a;
      top: -1.9rem;
      left: 37rem;
      margin-left: -25px;
      margin-top: -29px;
      position: relative;
      z-index: 2;
    }
  </style>

  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

  <script>
    function checkPassword(form) {
      var password1 = form.newpsw.value;
      var password2 = form.conpsw.value;

      // If Not same return False.	 
      if (password1 != password2) {
        alert("\nPassword did not match: Please try again...")
        return false;
      }
      // If same return True. 
      else {
        return true;
      }
    }
  </script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">

      <div class="logo">
        <a href="Homepg.html" class="simple-text logo-normal">
          <strong style="font-family: cursive;">Adarsha Hostel</strong>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="./changepsw.php">
            <i class="fas fa-key"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./room.php">
              <i class="fa fa-clipboard"></i>
              <p>Room Info</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./complaint.php">
              <i class="material-icons">feedback</i>
              <p>Complaints</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./access_log.php">
              <i class="material-icons">people</i>
              <p>User Access Logs</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <span class="navbar-brand">Change Password</span>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="user.php">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <?php
      $con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");

      $sql = mysqli_query($con, "SELECT * FROM userregistration WHERE ID='$uid'");
      while ($row = mysqli_fetch_assoc($sql)) {
        $passupdatetime = $row["pswUpdationTime"];
      }
      ?>
      <!--body-->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Change Password</h4>
                  <p class="card-category"> Last Submission Date : <?php echo $passupdatetime; ?></p>
                </div>
                <div class="card-body">
                  <form action="http://localhost/Project/User-dashboard/changing-password.php" method="POST" onSubmit="return checkPassword(this)" class="needs-validation" novalidate>
                    <div class="form-row ml-3 mr-3">
                      <div class="form-group col-md-12">
                        <label for="oldpsw" class="ml-1"><i class="fas fa-key mr-1"></i>Old Password</label>
                        <div class="form-group">
                          <input type="password" class="form-control" name="old_psw" id="oldpsw" minlength="8" maxlength="12" placeholder="Enter Old Password" minlength="3" maxlength="30" autocomplete="off" required>
                          <span toggle="#password-field" class="far fa-eye-slash toggle-oldpsw"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-row ml-3 mr-3">
                      <div class="form-group col-md-12">
                        <label for="newpsw" class="ml-1"><i class="fas fa-key mr-1"></i>New Password</label>
                        <div class="form-group">
                          <input type="password" class="form-control" name="new_psw" id="newpsw" minlength="8" maxlength="12" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or 12 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter New Password" autocomplete="off" required>
                          <span toggle="#password-field" class="far fa-eye-slash toggle-newpsw"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-row ml-3 mr-3">
                      <div class="form-group col-md-12">
                        <label for="conpsw" class="ml-1"><i class="fas fa-key mr-1"></i>Confirm Password</label>
                        <div class="form-group">
                          <input type="password" class="form-control" name="con_psw" id="conpsw" minlength="8" maxlength="12" placeholder="Re-Type Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or 12 characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" required>
                          <span toggle="#password-field" class="far fa-eye-slash toggle-conpsw"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-row ml-3">
                      <div class="col-md-6 col-sm-offset-2">
                        <input class="btn btn-primary" type="submit" name="submit" value="Change Password">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--footer-->
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="http://localhost/Project/Homepg.php">
                  <strong>Adarsha Hostel</strong>
                </a>
              </li>
              <li>
                <a href="http://localhost/Project/about.html">
                  About Us
                </a>
              </li>
              <li>
                  <a href="http://localhost/Project/terms.html">
                  Terms & Conditions
                  </a>
              </li>
              <li>
                <a href="http://localhost/Project/FAQ.html">
                  FAQ
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            © <script>
              document.write(new Date().getFullYear());
            </script>
            Copyright: All Rights Reserved
          </div>
        </div>
      </footer>
    </div>
  </div>


  <!--password show-->
  <script>
    $("body").on("click", ".toggle-oldpsw", function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      $(this).css({
        "color": "#070c0a",
        "top": "-1.9rem",
        "left": "37rem",
        "margin-left": "-25px",
        "margin-top": "-29px",
        "position": "relative",
        "z-index": "2"
      });
      var input = $("#oldpsw");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });
  </script>

  <!--password show-->
  <script>
    $("body").on("click", ".toggle-newpsw", function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      $(this).css({
        "color": "#070c0a",
        "top": "-1.9rem",
        "left": "37rem",
        "margin-left": "-25px",
        "margin-top": "-29px",
        "position": "relative",
        "z-index": "2"
      });
      var input = $("#newpsw");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });
  </script>


  <!--password show-->
  <script>
    $("body").on("click", ".toggle-conpsw", function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      $(this).css({
        "color": "#070c0a",
        "top": "-1.9rem",
        "left": "37rem",
        "margin-left": "-25px",
        "margin-top": "-29px",
        "position": "relative",
        "z-index": "2"
      });
      var input = $("#conpsw");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });
  </script>



  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>