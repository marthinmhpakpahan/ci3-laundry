</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Magrivvy 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateProgressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo base_url(); ?>order/updatestatus">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses/Status Pesanan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tableProgressModal" class="table table-hover">
                        <thead>
                            <tr>
                                <td><b>Waktu</b></td>
                                <td><b>Status</b></td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <br/>
                    <div class="form-group">
                        <select name="status_id" class="form-control">
                            <option value="">Pilih Status/Progress</option>
                            <?php foreach ($order_status as $key => $value) { ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="order_id" value="" />
                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('login_id'); ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

<?php
    $this->view('base/footer');
?>
