<?php
include '../connection.php';
	
	$status = $_GET['status'];
	$id = $_GET['id'];
    $staffid=$conn->prepare("SELECT * FROM requests WHERE id='$id'");
    $staffid->execute();
    $staff = $staffid->fetch();

	$req_id = $staff['stationery_id'];

    $stock_prepare=$conn->prepare("SELECT * FROM stationery WHERE id='$req_id'");
    $stock_prepare->execute();
    $stock = $stock_prepare->fetch();


    $request_qty=$staff['qty'];

		if ($stock['total_stock'] < $request_qty) {
			$_SESSION['error_message'] = "product is out of stock";
			// echo "product is out of stock";
			 header('location:requests.php');
		}else{


		    if ($status == 'rejected') {

		    	$date= date('Y-m-d');
		    	$s=$conn->prepare("UPDATE requests SET status='$status', updated_at='$date' WHERE id = '$id'");
		    	  if($s->execute()){
			    	
			        header('location:requests.php');
			    }

		    }else{
		    $st_id = $staff['stationery_id'];
		    $date = date('Y-m-d');

			$s=$conn->prepare("UPDATE requests SET status='$status',updated_at='$date' WHERE id = '$id'");


			 $sta_id= $conn->prepare("SELECT total_stock FROM stationery WHERE id='$st_id'");
			 $sta_id->execute();
			 $stat= $sta_id->fetch();
		     $total_stock=$stat['total_stock'];

			  $total_stock= $total_stock - $request_qty;
				
			   $update_stock = $conn->prepare("UPDATE stationery SET total_stock='$total_stock' WHERE id='$st_id'");
			   // print_r($update_stock);
		    // 	die;
			   $update_stock->execute();
			 	
			    if($s->execute()){

			        header('location:requests.php');
			    }
		}
}