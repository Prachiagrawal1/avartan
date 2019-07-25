<?php

    // Will be used in the pages where logging is required
    function login_required(){
        if(!isset($_SESSION['username']) || $_SESSION['username'] == null){
            header('location: login.php');
        }
    }
    // ji ab dekhiye ap

    function login_not_required(){
        if(isset($_SESSION['username']) && $_SESSION['username'] != null){
            header('location: dashboard.php');
        }
    }