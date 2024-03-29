<?php

include('function.php');

login_required();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Content-type: application/json'); 
    $keywords = $_POST['keywords'];
    $keywords = explode(',', $keywords);
    $response = array();
    try{
        foreach($keywords as $keyword){
            add_keywords(trim($keyword));
        }
        $response['message'] = 'All the keywords have been added successfully';
    }catch(Exception $e){
        $response['message'] = $e;
    }
    
    echo json_encode($response); 
}else{
    header('location:dashboard.php');
}