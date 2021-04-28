<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Karyawan</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Form</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="" class="user" enctype="multipart/form-data">
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
                          <input type="text" class="form-control <?php echo $valid_full_name; ?>" name="full_name" placeholder="Full Name" value="<?= $data->full_name; ?>">
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
                          <input type="text" class="form-control <?php echo $valid_username; ?>" name="username" placeholder="Username" value="<?= $data->username; ?>">
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
                          <input type="text" class="form-control <?php echo $valid_phone; ?>" name="phone" placeholder="Phone Number" value="<?= $data->phone; ?>">
                          <div class="invalid-feedback">
                              <?php echo form_error('phone'); ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
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

                            <input type="email" class="form-control <?php echo $valid_email; ?>" name="email" placeholder="Email Address" value="<?= $data->email; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="file" name="image" placeholder="Profile Image" value="<?= $data->image; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('image'); ?>
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
                        <textarea rows="4" class="form-control <?php echo $valid_address; ?>" name="address" placeholder="Address"><?= $data->address; ?></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('address'); ?>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success btn-block">
                        Update Karyawan
                      </button>
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

<script type="text/javascript">
$( document ).ready(function() {
    $('input[name="weight"]').on("input", function(){
        var weight = $("input[name='weight']").val();
        var price = $("select[name='item_id'] option:selected" ).attr('data-price');
        if(price !== undefined) {
            console.log(weight);
            console.log(price);
            var total_price = weight * price;
            $("input[name='price_label']").val(total_price);
            $("input[name='total_price']").val(total_price);
        }
    });
});
</script>
