<?php
     session_start();
     $nonavbar='';
     $pagetitle='Login Or Register';
     include"init.php";
?>
<a href="login.php" >Log In</a>
<a href="register.php">Register</a>
<style>
    a{
        background-color: #0d6efd;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        margin: 20px;
        float: right;
    }
    a:hover{
        background-color: #0747a5;
        color: white;
    }
</style>
<?php
     include $tpls. "footer.php";
?>