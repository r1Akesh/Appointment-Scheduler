<?php
 session_start();
   extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
  $date_selected= $_SESSION['Book_Date'];
  mysql_connect("localhost","root","");
mysql_select_db("check");
$quer="select * from booking";
$var_1=mysql_query($quer);
while($var_2=mysql_fetch_array($var_1))
{

    $var_3=$var_2['flag'];
    $var_4=$var_2['id'];
    $var5=$var_2['date'];
    if(($var_3 && ($var5==$_SESSION['Book_Date']) ) )  {



        echo "<style> [name=$var_4 ] {  background: none ;  } </style>";
        echo "<style> [name=$var_4]  {background-color: #c0c0c0 !important;  } </style>";

    }


}
if($_POST){
    $postname = array_keys($_POST);
    $bname = $postname[0];
    $_SESSION['var'] = $bname;
    $time_slot=$_POST[$postname[0]];
    $quer = "insert into booking VALUES ('$bname','$date_selected','$time_slot',1)";
    if(mysql_query($quer)){
        //echo "executed";
    }
    unset($_POST);
    header("location:Book_Time.php");

}?>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="jquery/jquery-ui.js"></script>
    <link type="text/css"  rel="stylesheet" href="login.css">



    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
</head>
<body>
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="height: 600px;margin-top: 0px">
        <div class="modal-content">
            <div class="modal-header">
                <p> Choose Time Slot To be Booked...</p>

            </div>
            <div class="modal-body" style="height: 100%">
                <div style="border: 3px solid #000000;height: 90px;width: 150px;float: right;margin-top: 15px;margin-right: 10px">
                    <div style="background-color:#c0c0c0;height: 25px;width: 25px;float: left;margin-left: 5px;margin-top: 5px " >

                    </div>
                    <label style="display: inline-block;margin-top: 5px">&nbsp;&nbsp;&nbsp;Booked </label>
                    <br>
                    <br>
                    <div style="background-color:#3CD070;height: 25px;width: 25px;float: left;margin-left: 5px;margin-top: 5px " >

                    </div>
                    <label style="display: inline-block;margin-top: 5px">&nbsp;&nbsp;&nbsp;Available</label>
                </div>
                <form method="post" >
                    <div align="left">
                        <button  name="b1" id="1" class="box" style="width: 120px;height: 120px;; background-color: #3CD070; border: none;font-size: 29px" onclick="fire()" value="09:00:00" <?php $_SESSION['time_slot']='09:00:00'; ?> > 9:00 </button>
                        <button  name="b2" class="box" style="width: 120px;height: 120px; background-color:#3CD070;border: none;font-size: 29px " value="10:00:00" > 10:00  </button>
                        <button  name="b3" class="box" style="width: 120px;height: 120px; background-color:#3CD070;border: none;font-size: 29px" value="11:00:00" > 11:00</button>

                        <br><br>
                        <button  name="b4" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="12:00:00" > 12:00 </button>
                        <button  name="b5" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px"  value="01:00:00"  > 1:00 </button>
                        <button  name="b6" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px" value="02:00:00"  > 2:00 </button>
                        <br> <br>
                        <button  name="b7" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="03:00:00" > 3:00 </button>
                        <button  name="b8" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px"  value="04:00:00" > 4:00</button>
                        <button  name="b9" class="box" style="width: 120px;height: 120px; background-color:#3CD070; border: none;font-size: 29px" value="05:00:00" > 5:00 </button>
                        <br><br>
                        <button  name="b10" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="06:00:00" > 6:00 </button>
                        <button  name="b11" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="07:00:00" > 7:00 </button>
                        <button  name="b12" class="box" style="width: 120px;height: 120px; background-color: #3CD070; border: none;font-size: 29px" value="08:00:00" > 8:00 </button></form>
            </div>
            </form>
            <button value="Back" style="float: right"><a href="Book_slots.php">Back</a></button>
        </div>
    </div>
</div>
</div>

</body>

</html>