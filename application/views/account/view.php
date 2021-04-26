<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Karyawan</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">#<?= $data->username; ?></h6>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <tr>
                                <td style="width: 250px;" rowspan="5">Images</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;">Nama Lengkap</td><td>: <?= $data->full_name; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Email</td><td>: <?= $data->email; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">No Telp</td><td>: <?= $data->phone; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Alamat</td><td>: <?= $data->address; ?></td>
                            </tr>
                        </table>
                    </div>
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
