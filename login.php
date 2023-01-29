<?php
session_start();
$nonavbar='';
$pagetitle='Login';
include"init.php";
//include "includes/languages/arabic.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $hashpass=sha1($password);
    //check if the user in database
    $stmt=$con->prepare("SELECT username,password,userId FROM users WHERE username=? AND password=? ");
    $stmt->execute(array($username,$hashpass));
    $row=$stmt->fetch();
    $count=$stmt->rowCount();
    //if count >0  this mean the database contain record about username
    if($count>0){
        echo'sucess login ';
        $_SESSION['username']=$username;
        $_SESSION['userId']=$row['userId'];
        header("Location:dashboard.php");
        exit();
    }
    else{
        echo'Failed login ,Please check Username or Password';
    }
}
?>
<div class="container">
    <h1>Logo</h1>
    <hr>
</div>
    <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label" style="font-weight: 600; color: black">Log In Info</label>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">User Name</label>
            <div class="col-sm-9">
                <input type="text"  class="form-control"name="user" placeholder="Username" autocomplete="off">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label" style="max-width: 100%">Password</label>
            <div class="col-sm-9">
                <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new password">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-9" style="font-style: italic;">
                Forget User Name | Forget Password
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
            </div>
            <div class="col-sm-2">
                <input class="btn btn-primary " type="submit" value="Log In">
            </div>
        </div>
    </form>
    <div class="footer">
     <h1>Page Footer</h1>
    </div>
    <style>
        .footer{
            background-color: black;
            width: 100%;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container{
            width: 800px;
            justify-content: center;
        }
        .login{
            width: 390px;
        }
        .login input{
            margin-bottom: 10px;
        }
        .login h4{
            color:black;
            float:left;
            display: block;
            margin-right: 250px;
            margin-bottom: 10px;
        }
        .login .form-control{
            background-color: white;
        }

        .login .btn {
            border: 0;
            padding: 10px 30px;
        }
        /*.login .row{*/
        /*    display: block;*/
        /*}*/
    </style>
<?php
include $tpls. "footer.php";
?>