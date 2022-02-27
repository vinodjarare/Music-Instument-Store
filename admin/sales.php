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
        <h2>Sales History</h2>
        <hr>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-tachometer-alt"></i> Home</a></li>
          <li>Components</li>
          <li class="active">Sales</li>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Date: activate to sort column descending" style="width: 10%;">
                                Date</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Buyer Name: activate to sort column descending" style="width: 10%;">
                                Buyer Name</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order ID: activate to sort column descending" style="width: 60%;">
                                Order ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Amount: activate to sort column descending" style="width: 10%;">
                                Amount</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full Details: activate to sort column descending" style="width: 10%;">
                                Full Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $conn = $pdo->open();

                                try {
                                  $stmt = $conn->prepare("SELECT * FROM payment LEFT JOIN customer ON customer.customer_id=payment.user_id ORDER BY sale_date DESC");
                                  $stmt->execute();
                                  foreach($stmt as $row) {
                                    $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN product ON product.product_id=details.pro_id WHERE details.sales_id=:id");
                                    $stmt->execute(['id'=>$row['id']]);
                                    $total = 0;
                                    foreach($stmt as $details){
                                      $subtotal = $details['product_price'] * $details['qty'];
                                      $total += $subtotal;
                                    }
                                    echo "
                                      <tr>
                                        <td>".date('M d, Y', strtotime($row['sale_date']))."</td>
                                        <td>".$row['first_name']. ' '.$row['last_name']."</td>
                                        <td>".$row['pay_id']."</td>
                                        <td>&#8377; ".number_format($total, 2)."</td>
                                        <td>
                                          <button class='btn btn-info btn-sm transact btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> View</button>
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
                                <th rowspan="1" colspan="1">Date</th>
                                <th rowspan="1" colspan="1">Buyer Name</th>
                                <th rowspan="1" colspan="1">Order Id</th>
                                <th rowspan="1" colspan="1">Amount</th>
                                <th rowspan="1" colspan="1">Full Details</th>
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
    <!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog  model-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="justify-content-between">
                Date: <span id="date"></span><br>
                <span>Transaction#: <span id="transid"></span></span> 
              </div>
              <table class="table table-responsive">
                <thead>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="3"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>