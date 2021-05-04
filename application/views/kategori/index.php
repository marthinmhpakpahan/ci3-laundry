<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Kategori</h1>
        <a href="<?php echo base_url(); ?>kategori/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm"></i> Tambah Kategori</a>
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
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Deskripsi</td>
                                <td width="150px">#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo ($key+1); ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo $value->description; ?></td>
                                    <td>
                                        <span data-toggle="modal" data-target="#updateCategoryModal"> <!-- Handle multiple toggle -->
                                            <a data-kategori-id="<?= $value->id; ?>" data-toggle="tooltip" data-placement="top" title="Ubah Kategori" class="btn btn-success btn-update-category">
                                            <i class="fas fa-fw fa-edit"></i></a>
                                        </span>
                                        <span data-toggle="modal" data-target="#confirmationModal"> <!-- Handle multiple toggle -->
                                            <a data-kategori-id="<?= $value->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus Kategori" class="btn btn-danger btn-delete-category">
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
    $('.btn-delete-category').on('click', function(){
        var id = $(this).attr('data-kategori-id');
        $('#confirmationModal div.modal-body').text("Apakah anda yakin ingin menghapus kategori ini?");
        $('#confirmationModal a.btn-confirmation-yes').attr('href', '<?= base_url(); ?>kategori/delete/' + id);
    });

    $('.btn-update-category').on('click', function(event){
        event.preventDefault();
        var id = $(this).attr('data-kategori-id');
        $.get("<?= base_url(); ?>/kategori/" + id, function(data) {
            $('#updateCategoryModal form').attr('action', '/kategori/update/' + id);
            $('#updateCategoryModal input[name=name]').val(data.name);
            $('#updateCategoryModal textarea[name=description]').text(data.description);
            $('#updateCategoryModal').modal('show');
        });
    });
});
</script>
