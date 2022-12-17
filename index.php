<?php
session_start();
if (isset($_SESSION['user_name_temp'])) {
   echo '<script type="text/javascript">
      alert("Chào mừng ' . $_SESSION['user_name'] . ' đã trở lại")</script>';
   unset($_SESSION['user_name_temp']);
}
if (isset($_SESSION['search_flight'])) {
   unset($_SESSION['search_flight']);
   unset($_SESSION['flight_valid']);
}
if (!isset($_SESSION['get_all_plane_name'])) {
   require_once("api/get-all-plane.php");
 }
 if (!isset($_SESSION['all_src'])) {
   require_once("api/get-all-des-src.php");
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>TanPhong Airline</title>
   <!-- Style -->
   <link rel="icon" href="../images/logovanthao.png" type="image/gif" />
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

   <!-- Library Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<style>
   input[type="date"]::-webkit-calendar-picker-indicator {
      cursor: pointer;
      border-radius: 4px;
      margin-right: 2px;
      opacity: 0.6;
      filter: invert(0.8);
   }

   input[type="date"]::-webkit-calendar-picker-indicator:hover {
      opacity: 1
   }

   .select2-selection {
      border-color: white !important;
      background-color: #00000f !important;
      height: 40px !important;
      padding: 4px
   }

   .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #fff !important;
   }
</style>
<!-- body -->

