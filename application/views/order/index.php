<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Pesanan</h1>
        <a href="<?php echo base_url(); ?>order/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Pesanan</a>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Booking Code</td>
                                <td>Nama Pelanggan</td>
                                <td>Email Pelanggan</td>
                                <td>No Telp Pelanggan</td>
                                <td>Jenis Item</td>
                                <td>Total Berat</td>
                                <td>Total Harga</td>
                                <td>PIC</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo $value->booking_code; ?></td>
                                    <td><?php echo $value->owner_name; ?></td>
                                    <td><?php echo $value->owner_email; ?></td>
                                    <td><?php echo $value->owner_phone; ?></td>
                                    <td><?php echo $value->description; ?></td>
                                    <td><?php echo $value->weight . " Kg"; ?></td>
                                    <td><?php echo "Rp. " . $value->total_price; ?></td>
                                    <td><?php echo $value->full_name; ?></td>
                                    <td class="row">
                                        <a data-order-id="<?php echo $value->id; ?>" href="" class="btn-update-progress btn btn-success" data-toggle="modal" data-target="#updateProgressModal">
                                        <i class="fas fa-search fa-sm text-white-50"></i></a>
                                    </td>
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
    $('.btn-update-progress').on('click', function(){
        var order_id = $(this).attr('data-order-id');
        console.log(order_id);
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
