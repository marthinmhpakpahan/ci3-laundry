<?php
    $this->view('base/menu_header');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        <a href="<?php echo base_url(); ?>kategori" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> List Kategori</a>
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
                    <form class="user" method="POST" action="<?php echo base_url(); ?>kategori/tambah">
                        <div class="form-group">
                            <?php
                                $valid_name = "";
                                if(form_error('name') != null) {
                                    $valid_name = "is-invalid";
                                } else {
                                    if(isset($_POST['name'])) {
                                        $valid_name = "is-valid";
                                    }
                                }
                            ?>
                            <input type="text" name="name" class="form-control <?php echo $valid_name; ?>"
                                placeholder="Nama Kategori" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Deskripsi"
                                name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success float-right">
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
