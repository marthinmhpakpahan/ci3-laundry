<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan</h1>
        <a href="<?php echo base_url(); ?>order" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> List Pesanan</a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Order #<?php echo $booking_code; ?></h6>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="<?php echo base_url(); ?>order/tambah">
                        <div class="form-group">
                            <input type="hidden" name="booking_code" class="form-control"
                                placeholder="Booking Code" value="<?php echo $booking_code; ?>">
                            <input type="hidden" name="user_id" class="form-control"
                                placeholder="Booking Code" value="<?php echo $this->session->userdata('login_id'); ?>">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <input type="text" name="owner_name" class="form-control"
                                    placeholder="Nama Pelanggan">
                            </div>
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <input type="email" name="owner_email" class="form-control"
                                    placeholder="Email Pelanggan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <input type="number" name="owner_phone" class="form-control"
                                    placeholder="Nomor Telp Pelanggan">
                            </div>
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <select name="item_id" class="form-control">
                                    <option value="">Pilih Item</option>
                                    <?php foreach ($items as $key => $value) { ?>
                                        <option data-price="<?php echo $value->price; ?>" value="<?php echo $value->id; ?>"><?php echo $value->name . " (" . $value->description . ")"; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <input type="number" name="weight" class="form-control"
                                    placeholder="Total Berat (Kg)">
                            </div>
                            <div class="col-md-6 col-xs-12 col-lg-6">
                                <input type="number" name="total_price" class="form-control"
                                    placeholder="Total Biaya" disabled>
                            </div>
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
