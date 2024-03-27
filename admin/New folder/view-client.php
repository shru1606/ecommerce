<?php include_once 'header.php';

$sql_select = "select * from `client`";
$data = mysqli_query($conn,$sql_select);

if (isset($_GET['d_id']))
{
    $delete_id = $_GET['d_id'];

    $sql_select_img = "select * from `client` where `ID`='$delete_id'";
    $data_img = mysqli_query($conn,$sql_select_img);
    $row = mysqli_fetch_assoc($data_img);
    $delete_img = $row['Image'];

    unlink('image/'.$delete_img);
    
    $sql_delete = "delete from `client` where `ID`='$delete_id'";
    mysqli_query($conn,$sql_delete);

    header('location:view-client.php');
}

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View / Manage Your Clients </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View / Manage Clients</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead valign="center">
                  <tr>
                    <th align="center">Client Name</th>
                    <th align="center">Logo</th>
                    <th align="center">Edit Client</th>
                    <th align="center">Delete Client</th>
                  </tr>
                  </thead>
                  
                  <?php while ($row = mysqli_fetch_assoc($data)) { ?>

                   <tr>
                    <td><?php echo $row['Name']; ?></td>              
                    <td align="center">
                      <div style="width: 250px; height: 90px;"><img src="image/<?php echo $row['Image']; ?>" style="height: 100%; width: 100%; "></div></td>

                    <td><a href="edit-client.php?e_id=<?php echo $row['ID']; ?>" class="btn btn-primary">Edit</button></td>
                    <td><a href="view-client.php?d_id=<?php echo $row['ID']; ?>" class="btn btn-primary">Delete</button></td>
                  </tr>

                  <?php } ?>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include_once 'footer.php'; ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once 'scripts.php'; ?>
