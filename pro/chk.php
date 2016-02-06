<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $password=$_POST['password'];

    mysql_connect("localhost","root","");
    mysql_select_db("project");
    $sql="select * from login where id='$id' AND password='$password'";
    $result=mysql_query($sql);
    $numrows=mysql_num_rows($result);
    if($numrows>0)
    {
        session_start();
        $_SESSION['username']=$id;
        if($_SESSION['username']=='admin')
            header("Location: Dashboard.php");
        else
            header("Location:intermediate.php");

    }
    else
    {
        //$message = "wrong credential... TrY again..";
        session_start();

        echo "
            <script type='text/javascript'>
            alert('wrong credential... TrY again..');
            window.location.href='login.html'; </script>";

        //header("location:login.html");

    }
}

?>
<html>
<head>
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
<div style="background-image: url('Login.jpg');background-size: 100%;height: 100%;margin-top: 0px" >
    <br><br><br>
    <div align="center" style="margin-left:490px;height: 450px;width: 390px;border: 1px solid #ffffff;border-top: none;opacity: 3;background-color: #f5f5f5" >
        <div style="width: 100%;background-color: red;height: 1px"></div>
        <br>
        <span class="  glyphicon glyphicon-home " style="font-size: 30px;color: mediumspringgreen"></span>
        <br>
        <h1 class="panel-heading">Login</h1>
        <br><br><br>
        <div style="margin-left: 9px;margin-right: 15px">
            <form method="post" action="chk.php">
                <input class="form-control" required type="text" name="id" placeholder="User Id" >
                <br><br>
                <input class="form-control" required type="password" name="password" placeholder="Password">
                <br><br>
                <button class="form-control" type="submit" name="submit" style="width: 60%;background-color: #f5f5f5"><b>Log In</b></button>
            </form>
        </div>
    </div>
</div>
</html>