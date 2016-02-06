

<?php
if(isset($_GET['clk']))
{
     extract($_GET);
    $var_id=$_GET['var_name'];
    $usr_pass=$_GET['var_pass'];
    $var_phone=$_GET['var_phone'];
    $var_email=$_GET['var_email'];
    mysql_connect("localhost","root","");
    mysql_select_db("project");

    $quer="insert login VALUES('$var_name' ,'$var_pass',$var_phone,'$var_email')";
    if(mysql_query($quer))
    {
        echo "<script> alert('registerd'); window.location.href='index.html' </script>";
    }
    else{
        echo "<script> alert('User Name already registerd....Try Again'); window.location.href='index.html' </script>";
    }




}
?>



