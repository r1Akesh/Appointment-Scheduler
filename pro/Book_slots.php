<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

if(isset($_POST['select_time'])){

    $_SESSION['Book_Date']= $_POST['date_selected'];
    header('location:Book_Time.php');


}


?>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css"  rel="stylesheet" href="login.css">
    <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="jquery/jquery-ui.js"></script>
</head>
<body>
<div style="margin-left: 70px;margin-right: 70px;height: 666px;border: 2px solid #000000">
    <div class="page-header" style="height: 25px">
        <h3 style="">Welcome,<?php echo $_SESSION['username'];?>
            <a href="logout.php" style="float: right;color:#563d7c">Logout</a>
        </h3>

    </div>
    <nav class="navbar navbar-default" style="border: none;min-height: 0;margin-top: -15px;width: 100%" >
        <div class="container-fluid" style="color: #ffffff;background-color: #ffffff">
            <div >

                <ul class="nav navbar-nav pull-right " id="nav" style="margin-right: 40px">
                    <li ><a href="Dashboard.php" style="color: #563d7c" >Dashboard</a></li>
                    <li><a  href="Free_slots.php" style="color: #563d7c" >Free Slots</a></li>
                    <li class="active"><a  href="Book_slots.php" style="color: #563d7c">Book Slots</a></li>
                    <li><a  href="view_meetings.php" style="color: #563d7c">View Meetings</a></li>
                    <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu  ">
                            <li><a class="current" href="Profile.php">View Profile</a></li>
                            <li><a href="change_password.php">Change Password</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div  style="margin-top: 100px;margin-left: 30px;margin-right: 30px; border: none;height: 400px;float: left">
        <form  method="post" style="border: 3px solid #000000;height: 190px" >

            <h4>Selected Date:  <input id="idate" name="date_selected" style="font-size: medium; height: 20% width: 90%;border: 3px solid #000000" readonly >  </h4>
            <script>
                var array = [""];

                $('#idate').datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0,
                    beforeShowDay: function(date){
                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

                        return [ array.indexOf(string) == -1 && date.getDay()!=0 && date.getDay()!=6 ]

                    }

                });
                $('#idate').datepicker({ minDate: 0 });
            </script>
            <button type="submit" name="select_time" style="width: 90px;line-height: 30px;
            background-color: dodgerblue;border: none;border-radius: 8px;margin-top: 100px;float: right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#mymodal" tabindex="-1">Next
            </button>

        </form>
    </div>

</div>

</body>
</html>
