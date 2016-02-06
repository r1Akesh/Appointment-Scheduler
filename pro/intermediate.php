<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}


?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="login.css">
        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery/jquery.min.js"></script>

    </head>
    <body>
    <div style="margin-left: 70px;margin-right: 70px;height: 666px;border: 2px solid #000000">
        <div class="page-header" style="height: 25px">
            <h3 style="">Welcome,<?php echo $_SESSION['username'];?>
                <a href="logout.php" style="float: right;color:#563d7c">Logout</a>
            </h3>

        </div>
        <nav class="navbar navbar-default" style="border: none;min-height: 0;margin-top: -15px;width: 100%;" >
            <div class="container-fluid" style="color: #ffffff;background-color: #ffffff;text-align: center" >
                <div>

                    <ul class="nav navbar-nav pull-right" id="nav" style="margin-right: 40px;">

                        <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu  ">

                                <li><a href="change_password.php">Change Password</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br>
             <h3 align="center">The Scheduling Tool you'll actually Use.Find a date for meeting...</h3>
              <br><br>
             <h3 align="center"> Let's Get Started...</h3>
              <br><br><br>
                <button class="form-control" style="width: 20%;margin-left: 40%"  ><a href="general.php">Schedule an Event</a></button>
    </body>
</html>