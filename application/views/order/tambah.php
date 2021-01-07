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
                                <input type="number" name="price_label" class="form-control"
                                    placeholder="Total Biaya" disabled>
                                <input type="hidden" name="total_price" class="form-control"
                                    placeholder="Total Biaya">
                            </div>
                        </div>
                        <button id="btn-submit-order" type="submit" class="btn btn-success float-right">
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
