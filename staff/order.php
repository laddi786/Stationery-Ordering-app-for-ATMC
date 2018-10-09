
<?php
include 'header.php';
include 'sidebar.php';
            $id = $_SESSION['id'];
            $s=$conn->prepare("SELECT * FROM requests where staff_id = '$id'");
            $s->execute();
            $v=$s->fetchAll();
?> 


    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Stationery</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Staff Name</th>
                                        <th>Stationery</th>
                                        <th>qty</th>
                                        <th>Ordered on</th>
                                        <th>Updated on</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($v as $key){ 
                                        ?>
                                    <tr class="odd gradeX">

                                        <?php
                                        $id = $key['id'];
                                        $s=$conn->prepare("SELECT tr.`id`, tr.`qty` as 'request_qty',tr.`status` as 'request_status',tr.`created_at` as 'created_at',tr.`updated_at` as 'updated_at',ta.`username` as 'staff_name',ta.`email` as 'staff_email',ts.`name` as 'stationery_name' FROM requests tr INNER JOIN admin ta ON tr.`staff_id` = ta.`id` INNER JOIN stationery ts ON tr.`stationery_id` = ts.`id` WHERE tr.`id` = '$id'");
                                        $s->execute();
                                        $v=$s->fetchAll();
                                        $data=explode(" ",$v[0]['created_at'])
                                        ?>
                                        <td><?=$i++?></td>
                                        <td><?=$v[0]['staff_name']?></td>
                                        <td><?=$v[0]['stationery_name']?></td>
                                        <td><?=$v[0]['request_qty']?></td>
                                        <td><?=$data[0]?></td>
                                        <td><?=$v[0]['updated_at']?></td>

                                        <td><?php 
                                            if ($key['status'] == "approved") {
                                                ?>
                                                <label class="label label-success">approved</label>
                                    <?php } ?> <?php if ($key['status'] == "rejected"){ ?>
                                        
                                                <label class="label label-danger">rejected</label>
                                            <?php }?>
                                            <?php if ($key['status'] == "pending"){ ?>
                                        
                                                <label class="label label-danger">pending</label>
                                            <?php }?>
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
?>    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

