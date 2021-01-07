<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Item</h1>
        <a href="<?php echo base_url(); ?>item/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Item</a>
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
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo ($key+1); ?></td>
                                    <td><?php echo $value->name; ?></td>
                                    <td><?php echo "Rp. " . $value->price; ?></td>
                                    <td><?php echo $value->description; ?></td>
                                    <td></td>
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
