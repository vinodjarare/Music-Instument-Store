<?php 
include 'includes/session.php';
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
.form-group label {
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
.default-tab .nav .nav-item a {
    color: #000;
}
</style>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include './includes/sidebar.php' ?>

        <main class="page-content">
            <div class="content-header">
                <h2>Users</h2>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-tachometer-alt"></i> Home</a></li>
                    <li>Components</li>
                    <li class="active">Users</li>
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
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedat="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 20%;">
                                                        Photo</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 20%;">
                                                        Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%;">
                                                        Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                                                        Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 20%;">
                                                        Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $conn = $pdo->open();

                                                        try {
                                                            $stmt = $conn->prepare("SELECT * FROM customer WHERE type=:type");
                                                            $stmt->execute(['type'=>0]);
                                                            foreach($stmt as $row) {
                                                                echo "
                                                                    <tr>
                                                                        <td>
                                                                          <img src='../images/users/".$row['image']."' height='30px' width='30px' alt='profile'>
                                                                        </td>
                                                                        <td>".$row['email_id']."</td>
                                                                        <td>".$row['first_name'].' '.$row['last_name']."</td>
                                                                        <td>Active</td>
                                                                        <td>
                                                                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['customer_id']."'><i class='fa fa-trash'></i> Delete</button>
                                                                        </td>
                                                                    </tr>
                                                                ";
                                                            }
                                                        }
                                                        catch(PDOException $e) {
                                                            $_SESSION['error'] = $e->getMessage();
                                                        }

                                                        $pdo->close();
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Photo</th>
                                                        <th rowspan="1" colspan="1">Email</th>
                                                        <th rowspan="1" colspan="1">Name</th>
                                                        <th rowspan="1" colspan="1">Status</th>
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
            </section>
        </main>
    </div>
    <?php 
        include 'includes/products_modal.php';
        include 'includes/image_modal.php';
    ?>
</body>
<?php include 'includes/scripts.php'; ?>
<script src="js/productScript.js"></script>
<script>
  $(function(){
    $(document).on('click', '.delete', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var fullname = getRow(id);

      swal({
        title: fullname,
        text: 'Delete this user?',
        type: 'warning',
        showCancelButton: !0,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it !!",
        cancelButtonText: "No, cancel it !!",
        closeOnConfirm: !1,
        closeOnCancel: !1
      }, function(e){
        e ? $.ajax({
          type: 'POST',
          url: 'user_delete.php',
          data: {id:id},
          dataType: 'json',
          success: function(response){
            swal({
              title: "Deleted !!",
              text: response.output,
              type: "success",
              closeOnConfirm: !1
            }, function(){
              window.location.reload();
            })
          }
        }): swal("Canceled !", "Your request has been cancelled !!", "error");
      });
    });
  });

  function getRow(id){
    var name;
    $.ajax({
      async: false,
      type: 'POST',
      url: 'users_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        name = response.first_name + ' ' + response.last_name;
      }
    });
    return name;
  }
</script>