<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Item</h1>
        <a href="<?php echo base_url(); ?>item" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> List Item</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Penghasilan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Order</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="<?php echo base_url(); ?>item/tambah">
                        <div class="form-group row">
                            <div class="col-md-6 col-xl-6 col-xs-12">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->name . " (" . $value->description . ")"; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-xl-6 col-xs-12">
                                <?php
                                    $valid_price = "";
                                    if(form_error('price') != null) {
                                        $valid_price = "is-invalid";
                                    } else {
                                        if(isset($_POST['price'])) {
                                            $valid_price = "is-valid";
                                        }
                                    }
                                ?>
                                <input type="number" name="price" class="form-control <?php echo $valid_price; ?>"
                                    placeholder="Harga Kiloan" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Deskripsi"
                                name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">
                            Simpan
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
