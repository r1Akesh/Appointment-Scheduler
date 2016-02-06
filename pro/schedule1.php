<?php

session_start();
 extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="scratch.css">
    <style>
        body{
            overflow-y: scroll;
        }
    </style>

</head>
<body >
      <div style=" width: 1000px;margin: 0 auto ; background-color: floralwhite ; height:750px";>

     welcome, <?php echo $_SESSION['username'];?>

<a href="logout.php"  id="a" style="float: right ;margin-top:0px" >logout</a>



                 <div style="border: 1px solid #000000;border-radius: 3px;margin-top: 10px" >
                 <ul  id="schedule" type="none">

                    <li> <button name="general" title="General Information"  ><a href="general.php" target="container">General</a></button></li>
                    <li><button name="timeproposal" title="Select Date"  ><a href="TimeProposal.php" target="container">Time Proposal</a></button> </li>
                    <li><button name="shift"  title="select Time"><a href="Shift.php" target="container">Settings</a></button></li>
                    <li><button name="invite" title="InviTe" ><a href="invite.php" target="container">Invite</a></button></li>

                 </ul>
                 </div>


<iframe src="general.php" name="container" width="100%" height="100%" style="border:none;background-color: #EBFAFA;background-image:url(light-aqua.png.png)" scrolling="no"></iframe>
     </div>
</body>
</html>
