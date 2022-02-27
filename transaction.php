<?php
  include 'includes/session.php';

  $id = $_POST['id'];
  $conn = $pdo->open();

  $output = array('list'=>'');

  $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN product ON product.product_id=details.pro_id LEFT JOIN payment ON payment.id=details.sales_id WHERE details.sales_id=:id");
  $stmt->execute(['id'=>$id]);

  $total = 0;
  foreach($stmt as $row){
    $output['transaction'] = $row['pay_id'];
    $output['date'] = date('M d, Y', strtotime($row['sale_date']));
    $subtotal = $row['product_price'] * $row['qty'];
    $total += $subtotal;
    $output['list'] .= "<tr class='prepend_items'>
    <td>".$row['product_name']."</td>
    <td>&#8377; ".number_format($row['product_price'], 2)."</td>
    <td>".$row['qty']."</td>
    <td>&#8377; ".number_format($subtotal, 2)."</td>
  </tr>";
  }
  $output['total'] = '<b>&#8377; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output); 
?>