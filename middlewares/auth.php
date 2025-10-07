<?php

function adminAuth(){
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: /admin/login");
        exit();
    }
}