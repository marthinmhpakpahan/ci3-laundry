<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo isset($header_title) ? $header_title : "Magrify Laundry"; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form method="post" action="<?php echo base_url(); ?>register" class="user">
                  <div class="form-group">
                    <?php
                        $valid_full_name = "";
                        if(form_error('full_name') != null) {
                            $valid_full_name = "is-invalid";
                        } else {
                            if(isset($_POST['full_name'])) {
                                $valid_full_name = "is-valid";
                            }
                        }
                    ?>
                    <input type="text" class="form-control <?php echo $valid_full_name; ?>" name="full_name" placeholder="Full Name" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : ''; ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('full_name'); ?>
                    </div>
                  </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <?php
                          $valid_username = "";
                          if(form_error('username') != null) {
                              $valid_username = "is-invalid";
                          } else {
                              if(isset($_POST['username'])) {
                                  $valid_username = "is-valid";
                              }
                          }
                      ?>
                    <input type="text" class="form-control <?php echo $valid_username; ?>" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('username'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <?php
                          $valid_phone = "";
                          if(form_error('phone') != null) {
                              $valid_phone = "is-invalid";
                          } else {
                              if(isset($_POST['phone'])) {
                                  $valid_phone = "is-valid";
                              }
                          }
                      ?>
                    <input type="text" class="form-control <?php echo $valid_phone; ?>" name="phone" placeholder="Phone Number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('phone'); ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <?php
                        $valid_email = "";
                        if(form_error('email') != null) {
                            $valid_email = "is-invalid";
                        } else {
                            if(isset($_POST['email'])) {
                                $valid_email = "is-valid";
                            }
                        }
                    ?>
                  <input type="email" class="form-control <?php echo $valid_email; ?>" name="email" placeholder="Email Address" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                  <div class="invalid-feedback">
                      <?php echo form_error('email'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <?php
                          $valid_password = "";
                          if(form_error('password') != null) {
                              $valid_password = "is-invalid";
                          } else {
                              if(isset($_POST['password'])) {
                                  $valid_password = "is-valid";
                              }
                          }
                      ?>
                    <input type="password" class="form-control <?php echo $valid_password; ?>" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('password'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <?php
                          $valid_confirm_password = "";
                          if(form_error('confirm-password') != null) {
                              $valid_confirm_password = "is-invalid";
                          } else {
                              if(isset($_POST['confirm-password'])) {
                                  $valid_confirm_password = "is-valid";
                              }
                          }
                      ?>
                    <input type="password" class="form-control <?php echo $valid_confirm_password; ?>" name="confirm-password" placeholder="Confirm Password" value="<?php echo isset($_POST['confirm-password']) ? $_POST['confirm-password'] : ''; ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('confirm-password'); ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <?php
                        $valid_address = "";
                        if(form_error('address') != null) {
                            $valid_address = "is-invalid";
                        } else {
                            if(isset($_POST['address'])) {
                                $valid_address = "is-valid";
                            }
                        }
                    ?>
                  <textarea rows="4" class="form-control <?php echo $valid_address; ?>" name="address" placeholder="Address"><?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?></textarea>
                  <div class="invalid-feedback">
                      <?php echo form_error('address'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url(); ?>login">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
