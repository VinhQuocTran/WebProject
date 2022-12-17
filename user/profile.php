<?php
session_start();
require_once("../api/get-info-user.php");
if (isset($_SESSION['info_user'])) {
    $user_info = unserialize($_SESSION['info_user']);
}
if (isset($_SESSION['res_save_change'])) {
    echo '
    <script type="text/javascript">alert("' . $_SESSION['res_save_change'] . '")</script>
    ';
    unset($_SESSION['res_save_change']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>Document</title>
    <style>
        body {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }
    </style>
</head>

<body>
    <div class="container col-6 emp-profile">
        <form method="post" class="justify-content-center">
            <div class="row">
                <div class="col-4">
                    <div class="profile-img">
                        <img src="https://t3.ftcdn.net/jpg/02/09/37/00/360_F_209370065_JLXhrc5inEmGl52SyvSPeVB23hB6IjrR.jpg"
                            alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-head">
                        <h5>
                            <?php echo $user_info['Username']; ?>
                        </h5> <br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <input class="profile-edit-btn btn btn-success text-light" id="btn-edit" name="btnAddMore"
                        value="Edit Profile" />
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-6">
                                    <label>Họ và tên</label>
                                </div>
                                <div class="col-6">
                                    <p id="old-full-name">
                                        <?php if (empty($user_info['Name']))
                                            echo "chưa xác định";
                                        else
                                            echo $user_info['Name']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-6">
                                    <p id="old-email">
                                        <?php echo $user_info['Email']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Số điện thoại</label>
                                </div>
                                <div class="col-6">
                                    <p id="old-phone">
                                        <?php if (empty($user_info['Phone']))
                                        echo "chưa xác định";
                                    else
                                        echo $user_info['Phone']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label>Ngày sinh</label>
                                </div>
                                <div class="col-6">
                                    <p id="old-dob">
                                        <?php if (empty($user_info['DateOfBirth']))
                                            echo "chưa xác định";
                                        else {
                                            $timestamp = strtotime($user_info['DateOfBirth']);
                                            $new_date = date("d/m/Y", $timestamp);
                                            echo $new_date;
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-danger text-light me-2" id="change-password">Đổi mật khẩu</a>
                        <a class="btn btn-primary text-light" href="../index.php">Trở về</a>
                    </div>
                </div>
        </form>
    </div>

    <div class="modal" id="modal-edit-profile" tabindex="-1">
        <form action="../api/edit-profile.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh sửa thông tin cá nhân</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-2">
                            <label for="full_name" class="m-2 col-6">Họ và tên:</label>
                            <input type="text" class="form-control col-6" name="full_name" placeholder="Nhập họ và tên"
                                id="full_name" style="width: 350px;">
                        </div>
                        <div class="input-group mb-2">
                            <label for="new_email" class="m-2 col-6"> Email: </label>
                            <input type="email" class="form-control col-6" name="new-email" placeholder="Nhập email mới"
                                id="new_email" style="width: 350px;">
                        </div>
                        <div class="input-group mb-2">
                            <label for="phone" class="m-2 col-6"> Số điện thoại: </label>
                            <input type="tel" class="form-control col-6" name="phone" placeholder="Nhập số điện thoại"
                                id="phone" style="width: 350px;"
                                onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');">
                        </div>
                        <div class="input-group mb-2">
                            <label for="dob" class="m-2 col-6"> Ngày sinh: </label>
                            <input type="date" class="form-control col-6" name="dob" placeholder="Nhập ngày sinh"
                                id="dob" style="width: 350px;">
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

    <div class="modal" id="modal-change-password" tabindex="-1">
        <form action="../api/change-password.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thay đổi mật khẩu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <label for="old-password" class="m-2">Nhập mật khẩu cũ:</label>
                            <input type="password" class="form-control" name="old-password"
                                placeholder="Nhập mật khẩu cũ" id="old-password" style="width: 350px;">
                        </div>
                        <div class="input-group mb-3">
                            <label for="new-password" class="m-2">Nhập mật khẩu mới: </label>
                            <input type="password" class="form-control" name="new-password"
                                placeholder="Nhập mật khẩu mới" id="new-password" style="width: 350px;">
                        </div>
                        <div class="input-group mb-3">
                            <label for="new2-password" class="m-2">Nhập lại mật khẩu mới: </label>
                            <input type="password" class="form-control" name="new2-password"
                                placeholder="Nhập lại mật khẩu mới" id="new2-password" style="width: 350px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit-profile" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
if (isset($_SESSION['res_update_state'])) {
  echo '<script>alert("' . $_SESSION['res_update_state'] . '")</script>';
  unset($_SESSION['res_update_state']);
}
?>
</body>
<script>
    $(document).ready(function () {
        $("#change-password").click(function () {
            $('#modal-change-password').modal("show");
        })
        $("#btn-edit").click(function () {
            $('#modal-edit-profile').modal("show");
            if ($("#old-full-name").text().trim() == "chưa xác định")
                $("#full_name").val("")
            else {
                $("#full_name").val($("#old-full-name").text().trim())
            }
            $("#new_email").val($("#old-email").text().trim())

            if ($("#old-phone").text().trim() == "chưa xác định")
                $("#phone").val("")
            else {
                $("#phone").val($("#old-phone").text().trim())
            }

            if ($("#old-dob").text().trim() == "chưa xác định")
                $("#dob").val("")
            else {
                let date = $("#old-dob").text().trim().split("/")
                let newDate = date[2] + "-" + date[1] + "-" + date[0]
                $("#dob").val(newDate)
            }
        })
    })
</script>

</html>