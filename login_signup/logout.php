<?php 
function logout() {
        session_start();
        session_destroy();
        header('Location: /FINAL_PROJECT/login_signup/login.php');
    }
logout();
?>