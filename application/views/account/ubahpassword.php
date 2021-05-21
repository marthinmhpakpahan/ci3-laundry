<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
        <a href="<?php echo base_url(); ?>karyawan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> List Karyawan</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update: #<?= $data->full_name; ?></h6>
                </div>
                <div class="card-body">
                    <form method="post" action="" class="user" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
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
                              <input type="text" class="form-control <?php echo $valid_password; ?>" name="password" placeholder="Password Baru" value="">
                              <div class="invalid-feedback">
                                  <?php echo form_error('password'); ?>
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <?php
                                  $valid_confirm_password = "";
                                  if(form_error('confirm_password') != null) {
                                      $valid_confirm_password = "is-invalid";
                                  } else {
                                      if(isset($_POST['confirm-password'])) {
                                          $valid_confirm_password = "is-valid";
                                      }
                                  }
                              ?>
                              <input type="text" class="form-control <?php echo $valid_confirm_password; ?>" name="confirm-password" placeholder="Konfirmasi Password Baru" value="">
                              <div class="invalid-feedback">
                                  <?php echo form_error('confirm_password'); ?>
                              </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">
                              Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
    $this->view('base/menu_footer');
?>
