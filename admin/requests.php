
<?php
include 'header.php';
include 'sidebar.php';
        
        $u=$conn->prepare("SELECT * FROM requests");
        $u->execute();
        $b=$u->fetchAll();
?> 
<style type="text/css">
    i{
        color: black;
    }
</style>

    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Request</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>

                         <?php

                            if(isset($_SESSION['error_message'])){ ?>
                                        <div class="alert alert-danger">
                                            <?=$_SESSION['error_message']?>
                                        </div>
                                    <?php }
                                    unset($_SESSION['error_message']);
                                     ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Staff Name</th>
                                        <th>Stationery</th>
                                        <th>Qty</th>
                                        <th>Request Date</th>
                                        <th>Approved Date</th>
                                        <!-- <th>status</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($b as $key){ 
                                       
                                        ?>
                                    <tr class="odd gradeX">
                                    <?php
                                        $id = $key['id'];
                                        $s=$conn->prepare("SELECT tr.`id`, tr.`qty` as 'request_qty',tr.`status` as 'request_status',ta.`username` as 'staff_name',ta.`email` as 'staff_email',ts.`name` as 'stationery_name' ,tr.`created_at` as `request_date`,tr.`updated_at`as `updated` FROM requests tr INNER JOIN admin ta ON tr.`staff_id` = ta.`id` INNER JOIN stationery ts ON tr.`stationery_id` = ts.`id` WHERE tr.`id` = '$id'");
                                        $s->execute();
                                        $v=$s->fetchAll();
                                        $date = explode(" ",$v[0]['request_date']);
                                    ?>
                                        <td><?=$i++?></td>
                                        <td><?=$v[0]['staff_name']?></td>
                                        <td><?=$v[0]['stationery_name']?></td>
                                        <td><?=$v[0]['request_qty']?></td>
                                        <td><?=$date[0]?></td>
                                        <?php if ($key['status']=='approved') {
                                           ?> <td><?=$v[0]['updated']?></td><?php
                                        } 
                                        else{
                                           ?> <td>-</td>
                                      <?php  }?>
                                        
                                        <td>
                                            <?php 


                                            if($key['status'] != "approved" && $key['status'] != "rejected"){ ?>
                                            <a href="accept.php?status=approved&id=<?=$key['id']?>" class="btn btn-success btn-sm">Accept</a>
                                            <a href="accept.php?status=rejected&id=<?=$key['id']?>" class="btn btn-danger btn-sm">Reject</a>
                                        <?php }elseif($key['status'] == "approved"){
                                            ?>
                                            <label class="label label-success"><?=$key['status']?></label>
                                            <?php
                                        }  elseif($key['status'] == "rejected"){
                                            ?>
                                            <label class="label label-danger"><?=$key['status']?></label>
                                            <?php
                                        } 


                                        ?>
                                        </td>
                                    </tr>
                                <?php 
                                } ?>

                                </tbody>
                            </table>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
         
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
include 'footer.php';
?>
