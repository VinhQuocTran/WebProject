<?php
session_start();
ob_start();
if (!isset($_SESSION['is_admin'])) {
  header("Location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Trang quản lý chuyến bay</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Style -->
  <link rel="icon" href="../images/logovanthao.png" type="image/gif" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <style>
    .main {
      width: 50%;
      margin: 50px auto;
    }


    .has-search .form-control {
      padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
      position: absolute;
      z-index: 2;
      display: block;
      width: 2.375rem;
      height: 2.375rem;
      line-height: 2.375rem;
      text-align: center;
      pointer-events: none;
      color: #aaa;
    }
  </style>
</head>

<body>
  <header>
    <!-- header inner -->
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <a href="index.php"><img src="../images/logovanthao.png" alt="#" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
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
                      </svg> Chuyến bay</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="manage_user.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                          d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                      </svg> Khách hàng</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_ticket.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-ticket" viewBox="0 0 16 16">
                        <path
                          d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                      </svg>
                      Vé</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_ticket_is_sold.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-shop" viewBox="0 0 16 16">
                        <path
                          d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                      </svg>
                      Vé đã bán</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="manage_income.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        <path
                          d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                      </svg> Doanh thu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../login.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                      </svg> Đăng xuẩt</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="main">
    <div class="input-group">
      <input type="text" id="search" class="form-control" placeholder="Hãy nhập thông tin chuyến bay">
      <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="d-flex justify-content-end">
        <button class="btn btn-success text-light m-2" id="add-flight">Thêm chuyến bay</button>
      </div>
      <div class="table-responsive">
        <table class="table table-striped custom-table" id="table">
          <thead>
            <tr>
              <th scope="col">Mã chuyến</th>
              <th scope="col">Cất cánh</th>
              <th scope="col">Thời lượng</th>
              <th scope="col">Tên máy bay</th>
              <th scope="col">Ghế phổ thông</th>
              <th scope="col">Ghế thương gia</th>
              <th scope="col">Điểm đi</th>
              <th scope="col">Nơi cất cánh</th>
              <th scope="col">Điểm đến</th>
              <th scope="col">Nơi hạ cánh</th>
              <th scope="col" class="d-flex justify-content-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php require_once("../api/get-all-flight.php") ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!-- Model update filght -->
  <div class="modal" id="modal-edit-flight" tabindex="-1">
    <form action="../api/update-flight.php" method="post">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Chỉnh sửa thông tin chuyến bay</h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-2" style="display: none;">
              <input type="text" class="form-control col-6" name="flight_id" id="flight_id" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="time_take_off" class="m-2 col-6"> Cất cánh: </label>
              <input type="time" class="form-control col-6" name="time_take_off" placeholder="Nhập thời gian cất cánh"
                id="time_take_off" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="duration" class="m-2 col-6"> Thời lượng: </label>
              <input type="number" class="form-control col-6" name="duration" placeholder="Nhập thời lượng bay"
                id="duration" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
            <label for="plane_name" class="m-2 col-6"> Tên máy bay: </label>
            <select name="plane_name" class="p-2" id="plane_name" style="width: 470px;">
            <?php
                if (isset($_SESSION['get_all_plane_name'])) {
                  foreach ($_SESSION['get_all_plane_name'] as $value) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                  }
                }
              ?>
          </select>
            </div>

            <div class="input-group mb-2">
              <label for="seat_economy" class="m-2 col-6">Số ghế phổ thông:</label>
              <input type="number" class="form-control col-6" name="seat_economy" placeholder="Nhập số ghế phổ thông"
                id="seat_economy" style="width: 350px;">
            </div>

            <div class="input-group mb-2">
              <label for="seat_business" class="m-2 col-6">Số ghế thương gia:</label>
              <input type="number" class="form-control col-6" name="seat_business" placeholder="Nhập số ghế thương gia"
                id="seat_business" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="source" class="m-2 col-6"> Điểm đi: </label>
              <input type="text" class="form-control col-6" name="source" placeholder="Nhập điểm đi" id="source"
                style="width: 350px;" list="src">
                <datalist id="src">
                <?php
                  foreach ($_SESSION['all_src'] as $value) {
                    echo '<option value="' . $value . '">';
                  }
                  ?>
              </datalist>
            </div>
            <div class="input-group mb-2">
              <label for="area_take_off" class="m-2 col-6"> Nơi cất cánh: </label>
              <input type="text" class="form-control col-6" name="area_take_off" placeholder="Nhập nơi cất cánh"
                id="area_take_off" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="destination" class="m-2 col-6"> Điểm đến: </label>
              <input type="text" class="form-control col-6" name="destination" placeholder="Nhập điểm đến"
                id="destination" style="width: 350px;" list ="des">
                <datalist id="des">
                <?php
                  foreach ($_SESSION['all_des'] as $value) {
                    echo '<option value="' . $value . '">';
                  }
                  ?>
              </datalist>
            </div>
            <div class="input-group mb-2">
              <label for="area_to_land" class="m-2 col-6"> Nơi hạ cánh: </label>
              <input type="text" class="form-control col-6" name="area_to_land" placeholder="Nhập nơi hạ cánh"
                id="area_to_land" style="width: 350px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Model add flight -->
  <div class="modal" id="modal-add-flight" tabindex="-1">
    <form action="../api/add-flight.php" method="post">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Thêm chuyến bay</h3>
            <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-2">
              <label for="time_take_off" class="m-2 col-6"> Cất cánh: </label>
              <input type="time" class="form-control col-6" name="time_take_off" placeholder="Nhập thời gian cất cánh"
                id="time_take_off" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="duration" class="m-2 col-6"> Thời lượng: </label>
              <input type="number" class="form-control col-6" name="duration" placeholder="Nhập thời lượng bay"
                id="duration" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="plane_name" class="m-2 col-6"> Tên máy bay: </label>
                <select name="plane_name" class="p-2" id="plane_name" style="width: 470px;">
                <?php
                    if (isset($_SESSION['get_all_plane_name'])) {
                      foreach ($_SESSION['get_all_plane_name'] as $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                      }
                    }
                    ?>
              </select>
            </div>

            <div class="input-group mb-2">
              <label for="seat_economy" class="m-2 col-6">Số ghế phổ thông:</label>
              <input type="number" class="form-control col-6" name="seat_economy" placeholder="Nhập số ghế phổ thông"
                id="seat_economy" style="width: 350px;">
            </div>

            <div class="input-group mb-2">
              <label for="seat_business" class="m-2 col-6">Số ghế thương gia:</label>
              <input type="number" class="form-control col-6" name="seat_business" placeholder="Nhập số ghế thương gia"
                id="seat_business" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="source1" class="m-2 col-6"> Điểm đi: </label>
              <input type="text" class="form-control col-6" name="source" placeholder="Nhập điểm đi" id="source1"
                style="width: 350px;" list ="src">
                <datalist id="src">
                <?php
                  foreach ($_SESSION['all_src'] as $value) {
                    echo '<option value="' . $value . '">';
                  }
                  ?>
              </datalist>
            </div>
            <div class="input-group mb-2">
              <label for="area_take_off" class="m-2 col-6"> Nơi cất cánh: </label>
              <input type="text" class="form-control col-6" name="area_take_off" placeholder="Nhập nơi cất cánh"
                id="area_take_off" style="width: 350px;">
            </div>
            <div class="input-group mb-2">
              <label for="destination1" class="m-2 col-6"> Điểm đến: </label>
              <input type="text" class="form-control col-6" name="destination" placeholder="Nhập điểm đến"
                id="destination1" style="width: 350px;" list="des">
              <datalist id="des">
                <?php
                  foreach ($_SESSION['all_des'] as $value) {
                    echo '<option value="' . $value . '">';
                  }
                  ?>
              </datalist>
            </div>
            <div class="input-group mb-2">
              <label for="area_to_land" class="m-2 col-6"> Nơi hạ cánh: </label>
              <input type="text" class="form-control col-6" name="area_to_land" placeholder="Nhập nơi hạ cánh"
                id="area_to_land" style="width: 350px;">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary" id="btn-flight">Thêm chuyến bay</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Delete Confirm Modal -->
  <div id="modal-delete-flight" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Xóa Chuyến bay</h3>
        </div>
        <div class="modal-body">
          <p>Bạn có chắc chắn xóa chuyến bay này ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="confirm-delete" data-bs-dismiss="modal" class="btn btn-success">Xóa</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['res_update_state'])) {
    echo '<script>alert("' . $_SESSION['res_update_state'] . '")</script>';
    unset($_SESSION['res_update_state']);
  }
  if (isset($_SESSION['res_add_state'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['res_add_state'] . '")</script>';
    unset($_SESSION['res_add_state']);

  }
  ?>
</body>
<script>
  $(document).ready(function () {
    var $rows = $('#table tbody tr');
    $('#search').keyup(function () {
      var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;
      $rows.show().filter(function () {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
      }).hide();
    });
    $(".btn-update").click(function () {
      let flightId = $(this).attr("id");
      $('#modal-edit-flight').modal("show");
      $("#flight_id").val(flightId)
      $("#time_take_off").val($(this).parent().parent().children(":nth-child(2)").text())
      $("#duration").val($(this).parent().parent().children(":nth-child(3)").text())
      $("#plane_name").val($(this).parent().parent().children(":nth-child(4)").text())
      $("#seat_economy").val($(this).parent().parent().children(":nth-child(5)").text())
      $("#seat_business").val($(this).parent().parent().children(":nth-child(6)").text())
      $("#source").val($(this).parent().parent().children(":nth-child(7)").text())
      $("#area_take_off").val($(this).parent().parent().children(":nth-child(8)").text())
      $("#destination").val($(this).parent().parent().children(":nth-child(9)").text())
      $("#area_to_land").val($(this).parent().parent().children(":nth-child(10)").text())
    })
    $("#add-flight").click(function () {
      $('#modal-add-flight').modal("show");
    })

    $(".delete-flight").click(function () {
      obj = $(this).parent().parent()
      flightId = $(this).attr("id")
      $('#modal-delete-flight').modal("show");
    })
    $("#confirm-delete").click(function () {
      $.ajax({
        url: "../api/delete-flight.php",
        type: "POST",
        dataType: "json",
        data: { "id": flightId },
        success: function (result) {
          obj.remove()
        }
      });
    })
  })
</script>

</html>
<?php
ob_end_flush();
?>