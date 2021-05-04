<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Karyawan</h1>
        <a href="<?php echo base_url(); ?>karyawan/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm"></i> Tambah Karyawan</a>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Lengkap</td>
                                <td>Email</td>
                                <td>No Telepon</td>
                                <td>Alamat</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo ($key+1); ?></td>
                                    <td><?php echo $value->full_name; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->phone; ?></td>
                                    <td><?php echo substr($value->address, 0, 30) . "..."; ?></td>
                                    <td>
                                        <?php
                                            $label_active = "Nonaktifkan";
                                            $fa_label = "fa-window-close";
                                            $url = base_url() . "karyawan/disableAccount?account_id=" . $value->id;
                                            if($value->status == 0) {
                                                $label_active = "Aktifkan";
                                                $fa_label = "fa-check";
                                                $url = base_url() . "karyawan/enableAccount?account_id=" . $value->id;
                                            }
                                        ?>
                                        <a data-toggle="tooltip" data-placement="top" title="Detail Karyawan" href="<?= base_url() .'karyawan/'. $value->id ?>" class="btn btn-primary">
                                        <i class="fas fa-fw fa-search"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Update Karyawan" href="<?= base_url() .'karyawan/update/'. $value->id ?>" class="btn btn-primary">
                                        <i class="fas fa-fw fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="<?= $label_active; ?>" href="<?php echo $url; ?>" class="btn btn-<?php echo ($value->status == 0 ? "success" : "warning"); ?>">
                                        <i class="fas fa-fw <?= $fa_label; ?>"></i></a>
                                        <span data-toggle="modal" data-target="#confirmationModal"> <!-- Handle multiple toggle -->
                                            <a data-user-id="<?= $value->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus Karyawan" class="btn btn-danger btn-delete-account">
                                            <i class="fas fa-fw fa-trash"></i></a>
                                        </span>
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
    $('.btn-delete-account').on('click', function(){
        var user_id = $(this).attr('data-user-id');
        $('#confirmationModal div.modal-body').text("Apakah anda yakin ingin menghapus akun ini?");
        $('#confirmationModal a.btn-confirmation-yes').attr('href', '<?= base_url(); ?>karyawan/delete/' + user_id);
    });
});
</script>
