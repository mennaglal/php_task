<?php
session_start();
$nonavbar='';
$pagetitle='Register';
include"init.php";
if(isset($_POST['register'])){
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $hashpass=sha1($password);
    $email=$_POST['email'];
    $stmt=$con->prepare("Insert into users(username,password,email) Values ('$username','$hashpass','$email') ");
//    $stmt->bind_param("sss",$username,$hashpass,$email);
    $stmt->execute();
    echo'sucess Register ';
    header("Location:login.php");
    $stmt->close();
    $con->close();
}
?>
    <div class="container">
        <h1>Logo</h1>
        <hr>
    </div>
    <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label" style="font-weight: 600; color: black">Register Info</label>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Email  </label>
            <div class="col-sm-9">
                <input type="email"  class="form-control"name="email" placeholder="E-mail" autocomplete="off">
            </div>
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
            <div class="col-sm-10">
            </div>
            <div class="col-sm-2">
                <input class="btn btn-primary " type="submit" name="register" value="Register">
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