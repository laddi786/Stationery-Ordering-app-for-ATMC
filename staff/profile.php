<?php
include 'header.php';
include 'sidebar.php';
?>
<?php
    
     
     $id=$_SESSION['id'];
     $s=$conn->prepare("SELECT * FROM admin WHERE id= '$id' AND type='staff'");
     $s->execute();
     $v=$s->fetch();

if (isset($_POST['submit'])) {

    $username=$_POST['username'];

    $s=$conn->prepare("UPDATE admin SET username='$username' WHERE id = '$id'");
    $s->execute();
    // header('location:dashboard.php');
    $success = "Name sucessfully changed";
    
    $s=$conn->prepare("SELECT * FROM admin WHERE id= '$id' AND type='staff'");
    $s->execute();
    $v=$s->fetch();
}

?>




<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
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
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($success)){ ?>
                                        <div class="alert alert-success">
                                            <?=$success?>
                                        </div>
                                    <?php } ?>
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" value="<?=$v['username']?>" name="username"><br>
                                              
                                        </div>
                                        <button name="submit" class=" pull-right btn btn-primary">Update Profile</button>
                                        
                                          
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