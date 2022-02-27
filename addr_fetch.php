<?php
  include 'includes/session.php';

  $output = array('list'=>'', 'error'=> false);

  $conn = $pdo->open();
  try{
    $stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id=:id");
    $stmt->execute(['id'=>$user['customer_id']]);
    $addr = $stmt->fetchAll();

    if(count($addr) > 0){
      $output['error'] = false;
      $output['list'] .= '<div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Address</th>
            <th>PIN Code</th>
            <th>Phone Number</th>
          </tr>
        </thead>
        <tbody>';
          foreach($addr as $row){
            $output['list'] .= '<tr>
            <td>
              <label for="addrSelect"></label>
              <input type="radio" name="addrSelect" id="addr" value="'.$row['id'].'">
            </td>
            <td>'.$row['full_name'].'</td>
            <td>'.$row['addr1'].' '.$row['addr2'].'</td>
            <td>'.$row['pin'].'</td>
            <td>'.$row['phpne_no'].'</td>
          </tr>';
          }
        $output['list'] .= '</tbody>
        </table>
        </div>';
    }
    else{
      $output['list'] .= '<div class="col-md-6 text-center">
      <h4 class="mb-3">You have no saved addresses.</h4>
      </div>';
    }
  }
  catch(PDOException $e){
    $output['error'] = true;
    $output['error'] =  $e->getMessage();
  }
  
  $pdo->close();
  echo json_encode($output);
?>