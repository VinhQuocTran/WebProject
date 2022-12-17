<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <title>Trang tra cứu vé đã</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Style -->
  <link rel="icon" href="../images/logovanthao.png" type="image/gif" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-airplane" viewBox="0 0 16 16">
                        <path
                          d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z" />
                      </svg>
                      Chuyến bay
                    </a>
                  </li>
                  <li class="nav-item active">
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
  <div class="main">
    <div class="input-group">
      <input type="text" class="form-control" id="search" placeholder="Hãy nhập mã vé cần tra cứu">
      <div class="input-group-append">
        <button class="btn btn-secondary" id="btnSearch" type="button">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="table-responsive">
        <table class="table table-striped custom-table" id="table">
          <thead>
          <tr>
              <th scope="col">Mã vé</th>
              <th scope="col">Tên</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Ngày mua</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Điểm đi</th>
              <th scope="col">Điểm đến</th>
              <th scope="col">Ghế phổ thông</th>
              <th scope="col">Ghế thương gia</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['user_id'])) {
              require_once("api/get-all-ticketdetail-user.php");
            }
            if (isset($_SESSION['ticket_detail'])) {
              $row = unserialize($_SESSION['ticket_detail']);
              $timestamp = strtotime($row['PurchaseDate']);
              $new_date = date("d/m/Y", $timestamp);
              echo '<tr scope="row">
              <td>' . $row['TicketDetailID'] . '</td>
              <td>' . $row['Name'] . '</td>
              <td>' . $row['Phone'] . '</td>
              <td>' . $new_date . '</td>
              <td>' . $row['Source'] . '</td>
              <td>' . $row['Destination'] . '</td>
              <td>' . $row['TakeoffTime'] . '</td>
              <td>' . $row['AmountEcoTicket'] . '</td>
              <td>' . $row['AmountBusTicket'] . '</td>
          </tr>';
              unset($_SESSION['ticket_detail']);
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Delete Confirm Modal -->
  <div id="modal-delete-user" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Xóa khách hàng</h3>
        </div>
        <div class="modal-body">
          <p>Bạn có chắc chắn xóa khách hàng này ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
          <button type="button" id="confirm-delete" class="btn btn-success">Xóa</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
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

  $("#btnSearch").click(function () {
    $.ajax({
      url: "api/search-ticketdetail.php",
      type: "POST",
      dataType: "json",
      data: { id: $("#search").val() }
    })
    location.reload()
  })
</script>

</html>
<?php
ob_end_flush();
?>