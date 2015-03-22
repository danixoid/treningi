<?php	
/**
Template Name:Business Home Page 
* @Theme Name	:	rambo
* @file         :	front-rambo.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/front-rambo.php
*/ 

	get_header();

	/****** get index banner  ********/
	get_template_part('index', 'banner') ;
	
	/****** get index service  ********/
	get_template_part('index', 'service') ;
	
	$query_images_args = array(
            'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
        );

        $query_images = new WP_Query( $query_images_args );
        $media = array();
        foreach ( $query_images->posts as $image) {
            $alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
            if ($alt == 'banner') 
                $media[]= array(
                    'guid'=> wp_get_attachment_url( $image->ID ),
                    'title' => $image->post_title,
                    'caption' => $image->post_excerpt,
                    'description' => $image->post_content,
                    'alt'=> $alt
                );
        }
	
	foreach($media as $pict) {
	    echo '<a href="' . $pict['description'] . '"><img width="100%" src="' . $pict['guid'] . '"></a>';
	}
	
        /****** get index slides  ********/
	get_template_part('index', 'slides') ;
	
	/****** get footer section *********/
	get_footer(); 
	
?>