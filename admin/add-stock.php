<?php
include 'header.php';
include 'sidebar.php';  
?>       
<?php 
            $s=$conn->prepare("SELECT * FROM stationery WHERE is_delete = '0'");
            $s->execute();
            $stationery=$s->fetchAll();

            if (isset($_POST['add-quantity'])) {

            $id = $_POST['name'];
            $threshold_value = $_POST['threshold'];
            
            $s=$conn->prepare("SELECT * FROM stationery WHERE  id = '$id'");
            $s->execute();
            $stationery_id=$s->fetch();


           $total_stock= $stationery_id['total_stock'] + $_POST['quantity'];
          
           // $total_stock=$_POST['total_stock']
            $m=$conn->prepare("UPDATE stationery SET total_stock=
            '$total_stock', threshold_value='$threshold_value' WHERE id= '$id' ");
               if($m->execute()){
                    $success = "stock added successfully";
              }
        }

?>                       
        <div id="page-wrapper"> 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Stock</h1>
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
                                    <?php if(isset($success)){ ?>
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
                                            <label>Name</label>                        
                                            <select class="form-control" name="name">
                                                <?php foreach($stationery as $key){?>
                                                <option value="<?=$key['id']?>">
                                                <?=$key['name']?>   
                                                </option>
                                           <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Threshold Value Of Stock</label>                        
                                            <input type="number" min="1" class="form-control" name="threshold">
                                            </type>
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" min="1" class="form-control" name="quantity" required>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="add-quantity">Add Stock</button>
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