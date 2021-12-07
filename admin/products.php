<?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 10%">
                          Name
                      </th>
                      <th style="width: 30%">
                          Image
                      </th>
                      <th>
                          Price
                      </th>
                      <th>
                          description
                      </th>
                      <th>
                          feature
                      </th>
                      <th style="width: 8%" class="text-center">
                          Manufacture
                      </th>
                      <th style="width: 8%" class="text-center">
                          Protype
                      </th>
                      <th style="width: 20%" class="text-center">
                      Action
                      </th>
                      <th style="width: 20%">
                  </tr>
              </thead>
              <tbody>
                <?php
                $getAllProducts = $product->getAllProducts();
                foreach($getAllProducts as $value):
                  ?>
                  <tr>
                      <td><?php echo $value['id'] ?></td>
                      <td><?php echo $value['name'] ?>
                      </td>
                      <td><img style="width:50px" src="../img/<?php echo $value['image'] ?>" alt="">
                       </td>
                      <td class="project_progress"><?php echo number_format($value['price']) ?> VND</td>
                      <td><?php echo $value['description'] ?>
                      </td>
                      <td><?php echo $value['feature'] ?>
                      </td>
                      <td class="project-state">
                         <?php echo $value['manu_name'] ?>
                      </td>
                      <td class="project-state">
                      <?php echo $value['type_name'] ?>
                      </td>
                      <td class="project-actions text-right"
                          href="edit.php?id=<?php echo $value['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" 
                          href="delproduct.php?id=<?php echo $value['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
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