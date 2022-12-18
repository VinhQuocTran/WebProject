<?php
session_start();
ob_start();
if (!isset($_SESSION['info_user']) && isset($_SESSION['user_id'])) {
  require_once("../api/get-info-user.php");
}
if (isset($_SESSION['info_user'])) {
  $user_info = unserialize($_SESSION['info_user']);
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Trang giỏ hàng</title>
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

<body>
  <header>
    <!-- header inner -->
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <a href="../index.php"><img src="../images/logovanthao.png" alt="#" /></a>
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
                  <li class="nav-item">
                    <a class="nav-link" id="back-home" href="index.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-back" viewBox="0 0 16 16">
                        <path
                          d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z" />
                      </svg> Tiếp tục chọn vé</a>
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
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="content">
    <div class="container-fluid">
      <div class="table-responsive">
        <table class="table table-striped custom-table">
          <thead>
            <tr>
              <th scope="col">Mã chuyến bay</th>
              <th scope="col">Ngày cất cánh</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Ghế phổ thông</th>
              <th scope="col">Ghế thương gia</th>
              <th scope="col">Giá phổ thông</th>
              <th scope="col">Giá thương gia</th>
              <th scope="col">Thành tiền</th>
              <th scope="col" class="d-flex justify-content-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("../api/get-cart.php");
            ?>
          </tbody>
        </table>
        <div class="d-flex justify-content-end me-3 mb-4">
          <span id="totalCost">Tổng cộng: 000,000 đ</span>
        </div>
        <div class="d-flex justify-content-end">
          <button class="btn btn-success" id="btnCash">Thanh Toán</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal-buy-ticket" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Nhập thông tin khách hàng</h3>
          <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-2">
            <label for="Name" class="m-2 col-6"> Tên khách hàng: </label>
            <input type="text" value="<?php if (isset($user_info['Name']))
              echo $user_info['Name'];
            else
              echo "" ?>" class="form-control col-6" name="Name"
              placeholder="Nhập tên khách hàng" id="Name" style="width: 350px;">
          </div>
          <div class="input-group mb-2">
            <label for="Email" class="m-2 col-6"> Email: </label>
            <input type="email" value="
            <?php if (isset($user_info['Email']))
              echo $user_info['Email'];
            else
              echo "" ?>
            " class="form-control col-6" name="Email" placeholder="Nhập email" id="Email" style="width: 350px;">
          </div>
          <div class="input-group mb-2">
            <label for="Phone" class="m-2 col-6"> Số điện thoại: </label>
            <input type="tel" value="<?php if (isset($user_info['Phone']))
              echo $user_info['Phone'];
            else
              echo "" ?>"
              class="form-control col-6" name="Phone" placeholder="Nhập số điện thoại" id="Phone" style="width: 350px;">
          </div>
          <div class="input-group mb-2">
            <label for="DateOfBirth" class="m-2 col-6">Ngày sinh:</label>
            <input type="date" class="form-control col-6" value="<?php if (isset($user_info['DateOfBirth']))
              echo date('Y-m-d', strtotime($user_info["DateOfBirth"]));
            else
              "" ?>" name="DateOfBirth"
              placeholder="Nhập ngày sinh" id="DateOfBirth" style="width: 350px;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" id="btnNext">Tiếp theo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="modal-cash" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thông tin tài khoản</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <label for="accountID" class="m-2">Nhập số tài khoản:</label>
            <input type="text" class="form-control" name="accountID" placeholder="Nhập số tài khoản" id="accountID"
              style="width: 350px;">
          </div>
          <div class="input-group mb-3">
            <label for="Password" class="m-2">Nhật mật khẩu: </label>
            <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" id="Password"
              style="width: 350px;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="btnPrev" data-bs-dismiss="modal">Quay lại</button>
          <button type="submit" name="btnCash" id="btnConfirm" class="btn btn-primary">Xác nhận</button>
        </div>
      </div>
    </div>
  </div>
<?php
  if (isset($_SESSION['res_buy_ticket'])) {
    echo '<script type="text/javascript">
       alert("' . $_SESSION['res_buy_ticket'] . '")</script>';
    unset($_SESSION['res_buy_ticket']);
  }
?>
</body>
<script>
  $(".numEcoSeat").change(function () {
    if ($(this).val() < 1) {
      $(this).val(1)
    }
    else {
      ecoSeat = $(this).val()
      busSeat = $(this).parent().parent()
        .children(":nth-child(5)").children(":nth-child(1)").val()

      ecoPrice = $(this).parent().parent()
        .children(":nth-child(6)").text().replaceAll(",", "").replace(" đ", "")

      busPrice = $(this).parent().parent()
        .children(":nth-child(7)").text().replaceAll(",", "").replace(" đ", "")

      totalCost = ecoSeat * ecoPrice + busSeat * busPrice

      $(this).parent().parent()
        .children(":nth-child(8)").text(totalCost.toLocaleString() + " đ")
    }
    cost = 0
    for (let i = 0; i < $(".totalCost").length; i++) {
      cost += parseInt($(".totalCost").eq(i).text().replaceAll(",", "").replace(" đ", ""))
    }
    $("#totalCost").text("Tổng cộng: " + cost.toLocaleString() + " đ");
  });
  $(".numBusSeat").change(function () {
    if ($(this).val() < 0) {
      $(this).val(0)
    }
    else {
      busSeat = $(this).val()
      ecoSeat = $(this).parent().parent()
        .children(":nth-child(4)").children(":nth-child(1)").val()

      ecoPrice = $(this).parent().parent()
        .children(":nth-child(6)").text().replaceAll(",", "").replace(" đ", "")

      busPrice = $(this).parent().parent()
        .children(":nth-child(7)").text().replaceAll(",", "").replace(" đ", "")

      totalCost = ecoSeat * ecoPrice + busSeat * busPrice

      $(this).parent().parent()
        .children(":nth-child(8)").text(totalCost.toLocaleString() + " đ")
    }
    cost = 0
    for (let i = 0; i < $(".totalCost").length; i++) {
      cost += parseInt($(".totalCost").eq(i).text().replaceAll(",", "").replace(" đ", ""))
    }
    $("#totalCost").text("Tổng cộng: " + cost.toLocaleString() + " đ");
  });
  cost = 0
  for (let i = 0; i < $(".totalCost").length; i++) {
    cost += parseInt($(".totalCost").eq(i).text().replaceAll(",", "").replace(" đ", ""))
  }
  $("#totalCost").text("Tổng cộng: " + cost.toLocaleString() + " đ");
  $(".delete-ticket").click(function () {
    ticketId = $(this).attr("id")
    $.post("../api/get-ticket-to-cart.php", { isDeleted: ticketId }, function (result) {
    });
    $(location).prop('href', 'cart.php')
  })
  $("#btnCash").click(function () {
    $('#modal-buy-ticket').modal("show");
  })
  $("#btnNext").click(function () {
    if ($("#Name").val() != "" && $("#Email").val() != "" &&
      $("#Phone").val() != "" && $("#DateOfBirth").val() != "") {
      $('#modal-buy-ticket').modal("hide");
      $('#modal-cash').modal("show");
    }
    else {
      alert("Vui lòng nhập đầy đủ thông tin")
    }
  })
  $("#btnPrev").click(function () {
    $('#modal-buy-ticket').modal("show");
  })
  $("#btnConfirm").click(function () {
    // get ticket id
  tickets = []
  i = 0
  $.each($(".InCard"), function(index, item) {
    tickets[i]= $(item).children(":nth-child(9)")
    .children(":nth-child(1)").attr("id")
    i++
  });
  // get quantity ecoSeat
  numEcoSeats = []
  i = 0
  $.each($(".numEcoSeat"), function(index, item) {
    numEcoSeats[i]= $(item).val()
    i++
  });
// get quantity busSeat
  numBusSeats = []
  i = 0
  $.each($(".numBusSeat"), function(index, item) {
    numBusSeats[i]= $(item).val()
    i++
  });
    if ($("#accountID").val() != "" && $("#Password").val() != "") {
      $.post("../api/buy-ticket.php",
        {
          'NumberEcoSeat[]':numEcoSeats,
          'NumberBusSeat[]':numBusSeats,
          'TicketsId[]': tickets,
          Name: $("#Name").val(),
          Email: $("#Email").val(),
          Phone: $("#Phone").val(),
          DateOfBirth: $("#DateOfBirth").val(),
          accountID: $("#accountID").val(),
          Password: $("#Password").val(),
          TotalCost: $("#totalCost").text().replaceAll(",", "")
          .replace(" đ", "").replace("Tổng cộng: ","")
        },
        function (result) {
          location.reload()
        });
     $(location).prop('href', 'cart.php')
    }
    else {
      alert("Vui lòng nhập đầy đủ thông tin")
    }
  })
</script>
</html>
<?php
ob_end_flush();
?>