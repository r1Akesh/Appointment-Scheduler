<?php

session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

     if(isset($_POST['next']))
     {
         extract($_POST);
         $_SESSION['title']=$_POST['title'];
         $_SESSION['description']=$_POST['description'];
         $_SESSION['name']=$_POST['name'];
         $_SESSION['email']=$_POST['email'];
         header("location:TimeProposal.php");
              }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="login.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jquery/jquery.min.js"></script>
    <script type="text/javascript">
        var hook = true;
        window.onbeforeunload = function() {
            if (hook) {
                return "we hv started just now..just 3 more steps to go.."
            }
        }
                 function unhook(){
                     hook=false;
                 }
    </script>
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
                    <li class="active"><a href="general.php" style="color: #563d7c" ><p style="font-size: 30px">Step1</p></a></li>
                    <li style="pointer-events: none;" ><a  href="TimeProposal.php" style="color: #563d7c" >Step 2</a></li>
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
    <div align="center">
        <form  method="post" action="general.php" name="general"  >
            <table id="general"  style="border-collapse: separate;border-spacing: 4em">
                <tr>
                    <td >Title</td>
                    <td>:</td>
                    <td><input type="text" name="title" style="border-color:#000000  " required="yes" ></td>
                </tr>

                <tr>
                    <td >Description</td>
                    <td>:</td>
                    <td> <textarea  name="description" rows="4" cols="40" style="border-color: #000000" required ></textarea></td>
                </tr>
                <tr>
                    <td >Your Name</td>
                    <td>:</td>
                    <td> <input type="text" name="name" style="border-color:#000000  " required></td>
                </tr>
                <tr>
                    <td >e-mail</td>
                    <td>:</td>
                    <td> <input type="email" name="email" style="border-color:#000000  " required></td>
                </tr>

            </table>
            <br>
            <br>
            <div style="margin-top: -20px" >
                <button id="button_general" type="button" name="prev" style="pointer-events: none;background-color: #c0c0c0;width: 90px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue "><a href="general.php">Back</a></button>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button id="button_general" type="submit" name="next" onclick="unhook(); return validate() ;" style="width: 90px;line-height: 30px;background-color: #ffffff;border: 1px solid dodgerblue;border-radius: 8px;color: dodgerblue ">Next</button>

            </div>

    </div>


  </form>
    </div>
         <script>
              function validate(){
                     if(document.forms["general"]["title"].value==null||document.forms["general"]["title"].value==""){
                         alert("fill title");
                         document.forms["general"]["title"].focus();
                         return false;
                  }
                   if(document.forms["general"]["location"].value==null || document.forms["general"]["location"].value==""){
                         alert("fill location!");
                         document.forms["general"]["location"].focus();
                       return false;
                     }
                  if(document.forms["general"]["description"].value==null || document.forms["general"]["description"].value==""){
                      alert("fill description field!");
                      document.forms["general"]["description"].focus();
                      return false
                  }
                  if(document.forms["general"]["name"].value==null || document.forms["general"]["name"].value==""){
                      alert("fill name!");
                      document.forms["general"]["name"].focus();
                      return false
                  }
                  if(document.forms["general"]["email"].value==null || document.forms["general"]["email"].value==""){
                      alert("fill email!");
                      document.forms["general"]["email"].focus();
                      return false;
                  }

              }

         </script>
</body>
</html>