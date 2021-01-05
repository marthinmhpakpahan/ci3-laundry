<?php
    $this->view('base/header');
?>

<center>
    <div class="col-md-6">
        <br/><br/>
        <h1>Magrivyy Tracker</h1>
        <br/>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <form method="get" action="<?php echo base_url(); ?>tracking">
                    <div class="form-group">
                        <input type="text" name="booking_code" class="form-control"
                            placeholder="Masukan Booking Code" value="<?php echo isset($_GET['booking_code']) ? $_GET['booking_code'] : ""; ?>">
                    </div>
                    <button type="submit" class="btn btn-success float-right">
                        Track
                    </button>
                </form>
            </div>
        </div>

        <br/>
        <?php if(isset($order_status) && count($order_status) > 0 && isset($_GET['booking_code'])) { ?>
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Waktu</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <?php foreach ($order_status as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->created; ?></td>
                            <td><?php echo $value->status; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <?php } else { ?>
            <?php if(isset($_GET['booking_code'])) { ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Maaf!</strong> Kami tidak dapat menemukan Kode Booking yang anda cari.
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</center>

<?php
    $this->view('base/footer');
?>
