<?php
/**
* @Theme Name	:	rambo
* @file         :	submenu-widgets.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/

class Submenu_Widgets extends WP_Widget
{
    function Submenu_Widgets() {
        $widget_ops = array('classname' => 'Submenu_Widgets', 'description' => 'Displays Submenu' );
        $this->WP_Widget('Submenu_Widgets', 'Подменю', $widget_ops);
    }

   function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        
    
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                    name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                    value="<?php echo attribute_escape($title); ?>" />
        </p>
    <?php
  
  
    }
  

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function widget($args, $instance) {
        extract( $args );
        $post = $GLOBALS['post'];
        $title = apply_filters('widget_title', $instance['title']);
        $title = ($title == '')?get_the_title():$title;

	$children = get_pages('child_of='.$post->ID);
	if( count( $children ) != 0 && $title != '' ):
	?>
	<div class="sidebar_widget">
		<div class="sidebar_widget_title">
			<h2><?php echo $title; ?></h2>
		</div>
		<ul class="menu">
			<?php wp_list_pages( array('depth' => 1,'child_of' => $post->ID,'title_li'=> '' ) ); ?>
		</ul>
	</div>
	<?php endif;
	}
}
//call register widget
add_action( 'widgets_init', create_function('', 'return register_widget("Submenu_Widgets");') );

?>