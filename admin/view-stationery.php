
<?php
include 'header.php';
include 'sidebar.php';
            $s=$conn->prepare("SELECT * FROM stationery");
            $s->execute();
            $v=$s->fetchAll();
?> <!-- DataTables Responsive CSS -->
<style type="text/css">
    i{
        color: #337ab7;
    }
</style>

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
                                        <th>Name</th>                                        
                                        <!-- <th>Daily Limit</th> --> 
                                        <!-- <th>Total Stock</th> -->                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($v as $key){ 
                                        if($key['is_delete'] == 0){
                                        ?>
                                    <tr class="odd gradeX">
                                        <td><?=$i++?></td>
                                        
                                        <td><?=$key['name']?></td>
                                        <!-- <td><?=$key['d_limit']?></td> -->
                                        <!-- <?php if ($key['total_stock'] > 20) {
                                                ?>
                                                <td><p class="label label-success" style="padding: 5%;"><?=$key['total_stock']?></p></td>
                                                <?php
                                            }else{ ?>
                                                <td><p class="label label-danger" style="padding: 5%;"><?=$key['total_stock']?></p></td>
                                            <?php } ?> -->
                                             <td>
                                            <a href="edit-stationery.php?id=<?=$key['id']?>"><i class="fa fa-pencil"></i></a>
                                            <a href="delete-stationery.php?id=<?=$key['id']?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
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

