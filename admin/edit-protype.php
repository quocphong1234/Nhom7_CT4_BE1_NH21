<?php
include "header.php";
if (isset($_GET['type_id'])) {
    $array = $type->selectNameType($_GET['type_id']);
    $filepro = $array[0];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Protypes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="product.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Protypes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="editprotype.php" method="post" enctype="multipart/form-data">
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
                                <label for="inputId">type_id</label>
                                <input readonly="false" name="type_id" value="<?php echo $filepro['type_id'] ?>" id="inputId" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">type_name</label>
                                <input type="text" id="inputName" class="form-control" value="<?php echo $filepro['type_name'] ?>" name="type_name" require>
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