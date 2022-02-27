<?php 
  include './includes/session.php';
  include './includes/header.php';
?>
<style>
.btn-primary {
    color: #fff;
    background-color: #6e00ff;
    border-color: #6e00ff;
}
.btn-primary:hover {
    border-color: #6610f2;
    background-color: #6610f2;
}
.btn-secondary {
    color: #212529;
    background-color: #c0c2c3;
    border-color: #c0c2c3;
}
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
}
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
    float: left;
}
.form-horizontal label {
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.col-sm-3 {
    width: 25%;
}
.col-sm-9, .col-sm-3 {
    float: left;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.modal-footer .btn {
    font-size: 0.8rem;
}
.modal-title {
    font-size: 1rem;
}
</style>
<body>
  <div class="page-wrapper chiller-theme toggled">
    <?php include './includes/sidebar.php'; ?>

    <main class="page-content">
      <div class="content-header">
        <h2>Brands List</h2>
        <hr>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-tachometer-alt"></i> Home</a></li>
          <li>E-Commerce</li>
          <li class="active">Brands</li>
        </ol>
      </div>
      <!-- Main Content -->
      <section class="content">
        <?php
          if(isset($_SESSION['error'])){
          echo "
              <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
              </div>
          ";
          unset($_SESSION['error']);
          }
          if(isset($_SESSION['success'])){
          echo "
              <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
              </div>
          ";
          unset($_SESSION['success']);
          }
        ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <button type="button" data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat" id="addbrand"><i class="fa fa-plus"></i> New</button>
                  <div class="table-responsive">
                    <div id="DataTables_Tables_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                      <div class="row">
                        <div class="col-sm-12">
                          <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                              <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="BrandName: activate to sort column descending" style="width: 60%;">
                                Brands</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tools: activate to sort column descending" style="width: 40%;">
                                Tools</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $conn = $pdo->open();

                                try {
                                  $stmt = $conn->prepare("SELECT * FROM brands");
                                  $stmt->execute();
                                  foreach($stmt as $row) {
                                    echo "
                                      <tr>
                                        <td>".$row['brand_name']."</td>
                                        <td>
                                          <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['brand_id']."'><i class='fa fa-edit'></i> Edit</button>
                                          <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['brand_id']."'><i class='fa fa-trash'></i> Delete</button>
                                        </td>
                                      </tr>
                                    ";
                                  }
                                }
                                catch(PDOException $e) {
                                  echo $e->getMessage();
                                $pdo->close();
                                }
                              ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th rowspan="1" colspan="1">Brands</th>
                                <th rowspan="1" colspan="1">Tools</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <?php include 'includes/brand_modal.php' ?>
</body>
<?php include 'includes/scripts.php'; ?>
<script>

$('#addbrand').click(function(e){
  e.preventDefault();
});

$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id) {
  $.ajax({
    type: 'POST',
    url: 'brand_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.brand_id);
      $('#edit_name').val(response.brand_name);
      $('.catname').html(response.brand_name);
    }
  });
}
</script>