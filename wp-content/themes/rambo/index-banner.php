<?php 
/**
* @Theme Name	:	rambo
* @file         :	index-banner.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/index-banner.php
*/
$current_options=get_option('rambo_theme_options');
if($current_options['home_banner_enabled']=="on")
{ 	
?>
<?php 
   // echo do_shortcode("[metaslider id=4]"); 
?>
<div class="front_banner">
    
    <?php
    
        $query_images_args = array(
            'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
        );

        $query_images = new WP_Query( $query_images_args );
        $media = array();
        foreach ( $query_images->posts as $image) {
            $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
            //if ($alt == 'slider') 
                $media[]= array(
                    'guid'=> wp_get_attachment_url( $image->ID ),
                    'title' => $image->post_title,
                    'caption' => $image->post_excerpt,
                    'description' => $image->post_content,
                    'alt'=> $alt
                );
        }
        
        //var_dump($media);
    
    ?>
    
    <ul class="banner" id="responsiveslides">
        
    <?php foreach($media as $pict) { ?>
        <li>
            
            <img class="banner_img webrit_slides" src="<?php echo $pict['guid']; ?>">
            <div class="banner_con">
                <h2><?php echo $pict['caption'] ?></h2>
                <h5 class="banner-title"><span><?php echo $pict['description'] ?></span></h5>
                <a href="http://treningi.kz" class="flex_btn" target="_blank"><?php _e('Читать'); ?></a>
            </div>
        </li>
    <?php } ?>
        
    </ul>		
</div>
<!--<div class="front_banner">	
	<div class="banner">			
		<li><img  class="banner_img webrit_slides" src="<?php if($current_options['home_custom_image']!='') { echo $current_options['home_custom_image']; } ?>">
			<div class="banner_con">
				<h2><?php if(isset($current_options['home_image_title']))	{ echo $current_options['home_image_title']; } else { _e('Theme Feature Goes Here !','rambo'); } ?></h2>
				<h5 class="banner-title"><span><?php if(isset($current_options['home_image_description']))	{ echo $current_options['home_image_description']; } else { _e('This is Dummy Text. This is Dummy Text. This is Dummy Text.  I repeat.. This is Dummy Text.','rambo'); } ?></span></h5>
			</div>
		</li>
	</div>			
</div> -->
<?php } ?>
