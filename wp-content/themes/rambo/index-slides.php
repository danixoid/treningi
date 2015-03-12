<?php
/**
* @Theme Name	:	rambo
* @file         :	index-slides.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/index-service.php
*/
?>

<?php if ( is_active_sidebar( 'my-widget-area' ) )
{?>
<div class="portfolio_main_content">	
	<div class="container">	
		<div class="row-fluid featured_port_title">
			<h1>Информационный тренинговый портал</h1>
			<p>Единое тренинговое пространство  Perfecta</p>
		</div>	
		<div class="row">
            <div class="">
				<?php dynamic_sidebar( 'my-widget-area' ); ?>
			</div>	
        </div>
	</div>
</div>

<?php } ?> 
