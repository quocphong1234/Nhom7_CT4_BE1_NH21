<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manufacture</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Manufacture</li>
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
            <th style="width: 8%" class="text-center">
                          manu_id
                      </th>
                      <th style="width: 8%" class="text-center">
                          manu_name
                      </th>
                      <th style="width: 20%" class="text-center">
                      Action
                      </th>
                      <th style="width: 30%">
                  </tr>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllManu = $manu->getAllManu();
            foreach ($getAllManu as $value) {
            ?>
              <tr>
                <td>
                  <?php echo $value['manu_id'] ?>
                </td>
                <td>
                  <?php echo $value['manu_name'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="edit-manufacture.php?manu_id=<?php echo $value['manu_id']?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" 
                          href="delmanufaceture.php?id=<?php echo $value['manu_id'] ?>">
                              
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