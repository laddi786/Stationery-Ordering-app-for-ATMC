<?php
include 'header.php';
include 'sidebar.php';
?>
<?php
    if (isset($_POST['change-password']))
        {
                $id = $_SESSION['id'];
                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $confirmpassword= $_POST['confirmpassword'];
              
                            switch ($oldpassword) 
                        {
                   case $oldpassword == $newpassword:
                       $error = "oldpassword and newpassword cannot be same";
                       break;
                       case $newpassword != $confirmpassword;
                       $error = "newpassword and confirmpassword are different ";
                              break;
                         case $oldpassword != $newpassword && $newpassword == $confirmpassword;
                                  
                    $oldpassword = md5($oldpassword);
                    $newpassword = md5($newpassword);
                     $in = $conn->prepare("SELECT * FROM admin WHERE password='$oldpassword'");
                     $in->execute();
                     $a = $in->fetch();

                     if (empty($a)) {
                         $error = " old password is incorrect";
                     }else{
                        $ins = $conn->prepare("UPDATE admin SET password='$newpassword' WHERE id='$id'");
                        if ($ins->execute())
                        {
                            $success = "password updated";   
                          //  header('location: login.php');
                     }

                                break;
                        }
                   
                     }
}
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
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
                                            <label>Old password</label>
                                            <input type="password" class="form-control" name="oldpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="newpassword">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmpassword">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="change-password">Submit</button>
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