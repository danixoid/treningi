<?php
/**
* @Theme Name	:	rambo
* @file         :	custom-widgers.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
*/

class News_Widgets extends WP_Widget
{
    function News_Widgets() {
        $widget_ops = array('classname' => 'News_Widgets', 'description' => 'Displays News' );
        $this->WP_Widget('News_Widgets', 'Последние Новости', $widget_ops);
    }

   function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        $post_count = $instance['post_count'];
    
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                    name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                    value="<?php echo attribute_escape($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('News count'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" 
                name="<?php echo $this->get_field_name('post_count'); ?>" type="text" value="<?php echo $post_count; ?>" />
        </p>
    <?php
  
  
    }
  

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['post_count'] = $new_instance['post_count'];
        return $instance;
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $post_count = $instance['post_count'];
        
        ?>
        <div class="for_mobile">
            <div class="container">	
                <div class="row-fluid">
                    <div class="team_head_title">
                        <h3><?php echo $title; ?></h3>
                    </div>
                </div>
            <?php echo $before_widget; ?>
            
            <?php $the_query = new WP_Query(  
                array(
                    'showposts' => $post_count,
                    'category_name' => '',
                )
            ); ?>
            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            
            <?php 
                $thumb_id = get_post_thumbnail_id();
                $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
            ?>
            <div class="span4 latest_news_section">
            
                <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail(array(162,102),array('class'=>'latest_news_img wp-post-image')); ?>
                </a>
                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(__('(Далее...)')); ?>
                
                <div class="latest_news_comment">
                    <a class="pull-left" href="<?php the_permalink(); ?>"><i class="fa fa-calendar icon-spacing"></i><?php the_date();?></a>
                    <a class="pull-right" href="<?php the_permalink().'#comment'; ?>"><i class="fa fa-comment icon-spacing"></i><?php comments_number();?></a>
                </div>
            </div>
            
            <?php endwhile;?>
            
            <?php echo $after_widget; ?>
        
        
            </div>
        </div>
        <?php
    }

}
//call register widget
add_action( 'widgets_init', create_function('', 'return register_widget("News_Widgets");') );

?>
