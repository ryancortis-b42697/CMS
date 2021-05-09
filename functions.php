<?php 
function twitter_button_shortcode() {
    return '<a href="http://twitter.com/mysupps" class="twitter-button">Follow us on Twitter!</a>';
}
add_shortcode('twitterbutton', 'twitter_button_shortcode'); 

function image_shortcode($attr){
    $args = shortcode_atts(
            array(
                'src'   => '#',
                'class' => ''   
             ), $attr);
   $image = '<img src="'.$args['src'].'" class="'.$args['class'].'" />';
   return $image;
}
add_shortcode('imageshortcode', 'image_shortcode');

function year_code(){
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_code');

function oldest_posts_function() {
   query_posts(array('orderby' => 'date', 'order' => 'ASC' , 'showposts' => 1));
   if (have_posts()) :
      while (have_posts()) : the_post();
         $return_string ='<a href="'.get_permalink().'">Go back in time, view our oldest blog: '.get_the_title().'</a>';
      endwhile;
   endif;
   wp_reset_query();
   return $return_string;
}
add_shortcode('oldest-posts', 'oldest_posts_function');

function loggedin( $atts ) {
	global $current_user, $user_login;
      	get_currentuserinfo();
	add_filter('widget_text', 'do_shortcode');
	return 'Hello!, ' . $current_user->display_name . ' if you require support please view the FAQ or contact us using the form below.';
}
add_shortcode('loggedin', 'loggedin');

function dropcap($atts, $content = null) {
	return '
<div class="dropcap">'.$content.'</div>';
}
add_shortcode('dropcap', 'dropcap');


function ad_plug() {
return 'Shop now at https://mysupps-3c4460.ingress-earth.easywp.com/store/ and use the code SALE for 15% off ';
}
add_shortcode('plug', 'ad_plug');