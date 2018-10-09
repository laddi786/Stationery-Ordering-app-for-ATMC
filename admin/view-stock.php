<?php
    include 'header.php';
    include 'sidebar.php';

    $data = $conn->prepare("SELECT * FROM stationery WHERE  is_delete = '0'");
    $data->execute();
    $stock = $data->fetchAll();
         
?>

<!-- DataTables Responsive CSS -->
<style type="text/css">
    i{
        color: black;
    }
</style>

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Stock</h1>
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
                            <div></div>
                             <form action="download-excel.php" method="post" id="export-form">
                             <input type="hidden" value='' id='hidden-type' name='ExportType'/>
                               </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Quantity</th>
                                        <th>Stationary Name</th>
                                        <th>Last Update on</th> 
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                    foreach ($stock as $viewstock) {
                                        $date=explode(" ",$viewstock['created_at']);
                                        ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <?php if ($viewstock['threshold_value'] < $viewstock['total_stock']) {
                                                ?>
                                                <td><p class="label label-success" style="padding: 5%;"><?=$viewstock['total_stock']?></p></td>
                                                <?php
                                            }else{ ?>
                                                <td><p class="label label-danger" style="padding: 5%;"><?=$viewstock['total_stock']?></p></td>
                                            <?php } ?>
                                            
                                            
                                            <td style="text-transform: capitalize;"><?=$viewstock['name']?></td>
                                            <td><?=$date[0]?></td>
                                            <td>
                                            <a href="edit-stock.php?id=<?=$viewstock['id']?>"><i class="btn btn-success">Update</i></a>
                                            <a href="delete-stock.php?id=<?=$viewstock['id']?>"><i class="btn btn-danger">Delete</i></a>
                                        </td>
                                            
                                        </tr>
                                        <?php
                                    }
                                ?>


                                </tbody>
                            </table>
                            <a href="javascript:void(0)" id="export-to-excel" class="btn btn-primary">Export to excel</a>
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
<script  type="text/javascript">
    $(document).ready(function() {
        $('#export-to-excel').bind("click", function() {
            var target = $(this).attr('id');
                switch(target) {
                    case 'export-to-excel' :
                     $('#hidden-type').val(target);
                     $('#export-form').submit();
                     $('#hidden-type').val('');
                     break
                }
        });
    });
</script>