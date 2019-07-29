<?php

    $db = Null;
    session_start();

    try{
        // To connect with the database
        $db = new PDO('mysql:host=localhost;dbname=rss_feed', $db_username, $db_password);
    } catch (PDOException $e){
        print($e);
        print ("Sorry an error occured please try again later!");
        die();
    }    

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

    function get_user_id(){
        $email = $_SESSION['username'];
        $stmt = $db->prepare('select id from users where email = :email');
        $stmt->execute(['email'=>$email]);
        $response = $stmt->fetch();
        return $response[0];
    }

    function add_keywords($keyword){
        $user_id = get_user_id();
        $stmt = $db->prepare('insert into keywords (word, user_id) values (:word, :user_id)');
        $response = $stmt->execute(['word' => $keyword, 'user_id' => $user_id]);
        return $response;
    }