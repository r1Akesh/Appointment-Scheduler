<?php
/**
 * Created by PhpStorm.
 * User: rAkesh
 * Date: 26-Sep-15
 * Time: 9:22 PM
 */
global $time_slot;
session_start();
extract($_SESSION);

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

$date_selected= $_SESSION['date_selected'];
mysql_connect("localhost", "root", "");
mysql_selectdb('check');
if($_POST) {


    $postname = array_keys($_POST);
    $bname = $postname[0];
    $_SESSION['var'] = $bname;
    $_SESSION['time']=$_POST[$postname[0]];
    $time_slot=$_POST[$postname[0]];
    $quer = "insert into booking VALUES ('$bname','$date_selected','$time_slot' , 1)";
    if (mysql_query($quer)) {



        //header("location:v1.php");


    } else {

        // header("location:v1.php");
    }

    $title=$_SESSION['title'];
    $description=$_SESSION['description'];
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $time=$_SESSION['date_selected'];
    $quer="insert into meeting VALUES ('$title','$description','$name','$email','$date_selected','$time_slot')";
    mysql_query($quer);


}
$quer="select * from booking";
$var_1=mysql_query($quer);
while($var_2=mysql_fetch_array($var_1))
{

    $var_3=$var_2['flag'];
    $var_4=$var_2['id'];
    $var5=$var_2['date'];
    if(($var_3) && ($var5==$date_selected))  {


        echo "<style> [name=$var_4]  { pointer-events: none ; cursor:not-allowed;  }</style>";
        echo "<style> [name=$var_4 ] {  background: none ;  } </style>";
        echo "<style> [name=$var_4]  {background-color: #c0c0c0 !important;  } </style>";

    }

}

?>
<html>
<head>
    <link type="text/css"  rel="stylesheet" href="scratch.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">

    <link rel="stylesheet" href="jquery/jquery-ui.css">
    <link rel="stylesheet" href="jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="jquery/jquery-ui.theme.css">
    <link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery-ui.js"></script>
    <script src="jquery/jquery-ui.min.js"></script>

</head>
<body >

<div style="margin-left: 70px;margin-right: 70px;height: 141px;border: 2px solid #000000">
    <div class="page-header" style="height: 25px">
        <h3 style="font-size: 24px">Welcome,<?php echo $_SESSION['username'];?>
            <a href="logout.php" style="float: right;color:#563d7c;margin-top: 1px;font-size: 24px">Logout</a>
        </h3>

    </div>
    <nav class="navbar navbar-default" style="border: none;min-height: 0;margin-top: -17px;width: 100%;" >
        <div class="container-fluid" style="color: #ffffff;background-color: #ffffff;text-align: center" >
            <div>

                <ul class="nav navbar-nav pull-right" id="nav" style="margin-right: 40px;">
                    <li ><a href="general.php" style="color: #563d7c;font-size: 16px" >Step1</a></li>
                    <li  ><a  href="TimeProposal.php" style="color: #563d7c" ><p style="font-size: 16px">Step 2</p></a></li>
                    <li class="active" ><a  href="shift.php" style="color: #563d7c;font-size: 30px">Step 3</a></li>
                    <li style="pointer-events: none" ><a  href="invite.php" style="color: #563d7c;font-size: 16px">Step 4</a></li>
                    <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 16px">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu  ">
                            <li><a class="current" href="Profile.php" style="font-size: 13px">View Profile</a></li>
                            <li><a href="change_password.php" style="font-size: 13px">Change Password</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div  style="border: 2px solid #000000;margin-top: -23px" >
      <div style="border: 2px solid #000000;height: 100px;width: 200px;float: right;margin-top: 15px;margin-right: -490px">
          <div style="background-color:#c0c0c0;height: 25px;width: 25px;float: left;margin-left: 5px;margin-top: 5px " >

          </div>
          <label style="display: inline-block;margin-top: 5px">&nbsp;Booked</label>
          <br>
          <br>
          <div style="background-color:#3CD070;height: 25px;width: 25px;float: left;margin-left: 5px;margin-top: 5px " >

          </div>
          <label style="display: inline-block;margin-top: 5px">&nbsp;Available</label>
      </div>

    <input type="text" style="margin-top: 50px;float: left;margin-left: 30px;border: none; " readonly value="Selected Date: <?php echo $date_selected ; ?>">
    <div  style="width:600px;height: 700px;margin-top: 20px;margin-left: 350px ">

    <form method="post" action="shift.php" >

        <button title="book - it!" name="b1" id="1" class="box" style="width: 120px;height: 120px;; background-color: #3CD070; border: none;font-size: 29px" onclick="check(this.id)" value="09:00:00" <?php $_SESSION['time_slot']='09:00:00'; ?> > 9:00 </button>
        <button title="book - it!" name="b2" class="box" style="width: 120px;height: 120px; background-color:#3CD070;border: none;font-size: 29px " value="10:00:00" >10:00</button>
        <button title="book - it!" name="b3" class="box" style="width: 120px;height: 120px; background-color:#3CD070;border: none;font-size: 29px" value="11:00:00" > 11:00</button>


        <button title="book - it!" name="b4" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="12:00:00" > 12:00 </button>
        <br><br>
        <button title="book - it!" name="b5" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px"  value="01:00:00" > 1:00</button>
        <button title="book - it!" name="b6" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px" value="02:00:00" > 2:00</button>

        <button title="book - it!" name="b7" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="03:00:00" > 3:00</button>

        <button title="book - it!" name="b8" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px"  value="04:00:00" > 4:00 </button>
        <br> <br>
        <button title="book - it!" name="b9" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px" value="05:00:00" > 5:00</button>

        <button title="book - it!" name="b10" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="06:00:00" > 6:00</button>
        <button title="book - it!" name="b11" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="07:00:00" > 7:00</button>
        <button title="book - it!" name="b12" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="08:00:00" > 8:00</button>

        <br><br><br><br>
        <div style="margin-left: 100px">
            <button id="button_general" type="button" name="prev" style="width: 100px;height: 40px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue "><a href="TimeProposal.php">Back</a></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="button_general" type="button" name="next" style="width: 100px;height: 40px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue " ><a href="invite.php">Next</a></button>

        </div>
    </form>
</div>
</div>



</body>


</html>