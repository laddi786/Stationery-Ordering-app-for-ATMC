<?php
include 'header.php';
include 'sidebar.php';
?>
  
  <?php


   $id=$_GET['id'];
   $s=$conn->prepare("SELECT * FROM admin WHERE id = '$id'");
   $s->execute();
   $v=$s->fetch();

if (isset($_POST['submit'])) {

    $username=$_POST['username'];
    $type_name=$_POST['type_name'];


    $s=$conn->prepare("UPDATE admin SET username='$username', type_name='$type_name' WHERE id = '$id'");
    if($s->execute()){
        $success = "Staff Profile Updated Successfully";

       $s=$conn->prepare("SELECT * FROM admin WHERE id = '$id'");
       $s->execute();
       $v=$s->fetch();


    }
    
}







?>




<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">STAFF</h1>
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
                            <?=$success?> <a href="view-staff.php">Go Back</a>
                        </div>
                    <?php } ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post">
                                        <div class="form-group">
                                            <label>Staff Name</label>
                                            <input class="form-control" type="text" value="<?=$v['username']?>" name="username"><br>
                                             <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" value="<?=$v['type_name']?>" name="type_name">
                                    
                                </div>
                                              
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