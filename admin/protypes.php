<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Protype</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Protype</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
   
      
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
            <th style="width: 8%">
                        type_id
                    </th>
                    <th style="width: 8%" class="text-center">
                        type_name
                    </th>
                    <th style="width: 20%" class="text-center">
                    Action
                    </th>
                    <th style="width: 20%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllProtype = $type->getAllProtype();
            foreach ($getAllProtype as $value) {
            ?>
              <tr>
                <td>
                  <?php echo $value['type_id'] ?>
                </td>
                <td>
                  <?php echo $value['type_name'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="edit-protype.php?type_id=<?php echo $value['type_id']?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="delprotype.php?id=<?php echo $value['type_id'] ?>">
                      <i class="fas fa-trash">
                      </i>
                      Delete
                    </a>
                  <?php } ?>
                </td>
              </tr>
           
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "footer.html" ?>