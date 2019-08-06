<?php

    $db = Null;
    session_start();

    try{
        // To connect with the database
        $db_username = 'root';
	    $db_password = 'prachi';
        $db = new PDO('mysql:host=localhost;dbname=rss_feed', $db_username, $db_password);
    } catch (PDOException $e) {
        print($e);
        print ("Sorry an error occured please try again later!");
        die();
    }

    function connect_db(){
        $db_username = 'root';
	    $db_password = 'prachi';
        $db = new PDO('mysql:host=localhost;dbname=rss_feed', $db_username, $db_password);
        return $db;
    }

    function login_required(){
        if(!isset($_SESSION['username']) || $_SESSION['username'] == null){
            header('location: login.php');
        }
    }

    function login_not_required(){
        if(isset($_SESSION['username']) && $_SESSION['username'] != null){
            header('location: dashboard.php');
        }
    }

    function get_user_id(){
        $email = $_SESSION['username'];
        $db = connect_db();
        $stmt = $db->prepare('select id from users where username = :email');
        $stmt->execute(['email'=>$email]);
        $response = $stmt->fetch();
        return $response[0];
    }

    function add_keywords($keyword){
        $user_id = get_user_id();
        $db = connect_db();
        $stmt = $db->prepare('insert into keywords (word, user_id) values (:word, :user_id)');
        $response = $stmt->execute(['word' => $keyword, 'user_id' => $user_id]);        
        return $response;
    }

    function add_feeds($url){
        $user_id = get_user_id();
        $db = connect_db();
        $stmt = $db->prepare('insert into feeds (url, user_id) values (:url, :user_id)');
        $response = $stmt->execute(['url' => $url, 'user_id' => $user_id]);        
        return $response;
    }

    function get_all_keywords($quantity = NULL){
        $db = connect_db();
        $stmt = $db->prepare('select * from keywords');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function get_all_feeds($quantity = NULL){
        $db = connect_db();
        $stmt = $db->prepare('select * from feeds');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function get_latest_keywords(){
        $db = connect_db();
        $stmt = $db->prepare('select * from keywords order by created_at desc limit 5');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function get_latest_feeds(){
        $db = connect_db();
        $stmt = $db->prepare('select * from feeds order by created_at desc limit 5');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function total_post_count(){
        $db = connect_db();
        $stmt =  $db->prepare('select count(*) from posts');
        $stmt->execute();
        $response = $stmt->fetchColumn();
        return $response;
    }

    function declined_post_count(){
        $db = connect_db();
        $stmt =  $db->prepare('select count(*) from posts where status = "declined"');
        $stmt->execute();
        $response = $stmt->fetchColumn();
        //var_dump($response);
        return $response;

    }   
    
    function saved_post_count(){
        $db = connect_db();
        $stmt =  $db->prepare('select count(*) from posts where status = "saved"');
        $stmt->execute();
        $response = $stmt->fetchColumn();
        return $response;

    }

    function published_post_count(){
        $db = connect_db();
        $stmt =  $db->prepare('select count(*) from posts where status = "published"');
        $stmt->execute();
        $response = $stmt->fetchColumn();
        return $response;

    }

    function get_feed_by_id($id){
        $db = connect_db();
        $stmt = $db->prepare('select * from feeds where id = :id');
        $stmt->execute(['id' => $id]);
        $response = $stmt->fetch();
        return $response;
    }

    function get_keywords_by_ids($ids){
        $db = connect_db();
        $in  = str_repeat('?,', count($ids) - 1) . '?';
        $sql = "SELECT * FROM keywords WHERE id IN ($in)";
        $stm = $db->prepare($sql);
        $stm->execute($ids);
        $response = $stm->fetchAll();
        return $response;
    }

    function add_post($entry){
        try{
            $db = connect_db();
            $stmt = $db->prepare('insert into posts (url, content, title, status) values (:url, :content, :title, "saved")');
            $content = $entry->children("content",true);
            $content = (string)$content->encoded;
            $response = $stmt->execute(['url' => $entry->url, 'content' => $content, 'title' => $entry->title]);
            return $response;
        }catch(PDOException $e){
            die($e);
        }
    }
    function get_all_posts(){
        $db = connect_db();
        $stmt = $db->prepare('select * from posts');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }
    function get_declined_posts(){
        $db = connect_db();
        $stmt = $db->prepare('select * from posts where status="declined"');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function get_saved_posts(){
        $db = connect_db();
        $stmt = $db->prepare('select * from posts where status="saved"');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

    function get_published_posts(){
        $db = connect_db();
        $stmt = $db->prepare('select * from posts where status = "published"');
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }

