<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan</h1>
        <a href="<?php echo base_url(); ?>order" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm"></i> List Pesanan</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-primary">#<?= $data->booking_code; ?></h4>
                        </div>
                        <div class="col-md-6">
                            <?php
                                $latest_status = (int)(end($data->status_order)->status_id);
                                if($latest_status < 7){
                            ?>
                                <a data-order-id="<?php echo $data->id; ?>" data-toggle="modal" data-target="#updateProgressModal" class="btn btn-sm btn-success float-right btn-update-progress"><i class="fas fa-edit fa-sm"></i> Ubah Status Pesanan</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <tr><td style="width: 280px;">Nama Pelanggan</td><td style="width: 1px;">:</td><td><?= $data->owner_name; ?></td></tr>
                            <tr><td style="width: 280px;">Email Pelanggan</td><td style="width: 1px;">:</td><td><?= $data->owner_email; ?></td></tr>
                            <tr><td style="width: 280px;">No Telp Pelanggan</td><td style="width: 1px;">:</td><td><?= $data->owner_phone; ?></td></tr>
                            <tr><td style="width: 280px;">Tanggal Pemesanan</td><td style="width: 1px;">:</td><td><?= $data->created_date; ?></td></tr>
                            <tr>
                                <td style="width: 280px;">Detail Pesanan</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    <table class="table">
                                        <tr><td width="250px">Kategori</td><td>: <?= $data->item->category; ?></td></tr>
                                        <tr><td width="250px">Nama Item</td><td>: <?= $data->item->item; ?></td></tr>
                                        <tr><td width="250px">Berat (Kg)</td><td>: <?= $data->weight; ?></td></tr>
                                        <tr><td width="250px">Harga Satuan (Rp)</td><td>: <?= $data->item->price; ?></td></tr>
                                        <tr><td width="250px">Total Harga (Rp)</td><td>: <?= $data->total_price; ?></td></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr><td style="width: 280px;">PIC</td><td style="width: 1px;">:</td><td><?= $data->pic; ?></td></tr>
                            <tr>
                                <td style="width: 280px;">Status Pesanan</td>
                                <td style="width: 1px;">:</td>
                                <td>
                                    <table class="table table-condensed">
                                        <tr><td><b>No</b></td><td><b>Tanggal & Waktu</b></td><td><b>Status</b></td></tr>
                                        <?php foreach ($data->status_order as $key => $value) { ?>
                                            <tr><td><?= "<b>".($key+1).".</b>"; ?></td><td><?= date_format(date_create($value->created), "l, d F Y, H:i:s"); ?></td><td><?= $value->status; ?></td></tr>
                                        <?php } ?>
                                    </table>
                                </td>
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
$(document).ready(function(){
    $('.btn-update-progress').on('click', function(){
        var order_id = $(this).attr('data-order-id');
        $.get( "<?php echo base_url(); ?>order/getorderstatus?order_id=" + order_id, function( data ) {
            let content = "";
            if(data.length > 0) {
                for(let i=0; i<data.length; i++) {
                    content += "<tr><td>" + data[i].created + "</td><td>" + data[i].name + "</td></tr>";
                }
            }
            $('#updateProgressModal table#tableProgressModal tbody').html(content);
        });
        $('#updateProgressModal input[name="order_id"]').val(order_id);
    });
});
</script>
