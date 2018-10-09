<?php
include 'header.php';
include 'sidebar.php';
?>
<?php
    if (isset($_POST['add-staff']) && !empty($_POST))
    {
  
        $username=$_POST['username'];
        $email=$_POST['email'];
        if (empty($username) || empty($email)|| empty($_POST['password']))
        {
           $error = "please fill all field";
        }
        else
        {
            
            $password=md5($_POST['password']);

            
            $staff = "staff";
            $type_name=$_POST['type_name'];
            // $confirm = 0;
            $delete = 0;
            $s=$conn->prepare("SELECT * FROM admin WHERE email = '$email' AND type = '$staff' AND is_delete = '$delete'");

        
            $s->execute();
            $v=$s->fetch();


            if (empty($v)) {
                $s=$conn->prepare("INSERT INTO admin(username,email, password,type,type_name,is_delete) VALUES ('$username','$email','$password','$staff','$type_name','$delete')");
                
                
            if($s->execute()){
                
                $success = "staff add successfully";
            }
            }else{
                $error = "email already exists";
            } 
        }
    }

?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Staff</h1>
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
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                         <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type_name">
                                    
                                </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="add-staff">Submit</button>
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