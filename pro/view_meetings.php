<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
mysql_connect("localhost","root","");
mysql_select_db("check");
$quer=mysql_query("select * from meeting where time>(select curdate() from dual)");
$numrows=mysql_num_rows($quer);



?>
<html>
<head>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

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
                    <li><a href="Dashboard.php" style="color: #563d7c" >Dashboard</a></li>
                    <li><a  href="Free_slots.php" style="color: #563d7c" >Free Slots</a></li>
                    <li><a  href="Book_slots.php" style="color: #563d7c">Book Slots</a></li>
                    <li class="active"><a  href="view_meetings.php" style="color: #563d7c">View Meetings</a></li>
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
    <?php
         if($numrows>0){


    ?>
        <h3>Your Upcoming Meetings are: </h3>
        <table class="table table-bordered">
                <tr>
                    <th>S.no.</th>
                    <th>Name</th>
                    <th>e-mail</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date Of Meeting</th>
                    <th>Time</th>

                </tr>
                 <?php
                 $i=1;
                     while($res=mysql_fetch_array($quer)){


                 ?>
                         <tr> <td><?php echo $i;?></td>
                         <td><?php echo $res['name']?></td>
                             <td><?php echo $res['email']?></td>
                             <td><?php echo $res['title']?></td>
                             <td><?php echo $res['description']?></td>
                             <td><?php echo $res['time']?></td>
                             <td><?php echo $res['time__slot']?></td>
                         </tr>


    <?php $i++; } }
      else{
          echo "You Have no upcoming meetings Scheduled";
      }

    ?>
        </table>
</div>
</body>
</html>