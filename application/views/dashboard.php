<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $karyawan_total->total; ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp. " . (property_exists($income_total, "total") ? $income_total->total : 0); ?></div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order_total->total; ?></div>
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
                                Order Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo (property_exists($finished_total, "total") ? $finished_total->total : 0) ?></div>
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
                    <h6 class="m-0 font-weight-bold text-primary">Performa Karyawan</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($karyawan_performance as $key => $value) { ?>
                        <?php
                            $percentage = (($value->count_order/$order_total->total)*100);
                            $label_color = "danger";
                            if($percentage >= 34 && $percentage <67) {
                                $label_color = "warning";
                            } else if($percentage >= 67) {
                                $label_color = "success";
                            }
                        ?>

                        <h4 class="small font-weight-bold"><?= $value->full_name; ?><span
                                class="float-right"><?= number_format($percentage, 2); ?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-<?= $label_color; ?>" role="progressbar" style="width: <?= $percentage; ?>%"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Item dalam Order</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($kategori_performance as $key => $value) { ?>
                        <?php
                            $percentage = (($value->count_order/$order_total->total)*100);
                            $label_color = "danger";
                            if($percentage >= 34 && $percentage <67) {
                                $label_color = "warning";
                            } else if($percentage >= 67) {
                                $label_color = "success";
                            }
                        ?>

                        <h4 class="small font-weight-bold"><?= $value->description; ?><span
                                class="float-right"><?= number_format($percentage, 2); ?>%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-<?= $label_color; ?>" role="progressbar" style="width: <?= $percentage; ?>%"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
    $this->view('base/menu_footer');
?>
