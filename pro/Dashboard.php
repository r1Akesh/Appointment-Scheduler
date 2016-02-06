<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
mysql_connect("localhost","root","");
mysql_select_db("check");
$quer="select * from meeting WHERE time=(select curdate() from dual)";
$res=mysql_query($quer);
$numrow=mysql_num_rows($res);


?>
<html>

<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <script src="bootstrap/js/bootstrap.js"></script>
     <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script src="login.css"></script>

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
                           <li class="active"><a href="Dashboard.php" style="color: #563d7c" >Dashboard</a></li>
                           <li><a  href="Free_slots.php" style="color: #563d7c" >Free Slots</a></li>
                           <li><a  href="Book_slots.php" style="color: #563d7c">Book Slots</a></li>
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
                    <div style="background-image: url('Login.jpg');background-size: 100%;border: 1px solid #000000;margin-top: -15px">
                        <div style="height: 80%;width: 450px;background-color:#ffffff;margin-left: 15px;margin-top: 5px;background: transparent;">
                            <div style="background-color: red;height: 1px;width: 100%"></div>
                             <h2 >Today,<br>on <small>
                                     <script type="text/javascript">
                                         <!--
                                         var currentTime = new Date()
                                         var month = currentTime.getMonth() + 1
                                         var day = currentTime.getDate()
                                         var year = currentTime.getFullYear()
                                         document.write(day + "-" + month + "-" + year)
                                         //-->
                                     </script>
                             </small></h2>
                           NOTE: <b>You Have <?php echo $numrow;?> Meetings</b>
                            <br><br><br><br>
                            <?php if($numrow) echo 'Goto ViewMeetings Tab to view your meetings..'?>
                            <div style="background-color: #ffffff;height: 1px;width: 100%"></div>
                        </div>


                    </div>



 </body>
</html>