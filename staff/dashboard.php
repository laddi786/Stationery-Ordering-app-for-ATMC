<?php
include 'header.php';
include 'sidebar.php';

        $id = $_SESSION['id'];
        $s=$conn->prepare("SELECT * FROM requests WHERE status = 'pending' AND  staff_id = '$id'");
        $s->execute();
        $request=$s->fetchAll();
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
       
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=count($request)?></div>
                           <div>Pending Requests!</div>
                        </div>
                    </div>
                </div>
                <a href="order.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>


</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>

<
<?php
include 'footer.php';
?>