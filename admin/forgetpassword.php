<?php 
   include '../connection.php';
 ?>
 <?php

    if (isset($_POST['submit']))
     {
        //$id = $_GET['id'];
        $email = $_POST['email'];
        $type =$_POST['type'];

        $ins = $conn->prepare("SELECT * FROM admin WHERE  email='$email' AND type = '$type'");
            $ins->execute();
            $in = $ins->fetch();
            if (!empty($in)) {
          
           $rand = rand(10000, 99999);

            $subject ="New Password";
            $from="info@phptpoint.com";
            $message = $rand;
            $headers = "From:$email".$from;
            mail($email,$subject,$message,$headers);   

            $rand = md5($rand);
            $new = $conn->prepare("UPDATE admin SET password = '$rand' WHERE email = '$email'");
            $new->execute();         

            $success = "Password Send to your E-mail";
            
            }else{
                $error = "email | type does't match";    
            }

            }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forget Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="text-align: center;">
                        <!-- <h3 class="panel-title">ATMC LOGIN</h3> -->
                        <img src="../images/logoo.png" class="img img-responsive">
                    </div>
                    <div class="" style="text-align: center;">
                    <?php
                        if (isset($error)) {?>
                            <div class="alert alert-danger" style="padding: 10px;"><?=$error?></div>
                       <?php }
                    ?>
                    <?php
                        if (isset($success)) {?>
                            <div class="alert alert-success" style="padding: 10px;"><?=$success?></div>
                       <?php }
                    ?>
                </div>
                    <div class="panel-body">
                        <form  method="post">
                            <fieldset>
                                <div class="text-center">
                                    <h4> Forget Password </h4>
                                </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your E-mail" name="email" type="email" autofocus>
                                </div>
                                
                                <div class="form-group">
                                     <select name="type" class="form-control">
                                             <option value="" disabled="" selected="">Select Type</option>
                                             <option value="admin">Admin</option>
                                             <option value="staff">Staff</option>
                                    </select>
                                    <!-- <input type="radio" name="type" value="admin">Admin -->
                                    <!-- <input type="radio" name="type" value="staff">Staff -->
                                </div>
                           
                                <button name="submit" class="btn btn-lg btn-success btn-block">submit</button>
                                <!-- <a href="index.html" >Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


