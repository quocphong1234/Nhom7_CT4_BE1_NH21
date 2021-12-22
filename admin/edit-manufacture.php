<?php
include "header.php";
if (isset($_GET['manu_id'])) {
    $array = $manu->selectName($_GET['manu_id']);
    $filemanu = $array[0];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manufacture Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="product.php">Home</a></li>
                        <li class="breadcrumb-item active">Manufacture Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="editmanufacture.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputId">manu_id</label>
                                <input readonly="false" name="manu_id" value="<?php echo $filemanu['manu_id'] ?>" id="inputId" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">manu_name</label>
                                <input type="text" id="inputName" class="form-control" value="<?php echo $filemanu['manu_name'] ?>" name="manu_name" require>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                  
                    <input type="submit" value="Edit" class="btn btn-success float-right" name="submit">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.html";
?>