<?php
/**
* @Theme Name	:	rambo
* @file         :	index-service.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/index-service.php
*/
$current_options=get_option('rambo_theme_options');
if($current_options['home_service_enabled']=="on")
{
?>
<div class="container">	

	<!-- /Home Service Section -->
    <div class="row-fluid featured_port_title">
    	
        <!--<h1>Наши услуги</h1>
        
        <p>Здесь какие-то услуги</p>-->
    </div>
	<div class="row-fluid">	
			<div class="span3 home_service">
				<?php if($current_options['home_service_one_icon']!='') { ?>
				<!--<span class="fa-stack fa-4x icon_align_center">-->					
                                <a href="<?php echo $current_options['home_service_one_url'] ?>">
					<img class="icon_align_center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI . '/images/icons/128x128/'
                        .$current_options['home_service_one_icon'];?>" />
                                </a>
                    <!--<i class="fa  <?php echo $current_options['home_service_one_icon']; ?> home_media_icon_1x"></i>
				</span>-->
				<?php } ?>
				<h2><?php if(isset($current_options['home_service_one_title'])) { echo $current_options['home_service_one_title']; } ?></h2>
				<p> <?php if(isset($current_options['home_service_one_description'])) { echo $current_options['home_service_one_description']; } ?></p>
			</div>	
			<div class="span3 home_service">
				<?php if($current_options['home_service_two_icon']!='') { ?>
				<!--<span class="fa-stack fa-4x icon_align_center">-->
                                <a href="<?php echo $current_options['home_service_two_url'] ?>">
					<img class="icon_align_center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI . '/images/icons/128x128/'
                                
                        .$current_options['home_service_two_icon'];?>" />
                                </a>
                    <!--<i class="fa <?php echo $current_options['home_service_two_icon']; ?> home_media_icon_1x"></i>
				</span>-->
				<?php } ?>
				<h2><?php if(isset($current_options['home_service_two_title'])) { echo $current_options['home_service_two_title']; } ?></h2>
				<p> <?php if(isset($current_options['home_service_two_description'])) { echo $current_options['home_service_two_description']; } ?></p>
			</div>	
			
			<div class="span3 home_service">
				<?php if($current_options['home_service_three_icon']!='') { ?>
				<!--<span class="fa-stack fa-4x icon_align_center">-->
                                <a href="<?php echo $current_options['home_service_three_url'] ?>">
					<img class="icon_align_center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI . '/images/icons/128x128/'
                        .$current_options['home_service_three_icon'];?>" />
                                </a>
                    <!--<i class="fa <?php echo $current_options['home_service_three_icon']; ?> home_media_icon_1x"></i>
				</span>-->
				<?php } ?>
				<h2><?php if(isset($current_options['home_service_three_title'])) { echo $current_options['home_service_three_title']; } ?></h2>
				<p> <?php if(isset($current_options['home_service_three_description'])) { echo $current_options['home_service_three_description']; } ?></p>
			</div>	
			
			<div class="span3 home_service">
			<?php if($current_options['home_service_fourth_icon']!='')  { ?>	
				<!--<span class="fa-stack fa-4x icon_align_center">-->
                                <a href="<?php echo $current_options['home_service_fourth_url'] ?>">
					<img class="icon_align_center" src="<?php echo WEBRITI_TEMPLATE_DIR_URI . '/images/icons/128x128/'
                        .$current_options['home_service_fourth_icon'];?>" />
                                </a>
                    <!--<i class="fa <?php  echo $current_options['home_service_fourth_icon']; ?> home_media_icon_1x"></i>
				</span>-->
                <?php } ?>
				<h2><?php if(isset($current_options['home_service_fourth_title'])) { echo $current_options['home_service_fourth_title']; } ?></h2>
				<p> <?php if(isset($current_options['home_service_fourth_description'])) { echo $current_options['home_service_fourth_description']; } ?></p>
			</div>	
	</div>
	<!-- /Home Service Section -->	
</div>
<?php } ?>