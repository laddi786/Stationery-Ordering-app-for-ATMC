<?php
include 'header.php';
include 'sidebar.php';

?>
<?php
$id=$_GET['id'];


if (isset($_POST['submit'])) {


    $name=$_POST['name'];

    // $date = date('Y-m-d');
    $s=$conn->prepare("UPDATE stationery SET name='$name' WHERE id ='$id'");

    if($s->execute()){
        $success = "Stationery Updated Successfully";
    }
    
    // header('location:dashboard.php'); 
}
     $s=$conn->prepare("SELECT * FROM stationery WHERE id = '$id'");
     $s->execute();
     $v=$s->fetch();

?>




<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stationery</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            Basic Form Elements
                        </div> -->
                        <?php if(isset($success)){ ?>
                        <div class="alert alert-success">
                            <?=$success?> <a href="dashboard.php">Go Back</a>
                        </div>
                    <?php } ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" value="<?=$v['name']?>" name="name"><br>
                                              
                                        </div>
                                        <button name="submit" class=" pull-right btn btn-primary">Update </button>
                                        
                                          
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