<body class="main-layout">
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.php"><img src="images/logovanthao.png" alt="#" /></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href="index.php">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-airplane" viewBox="0 0 16 16">
                                    <path
                                       d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z" />
                                 </svg>
                                 Chuyến bay
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="search_ticket.php">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-ticket" viewBox="0 0 16 16">
                                    <path
                                       d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                                 </svg>
                                 Vé đã đặt</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="help.html">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                       d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                 </svg>
                                 Trợ giúp</a>
                           </li>
                           <?php
                              if (isset($_SESSION['user_id'])) {
                                 echo '
                                 <li class="nav-item">
                                          <a class="nav-link" id="profile" href="user/profile.php"> <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                        </svg></i> Edit Profile</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="login.php"> <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg></i> Đăng xuất</a>
                                       </li>
                                       ';
                              } else {
                                 echo '<li class="nav-item">
                                 <a class="nav-link" href="login.php"> <i class="fa fa-user"></i> Đăng nhập</a>
                              </li>';
                              }
                              ?>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>
   <section class="banner_main">
      <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="images/banner1.jpg" alt="First slide">
               <div class="container">
               </div>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
            </div>
         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
         </a>
      </div>
      <div class="booking_ocline">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-8">
                  <div class="book_room">
                     <h1>TÌM KIẾM CHUYẾN BAY</h1>
                     <div class="container">
                        <form action="user/index.php" method="post" id="form-search-flight">
                           <div
                              class="mb-4 form-group border-bottom d-flex align-items-center justify-content-between text-light">
                              <label class="option my-sm-0 my-2">
                                 <input type="radio" name="radio_type" value="round-trip" id="round-trip" checked> Khứ
                                 hồi
                                 <span class="checkmark"></span>
                              </label>
                              <label class="option my-sm-0 my-2">
                                 <input type="radio" name="radio_type" value="one-way" id="one-way"> Một chiều
                                 <span class="checkmark"></span>
                              </label>
                              <div class="d-flex align-items-center my-sm-0 my-2">
                                 <a href="#" class="text-decoration-none text-light">
                                    Vui lòng nhập thông tin
                                 </a>
                              </div>
                           </div>

                           <div class="mb-4 form-group d-sm-flex margin text-light">
                              <select class="js-example-basic-single" name="source" style="width: 100%">
                                 <option value="">Điểm đi</option>
                                 <?php
                                       foreach($_SESSION['all_src'] as $value){
                                       echo '<option value="'.$value.'">'.$value.'';
                                       }
                                    ?>
                              </select>
                           </div>
                           <div class="mb-4 form-group d-sm-flex margin text-light">
                              <select class="js-example-basic-single " name="destination" style="width: 100%">
                                 <option value="">Điểm đến</option>
                                 <?php
                                       foreach($_SESSION['all_des'] as $value){
                                       echo '<option value="'.$value.'">'.$value.'';
                                       }
                                    ?>
                              </select>
                           </div>
                           <script>
                              $('.js-example-basic-single').select2({
                                 theme: 'bootstrap-5'
                              });
                           </script>

                           <div
                              class="mb-4 form-group border-bottom d-flex align-items-center justify-content-between text-light">
                              <label class="d-flex align-items-center my-sm-0 my-2 col-6 text-light" for="depart">
                                 Ngày đi
                              </label>
                              <label class="d-flex align-items-center my-sm-0 my-2 col-6 text-light " for="return"
                                 id="label-return">
                                 Ngày Về
                              </label>
                           </div>
                           <div class="mb-4 form-group d-sm-flex margin">
                              <div
                                 class="d-flex align-items-center flex-fill me-sm1 my-sm-0 border-bottom position-relative">
                                 <input type="text" name="date_depart" id="depart" required placeholder="mm/dd/yyyy"
                                    class="form-control" style="background-color:#000000c7;border: 0;color: white;">
                              </div>
                              <div
                                 class="d-flex align-items-center flex-fill ms-sm-1 my-sm-0 my-4 border-bottom position-relative"
                                 id="date-round-trip">
                                 <input type="text" name="date_return" id="return" required placeholder="mm/dd/yyyy"
                                    class="form-control" style="background-color:#000000c7;border: 0; color: white;">
                              </div>
                           </div>
                           <div class="mb-4 form-group border-bottom d-flex align-items-center position-relative">
                              <input type="number" name="num_passenger" required placeholder="Số hành khách"
                                 class="form-control" style="background-color:#000000c7;border: 0;color: white;">
                           </div>
                           <div class="form-group my-2 d-flex justify-content-center">
                              <button
                                 class="btn btn-danger rounded-0 d-flex justify-content-center text-center p-3 col-12"
                                 id="find-flight" type="submit">Tìm kiếm chuyến bay
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h3>Menu Link</h3>
                  <ul class="link_menu">
                     <li><a href="index.php" class="active">Chuyến bay</a></li>
                     <br>
                     <li><a href="about.html"> Giới thiệu</a></li>
                     <br>
                     <li><a href="search_ticket.html">Kiểm tra vé</a></li>
                     <br>
                     <li><a href="help.html">Trợ giúp</a></li>
                     <br>
                  </ul>
               </div>
               <div class=" col-md-6">
                  <h3>Contact US</h3>
                  <ul class="conta">
                     <li><i class="fa fa-map-marker" aria-hidden="true"></i> 78 Tân Phong, Nguyễn Hữu Thọ, Quận 7, TP
                        HCM</li>
                     <li><i class="fa fa-mobile" aria-hidden="true"></i> 091-145-2692</li>
                     <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">vanthao000009@gmail.com</a></li>
                  </ul>
                  <ul class="social_icon">
                     <li><a href="https://www.facebook.com/vanthao.tran.101102"><i class="fa fa-facebook"
                              aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.youtube.com/channel/UC9BFLA6k6rDSVvYFb6Osnng"><i
                              class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <p>
                        © 2022 All Rights Reserved. Design by vanthaoprovip
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <script>
      $(document).ready(function () {
         $("#depart").datepicker({ minDate: new Date() });
         $("#return").datepicker({ minDate: new Date() });
         $('input[type=radio][name=radio_type]').change(function () {
            if (this.value == 'round-trip') {
               $('#return').val("");
               $('#date-round-trip').css('visibility', 'visible');
               $('#label-return').css('visibility', 'visible');
            }
            else if (this.value == 'one-way') {
               $('#return').val("2002-01-01");
               $('#date-round-trip').css('visibility', 'hidden');
               $('#label-return').css('visibility', 'hidden');
            }
         });

      });
      $('.js-example-basic-single').select2();
   </script>
</body>
</html>