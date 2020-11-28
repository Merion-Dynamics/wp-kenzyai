<?php
/*
Plugin Name: Kenzy AI&trade; Comment Sentiment
Description: A free artificial intelligence (A.I.) plugin to analyze and predict the sentiment of comments in either Chinese, English, French, Spanish and Emoji. Negative and neutral comments are placed on hold within your moderation queue, while positive comments are approved and published immediately. Kenzy AI's free API can support upto 1,000 comments per hour, per account.
Version: 1.0.1
Author: Kenzy AI
Author URi: https://kenzyai.com
*/

defined('ABSPATH') or die("This page intentionally left blank.");
$kenzyai = plugin_basename(__FILE__);
require_once(plugin_dir_path(__FILE__)."/functions.php");
require_once(plugin_dir_path(__FILE__)."/adminpage.php");
define("KENZYAI_API_KEY", get_option("api_the_key"));
add_filter("plugin_action_links_{$kenzyai}", 'kenzyai_settings_link' );
add_action('admin_menu', 'api_fp_panel_menu');
add_action( 'wp_insert_comment', 'kenzyai_analyze_comment', 99, 2 );
