
<?php
include 'header.php';
include 'sidebar.php';
            $s=$conn->prepare("SELECT * FROM admin");
            $s->execute();
            $v=$s->fetchAll();
           
?> <!-- DataTables Responsive CSS -->
<style type="text/css">
    i{
        color: #337ab7;
    }
</style>

    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Staff</h1>
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
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($v as $key){ 
                                        if($key['type'] == "staff" && $key['is_delete'] == 0){

                                        ?>
                                    <tr class="odd gradeX">
                                        <td><?=$i++?></td>
                                        <td><?=$key['username']?></td>
                                        <td><?=$key['email']?></td>
                                        <td style="text-transform: capitalize;"><?=$key['type_name']?></td>
                                        <td>
                                            <a href="edit-staff.php?id=<?=$key['id']?>" class="btn btn-success btn-circle">
                                                <i style="color:White;" class="fa fa-pencil"></i>
                                            </a>
                                            <a href="delete-staff.php?id=<?=$key['id']?>" class="btn btn-danger btn-circle">
                                                <i style="color:White;" class="fa fa-trash"></i>
                                            </a>
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