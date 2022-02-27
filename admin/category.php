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
#accordion-two .fas {
    float: right;
}
#accordion-two .card-header {
    cursor: pointer;
}
.card-header {
    border-bottom: none;
}
.card-header h5 {
    font-size: 1rem;
}
</style>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <?php include './includes/sidebar.php' ?>

        <main class="page-content">
            <div class="content-header">
                <h2>Category</h2>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-tachometer-alt"></i> Home</a></li>
                    <li>Products</li>
                    <li class="active">Category</li>
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
                                    <button type="button" data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</button>
                                </div>
                                <div class="table-responsive">
                                    <div id="DataTables_Tables_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="CategoryName: activate to sort column descending" style="width: 70%;">
                                                            Categories</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tools: activate to sort column descending" style="width: 30%;">
                                                            Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $conn = $pdo->open();

                                                            try {
                                                                $stmt = $conn->prepare("SELECT * FROM category");
                                                                $stmt->execute();
                                                                foreach($stmt as $row){
                                                                    echo "
                                                                        <tr role='row' class='odd'>
                                                                            <td>
                                                                                <div id='accordion-two' class='accordion'>
                                                                                    <div >
                                                                                        <div class='card-header'>
                                                                                            <h5 class='mb-0 collapsed' data-toggle='collapse' data-target='#".$row['category_name']."' aria-expanded='false' aria-controls='collapseOne1'>
                                                                                                <i class='fas fa-angle-down' aria-hidden='true'></i>".$row['category_name']."
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class='collapse' id=".$row['category_name']." data-parent='#accordion-two' style>
                                                                                            <div class='card-body'>
                                                                                                    <div>
                                                                                                        <div class='card-title' style='margin-bottom: 1.2rem;'>
                                                                                                            <button class='btn btn-primary btn-sm btn-flat addnewsub' data-id='".$row['category_id']."'>
                                                                                                            <i class='fa fa-plus'></i> New</button>
                                                                                                        </div> ";
                                                                                                        
                                                                                                        $stmt = $conn->prepare("SELECT * FROM sub_category");
                                                                                                        $stmt->execute();
                                                                                                        foreach ($stmt as $row2) {
                                                                                                            if($row2['main_id'] == $row['category_id']){
                                                                                                                echo "
                                                                                                                    <div class='row' style='margin-bottom: 1rem;'>
                                                                                                                        <div class='col-6 border-right'>
                                                                                                                        <h6>".$row2['name']."</h6>
                                                                                                                        </div>
                                                                                                                        <div class='col-6'>
                                                                                                                            <button class='btn btn-success btn-sm edit_sub btn-flat' data-id='".$row2['sub_id']."'><i class='fa fa-edit'></i> Edit</button>
                                                                                                                            <button class='btn btn-danger btn-sm delete_sub btn-flat' data-id='".$row2['sub_id']."'><i class='fa fa-trash'></i> Delete</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                ";
                                                                                                            }
                                                                                                        }
                                                                                                        
                                                                                echo    "
                                                                                
                                                                                </div>
                                                                                    </div>
                                                                                <div>
                                                                            </td>
                                                                            <td>
                                                                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['category_id']."'><i class='fa fa-edit'></i> Edit</button>
                                                                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['category_id']."'><i class='fa fa-trash'></i> Delete</button>
                                                                            </td>
                                                                        </tr>
                                                                    ";
                                                                }
                                                            }
                                                            catch(PDOException $e) {
                                                                echo $e->getMessage();
                                                            }

                                                            $pdo->close();
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="1" rowspan="1">Categories</th>
                                                            <th colspan="1" rowspan="1">Tools</th>
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
    <?php include 'includes/category_modal.php'; ?>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
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

  $(document).on('click', '.addnewsub', function(e){
    e.preventDefault();
    $('#addnewsub').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.edit_sub', function(e){
    e.preventDefault();
    $('#edit_sub').modal('show');
    var sid = $(this).data('id');
    getSubRow(sid);
  });

  $(document).on('click', '.delete_sub', function(e){
    e.preventDefault();
    $('#delete_sub').modal('show');
    var sid = $(this).data('id');
    getSubRow(sid);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.category_id);
      $('#edit_name').val(response.category_name);
      $('.catname').html(response.category_name);
    }
  });
}

function getSubRow(sid){
    $.ajax({
        type: 'POST',
        url: 'category_row.php',
        data: {sid:sid},
        dataType: 'json',
        success: function(response) {
            $('.subcatid').val(response.sub_id);
            $('#edit_catsub').val(response.name);
            $('.subcatname').html(response.name);
        }
    });
}
</script>