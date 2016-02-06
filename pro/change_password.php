<?php
session_start();
extract($_SESSION);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

mysql_connect("localhost","root","");
   mysql_select_db("project");
   if(isset($_POST['submit'])){
     $id=$_SESSION['username'];
      $password=$_POST['password'];
     $passwordnew = $_POST['new_password'];
    $quer="update login set password='$passwordnew' WHERE id='$id' AND password='$password'";
     $result=mysql_query($quer);
       $r=mysql_affected_rows();
                if($r){

               echo ' <script>
  alert(" Password  changed");
  window.location.assign("intermediate.php");
   </script> ';
           }
       else{
           echo ' <script>
  alert(" Password not changed");
  window.location.assign("change_password.php");
   </script> ';
       }







   }
?>
<html>
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
           <div class="modal-dialog"style="height: 600px;margin-top: 0px">
               <div class="modal-content">
                   <div class="modal-header">
                       <p>Change Password</p>
                   </div>
                   <div class="modal-body" style="100%">
                       <form name="change" method="post" action="change_password.php" onsubmit="return(check())">
                       Password:
                       <input type="password" class="form-control" name="password" required>
                       <br><br>
                       New Password:
                       <input type="password" class="form-control" name="new_password" required>
                       <br><br>
                       confirm Password:
                       <input type="password" class="form-control" name="confirm_password" required>
                       <br><br><br>
                       <button type="submit" name="submit" class="form-control" style="width: 20%;margin-left: 40%" >Done</button>
                       </form>
                   </div>
               </div>

           </div>

       </div>
          <script>
               function check(){
                   if(document.change.new_password.value!=document.change.confirm_password.value){
                       alert("Password not matched");
                       document.change.new_password.focus();
                       return false;
                   }
               }
          </script>
  </body>
</html>