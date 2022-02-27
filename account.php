<title>Account</title>
<?php 
  include 'includes/session.php';
  include 'includes/header.php';
?>
<?php
  if(isset($_SESSION['user'])){
    $id = $user['customer_id'];
  }
  else {
    header('location: login.php');
  }
?>
<style>
.navigation {
  background-color: #222;
}
.dashboard-menu .nav-link.active{
  background-color: #222;
  color: #fff;
}
.product-info img{
  width: 150px;
  height: 100px;
  margin-right: 25px;
}
</style>
<body>
<?php include 'includes/navbar.php'; ?>
<!-- main wrapper -->
<div class="main-wrapper">
  <!-- breadcrumb -->
  <nav class="py-3">
  <div class="container">
    <div class="content">
      <h2>Dashboard</h2>
    </div>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Accounts</li>
    </ol>
  </div>
  </nav>
  
  <!-- /breadcrumb -->
  <section class="user-dashboard section">
    <div class="container">
    <?php
	  if(isset($_SESSION['error'])){
	  	echo "
	  		<div class='callout callout-danger'>
	  			".$_SESSION['error']."
	  		</div>
	  	";
	  	unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
      echo "
        <div class='callout callout-success'>
          ".$_SESSION['success']."
        </div>
      ";
      unset($_SESSION['success']);
    }
	?>
      <div class="row">
        <div class="col-md-12">
          <ul class="list-inline dashboard-menu justify-content-center nav nav-tabs" id="nav-tab" role="tablist">
            <li class="list-inline-item"><a class="nav-item nav-link active" href="#nav-account" id="nav-tab-account" data-toggle="tab" aria-controls="nav-account" aria-selected="true" role="tab">Dashboard</a></li>
            <li class="list-inline-item"><a class="nav-item nav-link" href="#nav-orders" id="nav-tab-orders" data-toggle="tab" aria-controls="nav-orders" aria-selected="false" role="tab">Orders</a></li>
            <li class="list-inline-item"><a class="nav-item nav-link" href="#nav-address" id="nav-tab-addr" data-toggle="tab" aria-controls="nav-address" aria-selected="false" role="tab">Address</a></li>
            <li class="list-inline-item"><a class="nav-item nav-link" href="#nav-profile-details" id="nav-tab-details" data-toggle="tab" aria-controls="nav-details" aria-selected="false" role="tab">Profile Details</a></li>
          </ul>
          <!-- tab-content -->
          <div class="tab-content" id="nav-tabContent">
            <!-- dashboard -->
            <div class="dashboard-wrapper user-dashboard tab-pane fade active show" id="nav-account" role="tabpanel" aria-labelledby="nav-tab-account">
              <div class="media">
                <div class="pull-left mr-3">
                  <img class="media-object user-img" src="images/avator.jpg" alt="Image">
                </div>
                <div class="media-body align-self-center">
                  <h2 class="media-heading">Welcome <?=$user['first_name'] ?> <?=$user['last_name']?></h2>
                  <p class="media-heading">(not <?=$user['first_name'] ?> <?=$user['last_name']?>? <a href="logout.php">Logout)</a></p>
                  <p class="mb-0">From your account dashboard you can view your recent orders and their status, and edit your password and account details. </p>
                </div>
              </div>
            </div>
            <!-- /dashboard -->
            <!-- orders -->
            <div class="dashboard-wrapper user-dashboard tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-tab-orders">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Date</th>
                      <th>Items</th>
                      <th>Total Price</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $conn = $pdo->open();

                      try{
                        $stmt = $conn->prepare("SELECT * FROM payment WHERE user_id=:user_id ORDER BY sale_date DESC");
                        $stmt->execute(['user_id'=>$user['customer_id']]);

                        foreach($stmt as $row){
                          $stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN product ON product.product_id=details.pro_id WHERE sales_id=:id");
                          $stmt2->execute(['id'=>$row['id']]);
                          $total = 0;
                          foreach($stmt2 as $row2){
                            $subtotal = $row2['product_price'] * $row2['qty'];
                            $total += $subtotal;

                            echo '<tr>
                            <td>#'.$row['pay_id'].'</td>
                            <td>'.date('M d, Y', strtotime($row['sale_date'])).'</td>
                            <td>'.$row2['qty'].'</td>
                            <td>&#8377; '.number_format($total, 2).'</td>
                            <td><span class="badge badge-primary">Processing</span></td>
                            <td><a href="#" class="btn btn-sm btn-outline-primary transact" data-id='.$row['id'].'>View</a></td>
                          </tr>';
                          }
                        }
                      }
                      catch(PDOException $e){
                        echo $e->getMessage();
                      }
                      $pdo->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /orders -->
            <!-- addrress -->
            <div class="dashboard-wrapper user-dashboard tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-tab-addr">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>PIN Code</th>
                      <th>Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $conn = $pdo->open();
                      try{
                        $stmt = $conn->prepare("SELECT * FROM addresses LEFT JOIN payment ON payment.pay_id=addresses.token WHERE addresses.user_id=:id");
                        $stmt->execute(['id'=>$user['customer_id']]);
                      }
                      catch(PDOException $e){
                        echo $e->getMessage();
                      }
                    ?>
                    <?php foreach($stmt as $row): ?>
                    <tr>
                      <td><?=$row['pay_id']?></td>
                      <td><?=$row['full_name']?></td>
                      <td><?=$row['addr1']?> <?=$row['addr2']?></td>
                      <td><?=$row['pin']?></td>
                      <td>+91 <?=$row['phone_no']?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /address -->
            <!-- profile -->
            <div class="dashboard-wrapper dashboard-user-profile tab-pane fade" id="nav-profile-details" role="tabpanel" aria-labelledby="nav-tab-details">
              
                <form method="POST" id="edit-form" action="profile_edit.php" class="media">
                <div class="text-center">
                  <img class="media-object user-img" src="images/avator.jpg" alt="Image">
                  <p class="mt-5">Change Image</p>
                  <input type="file" name="photo" class="btn btn-sm mt-3 d-block" />
                </div>
                <div class="col-12 col-md-7 col-sm-12 col-lg-9">
                  <div class="acccount-settings">
                    <h3 class="mb-4">Account information</h3>
                    
                      <div class="form-row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="<?=$user['first_name']?>">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="<?=$user['last_name']?>">
                          </div>
                        </div>
                      </div>

                      <div class="form-group mb-4">
                        <label>Phone Number </label>
                        <input type="text" name="pnum" class="form-control" value="<?=$user['mobile_no']?>">
                      </div>
                      <div class="form-group mb-4">
                        <label>Email address </label>
                        <input type="email" name="email" class="form-control" value="<?=$user['email_id']?>">
                      </div>

                      <h3>Password change</h3>
                      <div class="form-group">
                        <label>Password </label>
                        <input type="password" name="passwd" class="form-control" value="<?=$user['password']?>">
                      </div>

                      <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="c_passwd" class="form-control" value="" required>
                        <p class="mt-2">Input current password to save changes.</p>
                      </div>

                      <button type="submit" id="edit-btn" name="edit" class="btn btn-dark">Save Changes</button>
                    
                  </div>
                </div>
                </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog  model-dialog-centered modal-xl">
        <div class="modal-content" style="width: 40rem;">
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
                    <td colspan="3" align="right"><b>Total</b></td>
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
<?php include 'includes/footer.php'; ?>
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
			url: 'transaction.php',
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