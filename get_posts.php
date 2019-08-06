<?php

include('function.php');

login_required();

function has_keywords($haystack, $wordlist){
    $found = false;
    foreach ($wordlist as $w){
      if (strpos($haystack, $w) !== false) 
      {
        $found = true;
        break;
      }
    }
    return $found;
  
}

function fetch_feed($feed, $keywords) {
  $content = file_get_contents($feed['url']);
  $posts = [];
  $x = new SimpleXmlElement($content);
  foreach($x->channel->item as $entry) {
    $entry->titlenew =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $entry->title));
    $entry->descriptionnew =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $entry->description));
    $url = $entry->link;
    $entry->url = $url;
    $basename = basename($url);
    $entry->link =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $basename));
    if((has_keywords($entry->titlenew,$keywords)) || (has_keywords($entry->link,$keywords))){
      $post = add_post($entry);
      array_push($posts, $post);
    }
  }
  return $posts;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $feed_id = $_POST['feed_url_id'];
    $keyword_ids = $_POST['keywords_list'];
    $feed = get_feed_by_id($feed_id);
    $keywords = get_keywords_by_ids($keyword_ids);
    $keywords_ary = [];
    foreach($keywords as $keyword){
        array_push($keywords_ary, $keyword['word']);
    }
    $fetch_response = fetch_feed($feed, $keywords_ary);
    $response = array();
    $response['posts'] = $fetch_response;
    $response = $response['posts'];
    header('Content-type: application/json'); 
    foreach($response as $res) {
    echo json_encode($res);
    }
}else{
    header('location:dashboard.php');
}