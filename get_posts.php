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
      //var_dump($content);
      //error_log(ob_get_clean($content), 4);
      error_log(var_dump($content), true);
      $x = new SimpleXmlElement($content);
      foreach($x->channel->item as $entry) {
        $entry->titlenew =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $entry->title));
        $entry->descriptionnew =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $entry->description));
        $url = $entry->link;
        $entry->url = $url;
        $basename = basename($url);
        $entry->link =  strtolower(preg_replace('/[^a-zA-Z0-9]/',' ', $basename));
        if((has_keywords($entry->titlenew,$keywords))&&(has_keywords($entry->link,$keywords)))
        {
        //   $hashed_key = md5($entry->title);
        //   echo "<li><a href='includes/post.php?key=$hashed_key' title='$entry->title'> " . $entry->title . " <a></li>";
            add_post($entry);
        }
  
      }
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $feed_id = $_POST['feed_url_id'];
    $keyword_ids = $_POST['keywords_list'];
    $feed = get_feed_by_id($feed_id);
    $keywords = get_keywords_by_ids($keyword_ids);
    $keywords_ary = [];
    foreach($keywords as $keyword){
        array_push($keyword_ids, $keyword['word']);
    }

    fetch_feed($feed, $keywords_ary);

}else{
    header('location:dashboard.php');
}