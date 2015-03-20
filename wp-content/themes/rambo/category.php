<?php   
/**
* @Theme Name	:	rambo
* @file         :	category.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/category.php
*/ 
get_template_part('banner','strip'); ?>
<div class="container"><!-- Main --> 
		<div class="row-fluid">
        <div class="span8 Blog_main">
			<?php  while(have_posts()): the_post();?>
			<div class="blog_section">
				<!--<h2><?php  _e( "Category  Archives:", 'rambo'); echo single_cat_title( '', false ); ?></h2>-->
				<h2><a href="<?php the_permalink(); ?>"title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
                <span class="blog_tags"><h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a><span><?php echo get_the_date('M j,Y');?></span></h5></span>
                <span class="blog_tags"><i class="fa fa-group"></i><?php the_category(',');?></span>
                        
				<div class="media">
                    
					<div class="media-body">
                        <?php $defalt_arg =array('class' => "blog_section_img" )?>
                        <?php if(has_post_thumbnail()):?>
                        <?php $excerpt = preg_split('/\.\s+/',get_the_excerpt(__( 'Read More' , 'rambo')),2);?> 
                        <p><?php echo $excerpt[0] . '.'; ?> </p>
                        <a  href="<?php the_permalink(); ?>" class="blog_pull_img">
                        <?php the_post_thumbnail('blog2_section_img', $defalt_arg); //media-object?>
                        </a>
                        <p><?php echo $excerpt[1]; ?></p>
                        <?php else: ?>
                        <p><?php the_excerpt( __( 'Read More' , 'rambo' ) );?></p>
                        <?php endif;?>
                        
                        
                        <?php $posttags = get_the_tags();?>
                        <p><?php if($posttags) { ?>
                        <span class="blog_tags"><i class="fa fa-tags"></i> 
                            <a href="<?php the_permalink(); ?>"><?php the_tags('<b>'.__('Tags:','rambo').'</b>',',');?></a>
                        </span><?php } ?>
                        <a href="<?php the_permalink(); ?>" class="blog_section_readmore pull-right"><?php _e('Read more...','rambo');?></a>
                        </p>
					</div>
				</div>
			</div>	
			<?php endwhile;?>		 
		</div>
		<?php get_sidebar();?>
		</div>
</div>
<?php  get_footer(); ?>
