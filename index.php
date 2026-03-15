<?php
session_start();

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "owner"){
        header("Location: owner/manage_turfs.php");
    }

    elseif($_SESSION['role'] == "admin"){
        header("Location: admin/dashboard.php");
    }

    else{
        header("Location: user/browse_turfs.php");
    }

}else{
    header("Location: login.php");
}

exit();
?>