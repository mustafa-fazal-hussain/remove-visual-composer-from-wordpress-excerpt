<?php 

/** add this to your function.php to remove shortcode on excerpt */
 
if(!function_exists('remove_vc_from_excerpt'))  {
  function remove_vc_from_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
}
 
 
if(!function_exists('vc_excerpt')) {
 
  function vc_excerpt($excerpt_length = 35) {
 
		global $word_count, $post;
		$word_count = isset($word_count) && $word_count != "" ? $word_count : $excerpt_length;
		$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;
		$clean_excerpt = strip_shortcodes(remove_vc_from_excerpt($clean_excerpt));
		$excerpt_word_array = explode (' ',$clean_excerpt);
		$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);
		$excerpt = implode (' ', $excerpt_word_array).'....'; echo ''.$excerpt.'';
		
	}
 
}


/** 
	if you want to call that function use this
	
	<?php echo vc_excerpt(); ?>
	
 **/
 
?>

