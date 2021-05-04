<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Item</h1>
        <a href="<?php echo base_url(); ?>item/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm"></i> Tambah Item</a>
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
                                <td>No</td>
                                <td>Kategori</td>
                                <td>Harga/Kg</td>
                                <td>Deskripsi</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo ($key+1); ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo "Rp. " . $value->price; ?></td>
                                    <td><?php echo $value->description; ?></td>
                                    <td width="150px">
                                        <span data-toggle="modal" data-target="#updateItemModal"> <!-- Handle multiple toggle -->
                                            <a data-item-id="<?= $value->id; ?>" data-toggle="tooltip" data-placement="top" title="Ubah Item" class="btn btn-success btn-update-item">
                                            <i class="fas fa-fw fa-edit"></i></a>
                                        </span>
                                        <span data-toggle="modal" data-target="#confirmationModal"> <!-- Handle multiple toggle -->
                                            <a data-item-id="<?= $value->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus Item" class="btn btn-danger btn-delete-item">
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
    $('.btn-delete-item').on('click', function(){
        var id = $(this).attr('data-item-id');
        $('#confirmationModal div.modal-body').text("Apakah anda yakin ingin menghapus item ini?");
        $('#confirmationModal a.btn-confirmation-yes').attr('href', '<?= base_url(); ?>item/delete/' + id);
    });

    $('.btn-update-item').on('click', function(event){
        event.preventDefault();
        var id = $(this).attr('data-item-id');
        $.get("<?= base_url(); ?>/item/" + id, function(data) {
            $('#updateItemModal form').attr('action', '/item/update/' + id);
            $('#updateItemModal select option[value='+ data.category_id +']').prop('selected', true);
            $('#updateItemModal input[name=name]').val(data.name);
            $('#updateItemModal input[name=price]').val(data.price);
            $('#updateItemModal textarea[name=description]').text(data.description);
            $('#updateItemModal').modal('show');
        });
    });
});
</script>
