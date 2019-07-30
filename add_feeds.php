<?php

include('function.php');

login_required();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Content-type: application/json'); 
    $feeds = $_POST['feeds'];
    $feeds = explode(',', $feeds);
    $response = array();
    try{
        foreach($feeds as $feed){
            add_feeds(trim($feed));
        }
        $response['message'] = 'All the feeds have been added successfully';
    }catch(Exception $e){
        $response['message'] = $e;
    }
    
    echo json_encode($response); 
}else{
    header('location:dashboard.php');
}