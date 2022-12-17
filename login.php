<?php
session_start();
if (isset($_SESSION['user_id'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}
if (isset($_SESSION['is-login'])) {
  echo '<script type="text/javascript">alert("' . $_SESSION['is-login'] . '")</script>';
  unset($_SESSION['is-login']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>
<section style="background-image: url(../images/banner1.jpg);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <form action="api/is-login.php" method="post">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">
              <h3 class="mb-5">Login</h3>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtUsername">Username</label>
                <input type="text" name="txtUsername" id="txtUsername" class="form-control form-control-lg"
                  placeholder="Enter Your Username" />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="txtPwd">Password</label>
                <input type="password" name="txtPwd" id="txtPwd" class="form-control form-control-lg"
                  placeholder="Enter Password" />
              </div>
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-end mb-4">
                <a href="user/forgot_password.html">Forgot Password ?</a>
              </div>
              <div class="d-flex justify-content-center">
                <button class="btn btn-danger btn-lg btn-block col-11 p-3 mb-3" type="submit" name="submit"
                  value="isLogin"><strong>Login</strong> </button>
              </div>
              <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-block btn-primary col-11 p-3 mb-3" style="background-color: #3b5998;"
                  type="submit"><i class="fab fa-facebook-f me-2"></i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 20">
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                  </svg>
                  <strong>Sign in with facebook</strong> </button>
              </div>
              <div class="d-flex justify-content-center">
                <button class="btn btn-lg btn-block btn-primary col-11 p-3 mb-3"
                  style="background-color: white; color: black; border: none;" type="submit"><i
                    class="fab fa-google me-2"></i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-google" viewBox="0 0 16 20">
                    <path
                      d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                  </svg> <strong>Sign in with google</strong> </button>
              </div>
              <div class="d-flex justify-content-center">
                <p> Not an TanPhong member? <a href="user/sign_up.php"> Sign up now</a></p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>

</html>