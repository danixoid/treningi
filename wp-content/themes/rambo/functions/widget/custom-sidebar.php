<?php
/**
* @Theme Name	:	rambo
* @file         :	custom-sidebar.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/

add_action( 'widgets_init', 'rambo_widgets_init');
function rambo_widgets_init() {

/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar', 'rambo' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'rambo' ),
		'before_widget' => '<div class="sidebar_widget" >',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar_widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );

register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'rambo' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'rambo' ),
		'before_widget' => '<div class="span4 footer_widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h2>',
		'after_title' => '</h2></div>',
	) );
	

register_sidebar( array(
		'name' => __( 'My Widget Area', 'rambo' ),
		'id' => 'my-widget-area',
		'description' => __( 'My widget area', 'rambo' ),
		'before_widget' => '<div class="span3 featured_port_projects"><div class="thumbnail">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget_title"><h3>',
		'after_title' => '</h3></div>',
	) );


register_sidebar( array(
		'name' => __( 'My Last News', 'rambo' ),
		'id' => 'my-last-news',
		'description' => __( 'My last news', 'rambo' ),
		'before_widget' => '<div class="span4 latest_news_section">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}



class Ads_Widgets extends WP_Widget
{
    function Ads_Widgets() {
        $widget_ops = array('classname' => 'Ads_Widgets', 'description' => 'Displays Ads' );
        $this->WP_Widget('Ads_Widgets', 'Тизер виджеты', $widget_ops);
    }

   function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        $message = esc_attr($instance['message']);
        $image = esc_attr($instance['image']);
        $link = esc_attr($instance['link']);
    
    
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                    name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                    value="<?php echo attribute_escape($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Message text'); ?></label>
            <textarea rows="4" cols="50" class="widefat"  
                id="<?php echo $this->get_field_id('message'); ?>" 
                name="<?php echo $this->get_field_name('message'); ?>"><?php echo ($message); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Advertisement Banner'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image'); ?>" 
                    name="<?php echo $this->get_field_name('image'); ?>" type="text" 
                    value="<?php echo attribute_escape($image); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Ads Link'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" 
                name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
        </p>
    <?php
  
  
    }
  

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['image'] = $new_instance['image'];
        $instance['message'] = $new_instance['message'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $image = $instance['image'];
        $link = $instance['link'];
        $message = $instance['message'];
        
        ?>
              <?php echo $before_widget; ?>
                  <?php //if ( $title )
                        //echo $before_title . $title . $after_title; ?>
                <div class="thumbnail">
                    <div class="featured_service_content">
                        <?php echo '<img width="1920" height="1275"  src="'.$image.'" 
                            class="attachment-post-thumbnail wp-post-image" alt="'.$title.'"/>'; ?>
                        <h3><?php echo '<a href="'.$link.'" target="_blank">'.$title; ?></a></h3>
                        <p><?php echo $message; ?></p>
                        <p><?php echo '<a class="featured_port_projects_btn pull-right" href="'.$link.'" target="_blank">'; ?>Читать далее</a></p>
                    </div>
                </div>
              <?php echo $after_widget; ?>
        <?php
    }

}
//call register widget
add_action( 'widgets_init', create_function('', 'return register_widget("Ads_Widgets");') );
?>
