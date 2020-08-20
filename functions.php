<?php   

// api menu
function api_fp_panel_menu() {
    if(current_user_can('manage_options'))
    add_submenu_page('options-general.php', 'Sentiment API', 'Sentiment API', 'manage_options', 'sentiment-api', 'api_fp_panel');  
}

// settings link
function kenzyai_settings_link($links) { 
    $settings_link = '<a href="options-general.php?page=sentiment-api">Settings</a>'; 
    array_unshift($links, $settings_link); 
    return $links; 
}

// analyze comment
function kenzyai_analyze_comment($comment_ID, $comment_object) {
    $comment = get_comment( $comment_ID );
    $key = KENZYAI_API_KEY;
    $url = "https://api.kenzyai.com/?key=" . $key . "&text=" . rawurlencode($comment->comment_content);
    $resp_sent_json = wp_remote_get( $url );
    $resp_sent_json_body = wp_remote_retrieve_body($resp_sent_json);
    $resp_sent_body = json_decode($resp_sent_json_body, true);
    $sentiment = $resp_sent_body['sentiment'];
    add_comment_meta($comment_ID, 'sentiment', $sentiment, true);
    if($sentiment == "positive") {
        wp_set_comment_status($comment_ID, "1");
    }
    if($sentiment == "negative" OR $sentiment == "neutral") {
        wp_set_comment_status($comment_ID, "0");
    }
}

// on-off buttons
function api_is_checked($par){
    if (isset($_POST["api_panel"])) { if(isset($_POST[$par])) $k='checked';else $k=''; update_option($par,$k);} 
}

// input fields
function api_string_setting($par,$def){
    if (isset($_POST[$par])) { if(isset($_POST[$par]) and $_POST[$par]!='' ) $k=$_POST[$par];else $k=$def; update_option($par,$k);} 
}