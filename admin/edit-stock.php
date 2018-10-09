<?php
include 'header.php';
include 'sidebar.php';  
?>  
<?php     
        $id=$_GET['id'];

        // $sd=$conn->prepare("SELECT * FROM stock WHERE id = '$id'");
        // $sd->execute();
        // $v=$sd->fetch();

        $data = $conn->prepare("SELECT * FROM stationery WHERE id = '$id'");

        $data->execute();
        $v=$data->fetch();


    if (isset($_POST['edit-quantity'])) {

        $total_stock=$_POST['total_stock'];

        $sd=$conn->prepare("UPDATE stationery SET total_stock='$total_stock' WHERE id ='$id'");
        $sd->execute();
        //header('location: dashboard.php');
        $success = "sucessfully changed";
        $data = $conn->prepare("SELECT * FROM stationery WHERE id = '$id'");

        $data->execute();
        $v=$data->fetch();

        
    }
               

?>                       
        <div id="page-wrapper"> 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Stock</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php


                                     if(isset($success)){ ?>
                                        <div class="alert alert-success">
                                            <?=$success?>
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($error)){ ?>
                                        <div class="alert alert-danger">
                                            <?=$error?>
                                        </div>
                                    <?php } ?>
                                    <form role="form" method="post">

                                        <div class="form-group">
                                            <label>Stationary Name : <?=$v['name']?></label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" min="1" class="form-control" name="total_stock" value="<?=$v['total_stock']?>">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="edit-quantity">Add Stock</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
include 'footer.php';
?>