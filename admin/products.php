<?php 
include 'includes/session.php';

$where = '';
if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
}

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
                <h2>Product List</h2>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-tachometer-alt"></i> Home</a></li>
                    <li>E-Commerce</li>
                    <li class="active">Products</li>
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
                                    <button  data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</button>
                                    <div class="pull-right">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="category">Category: </label>
                                                <select name="category" id="select_category" class="form-control input-sm">
                                                    <option value="0">ALL</option>
                                                    <?php 
                                                        $conn = $pdo->open();

                                                        $stmt = $conn->prepare("SELECT * FROM category");
                                                        $stmt->execute();

                                                        foreach($stmt as $crow) {
                                                            $selected = ($crow['category_id'] == $catid) ? 'selected' : '';
                                                            echo "
                                                                <option value='".$crow['category_id']."' ".$selected.">".$crow['category_name']."</option>
                                                            ";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-stripped table-bordered zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedat="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 40%;">
                                                        Name</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15%;">
                                                        Photo</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">
                                                        Overview</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                                        Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 20%;">
                                                        Tools</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $conn = $pdo->open();

                                                        try {
                                                            $stmt = $conn->prepare("SELECT * FROM product $where");
                                                            $stmt->execute();
                                                            foreach($stmt as $row) {
                                                                echo "
                                                                    <tr>
                                                                        <td>".$row['product_name']."</td>
                                                                        <td>
                                                                            <button class='btn btn-info btn-sm btn-flat view-photo' data-id='".$row['product_id']."'><i class='fa fa-search'></i> View</button>
                                                                            <span class='float-right'><a href='#delete_photo' class='photo' data-toggle='modal' data-id='".$row['product_id']."'><i class='fa fa-trash'></i></a></span>
                                                                            <span class='float-right'><a href='#add_photo' class='photo' data-toggle='modal' data-id='".$row['product_id']."'><i class='fa fa-plus'></i></a></span>
                                                                        </td>
                                                                        <td><button class='btn btn-info btn-sm btn-flat desc' data-id='".$row['product_id']."'><i class='fa fa-search'></i> View</button></td>
                                                                        <td>".$row['product_price']."</td>
                                                                        <td>
                                                                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['product_id']."'><i class='fa fa-edit'></i> Edit</button>
                                                                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['product_id']."'><i class='fa fa-trash'></i> Delete</button>
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
                                                        <th rowspan="1" colspan="1">Name</th>
                                                        <th rowspan="1" colspan="1">Photo</th>
                                                        <th rowspan="1" colspan="1">Overview</th>
                                                        <th rowspan="1" colspan="1">Price</th>
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