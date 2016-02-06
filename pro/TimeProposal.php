<?php

session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}


if(isset($_POST['select_time']))
{
    if($_POST['date_selected']!='') {
        $_SESSION['date_selected'] = $_POST['date_selected'];
        header('location:shift.php');
    }
    else{


       echo ' <script>
  alert("Please Select a Valid Date");
  window.location("TimeProposal.php");
 </script> ';
     }

}

?>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="jquery/jquery-ui.css">
    <link rel="stylesheet" href="jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="jquery/jquery-ui.theme.css">
    <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-ui.js"></script>
    <script src="jquery/jquery-ui.min.js"></script>

    <style>
        .ui-datepicker {
            background:#000000;
            border: 1px solid #555;
            color: #ffffff;

        }


    </style>
      <script>
           var hook=true;
           window.onbeforeunload=function(){
                 if(hook){
                     return 'Are u sure want to Leave...2 steps More to go...'
                 }
           }
           function unhook(){
               hook=false;
           }
      </script>
</head>
<body >


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
                    <li ><a href="general.php" style="color: #563d7c" >Step1</a></li>
                    <li class="active" style="color: #563d7c" ><a  href="TimeProposal.php" style="color: #563d7c" ><p style="font-size: 30px">Step 2</p></a></li>
                    <li style="pointer-events: none" ><a  href="shift.php" style="color: #563d7c">Step 3</a></li>
                    <li style="pointer-events: none" ><a  href="invite.php" style="color: #563d7c">Step 4</a></li>
                    <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu  ">

                            <li><a href="change_password.php">Change Password</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div align="center" style="  margin-top: -19px; height: 530px;  border: 1px solid #000000;border-bottom: none ;background-color:#edf4fe;padding: 0 15px  " >

    <div align="center" style="margin-top: 100px;margin-left: 30px;margin-right: 30px; border: none;height: 400px">
        <form  method="post">
            <h4>Selected Date:  <input id="idate" name="date_selected" style="font-size: medium; height: 20% width: 90%;border: none" readonly required >  </h4>
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
            <br><br><br>  <br><br><br>  <br><br><br>   <br><br><br><br>

            <button id="button_general" type="button" name="next" style="width: 90px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue "><a href="general.php">Back</a></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button  type="submit" name="select_time"  style="width: 90px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue " onclick="unhook();">Next</button>
        </form>
    </div>
</div>

</body>
</html>