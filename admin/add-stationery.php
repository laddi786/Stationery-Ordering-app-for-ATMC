<?php
include 'header.php';
include 'sidebar.php';

?>
<?php
    if (isset($_POST['add-stationery']) && !empty($_POST))
    {
        
        $name=$_POST['name'];
        
        if (empty($name))
        {
           $error = "please fill all field";
        }
        else
        {
            
            
            $delete = 0;
            $s=$conn->prepare("SELECT * FROM stationery WHERE name = '$name' and is_delete=0");
            $s->execute();
            $v=$s->fetch();
            if (empty($v)) {
            $s=$conn->prepare("INSERT INTO stationery(name,is_delete) VALUES ('$name','$delete')");
            if($s->execute()){
                $success = "stationery add successfully";
            }
            }else{
                $error = "name already exists";
            } 
        }
    }

?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Stationery</h1>
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
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="add-stationery">Submit</button>
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