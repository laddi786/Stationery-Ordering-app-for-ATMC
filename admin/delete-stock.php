<?php   
include '../connection.php';  
?>
<?php
        $id=$_GET['id'];
        $sd=$conn->prepare("DELETE FROM stationery WHERE id = '$id'");
        $sd->execute();
        $v=$sd->fetch();
        header('location:view-stock.php');
        
        ?>
