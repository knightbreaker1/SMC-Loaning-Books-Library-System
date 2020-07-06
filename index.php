<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SMC | Login</title>

        <link href="assets/css/style.default.css" rel="stylesheet">
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="assets/images/logo-primary.png" alt="Chain Logo" >
                    </div>
                    <br />
                    <h4 class="text-center mb5">Welcome To SMC Library</h4>
                    <p class="text-center">Sign in to your account</p>
                    
                    <div class="mb30"></div>
                    
                    <form action="#" method="post">

                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div><!-- input-group -->
                        <div class="input-group mb15">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-left">
                                <div class="ckbox ckbox-primary mt10">
                                    <input type="checkbox" id="rememberMe" value="1">
                                    <label for="rememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="login" value="Login" class="btn btn-success">Login <i class="fa fa-angle-right ml5"></i></button>
                            </div>
                        </div>                      
                    </form>
                    
                </div><!-- panel-body -->
                <div class="panel-footer">
                    <a href="http://my.smciligan.edu.ph" class="btn btn-primary btn-block">Not yet a Member? Create Account Now</a>
                </div><!-- panel-footer -->
            </div><!-- panel -->
            
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>

        <script src="js/custom.js"></script>

    </body>
</html>
<?php

if(isset($_POST['login'])) {        

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_admin = "SELECT * FROM admin WHERE username = '$username' and password='$password'";
    $result_admin = $conn->query($sql_admin);

    $sql_staff = "SELECT * FROM staff WHERE username = '$username' and password='$password'";
    $result_staff = $conn->query($sql_staff);

    $sql_student = "SELECT * FROM student WHERE username = '$username' and password='$password'";
    $result_student = $conn->query($sql_student);

    if($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();     

        session_start();  
        $_SESSION['name'] = $row['name'];
        $_SESSION['admin_id'] = $row['admin_id'];
        echo "<script>window.open('admin_index.php','_self');</script>";
    }
    else if($result_staff->num_rows > 0) {
        $row = $result_staff->fetch_assoc();     

        session_start();  
        $_SESSION['name'] = $row['name'];
        $_SESSION['staff_id'] = $row['staff_id'];
        echo "<script>window.open('staff_index.php','_self');</script>";
    }
    else if($result_student->num_rows > 0) {
        $row = $result_student->fetch_assoc();     
        echo "<script>window.open('student_index.php','_self');</script>";
        session_start(); 
        $_SESSION['firstname'] = $row["firstname"];
        $_SESSION['student_id'] = $row["student_id"];
    }else{
        echo "<script>alert('Invalid Username or Password!');</script>";       
    }
    
} 
?>
