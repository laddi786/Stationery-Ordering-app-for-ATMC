
<?php
include 'header.php';
include 'sidebar.php';
            $s=$conn->prepare("SELECT * FROM stationery");
            $s->execute();
            $v=$s->fetchAll();
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
                            <table id="example" class="display table table-bordered dataTable no-footer" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
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
                                        <td>

                                            <a href="request-stationery.php?id=<?=$key['id']?>" class="btn btn-primary btn-sm">Request For Stationery <i class="fa fa-arrow-right"></i></a>
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
?>
 