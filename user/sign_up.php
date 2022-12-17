<?php
session_start();
if (isset($_SESSION["check_sign_up"])) {
  echo '
  <script type="text/javascript">alert("' . $_SESSION['check_sign_up'] . '")</script>
  ';
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sign_up.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>

<body>
  <section style="background-image: url(../images/banner1.jpg);"">
  <div class=" mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h3 class="mb-5">Sign Up</h3>
              <form action="../api/sign-up-api.php" method="post">
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Your Username</label>
                  <input type="text" id="form3Example1cg" name="txtUsername" class="form-control form-control-lg"
                    placeholder="Enter Your Username" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <input type="email" id="form3Example3cg" name="txtEmail" class="form-control form-control-lg"
                    placeholder="Enter Your Email" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" name="txtPwd" id="form3Example4cg" class="form-control form-control-lg"
                    placeholder="Enter Your Password" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <input type="password" id="form3Example4cdg" name="txtRePwd" class="form-control form-control-lg"
                    placeholder="Enter Your Password Again" />
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" name="check" type="checkbox" value="1" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button class="btn btn-danger btn-lg btn-block col-12 p-3 mb-3" type="submit" name="signUp"
                    value="signUp"><strong>Sign Up</strong> </button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">
                  By clicking the "Sign Up" button, you have agreed to the rules, restrictions and Terms & Conditions
                </p>

                <p class="text-center text-muted mt-5 mb-0"> Already an TanPhong member?
                  <a href="../login.php">Login</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</body>

</html>