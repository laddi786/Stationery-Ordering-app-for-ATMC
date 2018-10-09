<?php
include 'header.php';
include 'sidebar.php';                
?>
<?php
        
    if (isset($_POST['add-request']) && !empty($_POST))
    {
     
        $staff_id=$_POST['staff_id'];
        $qty=$_POST['qty'];

        $stationery_id=$_POST['stationery_id'];

        if (empty($qty)){
           $error = "please fill all field";
        }
        else
        {
            $check = $conn->prepare("SELECT sum(qty) as request_qty FROM requests WHERE sationery_id = '$stationery_id' AND (status != 'rejected')");
            $check->execute();
            $check_request = $check->fetch();
            
            

              $s=$conn->prepare("INSERT INTO requests(staff_id,qty, stationery_id,status) VALUES ('$staff_id','$qty','$stationery_id','pending')");
                        if($s->execute()){
                            $success = "request add successfully";
                        
            }
        }
    }

    $staff_id = $_SESSION['id'];
        $stationery_id=$_GET['id'];
        $u=$conn->prepare("SELECT * FROM stationery WHERE id = '$stationery_id'");
        $u->execute();
        $b=$u->fetch();


    ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Request</h1>
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
                                <div class="col-lg-8">
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
                                            <label>Stationery Name : <?=$b['name']?></label>
                                        </div>
                                        <input type="hidden" name="staff_id" value="<?=$_SESSION['id']?>">
                                        <input type="hidden" name="stationery_id" value="<?=$stationery_id?>">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" min="1" name="qty" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="add-request">Submit</button>
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