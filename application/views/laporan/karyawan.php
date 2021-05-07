<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Karyawan</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Filter</h6> <br/>
                    <form>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="exampleInputEmail1" class="font-weight-bold">Awal Rentang Waktu</label>
                                <input autocomplete="off" name="start-date" type="text" class="form-control" value="<?= isset($_GET['start-date']) && $_GET['start-date'] != '' ? $_GET['start-date'] : ''; ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="exampleInputEmail1" class="font-weight-bold">Akhir Rentang Waktu</label>
                                <input autocomplete="off" name="end-date" type="text" class="form-control" value="<?= isset($_GET['end-date']) && $_GET['end-date'] != '' ? $_GET['end-date'] : ''; ?>">
                            </div><div class="form-group col-md-2">
                                <label for="exampleInputEmail1">&nbsp;</label>
                                <button class="btn btn-success form-control" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2" style="height: 70px; line-height: 70px; text-align: center;" class="font-weight-bold">ID Karyawan</td>
                                <td rowspan="2" style="height: 70px; line-height: 70px; text-align: center;" class="font-weight-bold">Nama Karyawan</td>
                                <td colspan="3" class="text-center font-weight-bold">Total Pesanan</td>
                                <td colspan="3" style="text-align: center;" class="font-weight-bold">Total Penghasilan</td>
                            </tr>
                            <tr>
                                <td class="text-center font-weight-bold">Sedang Di Proses</td>
                                <td class="text-center font-weight-bold">Selesai</td>
                                <td class="text-center font-weight-bold">Batal</td>
                                <td class="text-center font-weight-bold">Sedang Di Proses</td>
                                <td class="text-center font-weight-bold">Selesai</td>
                                <td class="text-center font-weight-bold">Batal</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->karyawan_id; ?></td>
                                    <td><?= $value->karyawan_full_name; ?></td>
                                    <td><?= $value->total_in_progress; ?></td>
                                    <td><?= $value->total_in_done; ?></td>
                                    <td><?= $value->total_in_cancel; ?></td>
                                    <td><?= "Rp. " . ($value->price_in_progress ?: "-"); ?></td>
                                    <td><?= "Rp. " . ($value->price_in_done ?: "-"); ?></td>
                                    <td><?= "Rp. " . ($value->price_in_cancel ?: "-"); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
$(document).ready(function(){
    $('input[name=start-date], input[name=end-date]').datepicker({
		format: 'yyyy-mm-dd',
		daysOfWeekDisabled: "0",
		autoclose:true
    });
});
</script>
