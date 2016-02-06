<?php
/**
 * Created by PhpStorm.
 * User: rAkesh
 * Date: 13-Sep-15
 * Time: 8:28 PM
 */
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

?>
<html xmlns="http://www.w3.org/1999/html">
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
                             <li ><a href="general.php" style="color: #563d7c" >Step1</a></li>
                             <li style="color: #563d7c" ><a  href="TimeProposal.php" style="color: #563d7c" >Step 2</a></li>
                             <li  ><a  href="shift.php" style="color: #563d7c">Step 3</a></li>
                             <li class="active" ><a  href="invite.php" style="color: #563d7c"><p style="font-size: 30px">Step 4</p></a></li>
                             <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
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
                       <div align="center">
                             <p class="text-primary"><h3>SummarY of the Submitted Details</h3> </p>
                             <br><br><br>
                            <form >
                                  <?php
                                  $email=$_SESSION['email'];
                                  $date_selected=$_SESSION['date_selected'];
                                  mysql_connect("localhost","root",'');
                                  mysql_select_db("check");
                                  $quer=" select * from meeting where email='$email' AND time='$date_selected'";
                                  $res=mysql_query($quer);
                                  $res1=mysql_query($quer);
                                  $numrows=mysql_num_rows($res);
                                  if($numrows>0){
                                  $row=mysql_fetch_array($res1);

                                  ?>
                                <table class="table table-bordered " style="width: 50%">

                                     <tr>
                                         <th>
                                             Title
                                         </th>
                                          <td>
                                              <?php echo $row['title'] ?>
                                          </td>
                                     </tr>
                                    <tr>
                                        <th>
                                            Purpose of Meeting
                                        </th>
                                        <td> <?php echo $row['description'] ?> </td>
                                        </tr>
                                    <tr>

                                         <th>
                                             Email
                                         </th>
                                        <td> <?php echo $row['email'] ?> </td>
                                        </tr>
                                    <tr>
                                         <th>
                                             Date Of Meeting (in YY-MM-DD format)
                                         </th>
                                        <td> <?php echo $row['time'] ?> </td>
                                        </tr>
                                    <tr>
                                        <th>
                                            Meeting Time
                                        </th><td>
                                            <?php

                                            while($row1=mysql_fetch_array($res)){

                                           echo $row1['time__slot']."<br>";

                                       }

                                        ?>
                                    </tr>
                                       <?php
                                           }
                                        ?>
                                        </td>  </tr>
                                </table>
                                <br><br><br>

                               </form>
                           <form action="http://mailthis.to/rakesh.roushan260@gmail.com" method="post" >
                               <button id="button_general" type="button" name="next" style="width: 90px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue "><a href="general.php">Back</a></button>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <textarea name="message" hidden="">
                                   Dear Mam, Greetings..  My name is <?php echo $_SESSION['username']?> and i am writing today to formally
                                   invite you to a meeting entitled as <?php echo $_SESSION['title']?> in your department office,of pondicherry university on dated <?php echo $_SESSION['date_selected'];?> at <?php echo $_SESSION['time'];?> we will be discussing about: <?php echo $_SESSION['description'];?>  kindly accpet my metting request.Sincerely.">Send an Email</textarea>
                               <button  type="submit" name="select_time"  style="width: 190px;height: 40px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue ">Send an e-mail Invitation</button>
                           </form>

                       </div>

         </body>
</html>