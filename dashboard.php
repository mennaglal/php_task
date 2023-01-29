<?php
     session_start();
     $pagetitle='Dashboard';
  if(isset($_SESSION['username'])){
      
     include'init.php';
    
     include$tpls. "footer.php";
     echo'Welcome '. $_SESSION['username'];
    
    }
    else{
         header("Location: index.php");
        
       }
    ?>