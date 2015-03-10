<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >
	<h2>Раздел услуг</h2><hr>	
	<?php $current_options = get_option('rambo_theme_options');
	if(isset($_POST['rambo_settings_save_3']))
	{	
		if($_POST['rambo_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['rambo_gernalsetting_nonce_customization'],'rambo_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{				
				$current_options['home_service_one_icon']=sanitize_text_field($_POST['home_service_one_icon']);
				$current_options['home_service_one_title']=sanitize_text_field($_POST['home_service_one_title']);
				$current_options['home_service_one_description']=sanitize_text_field($_POST['home_service_one_description']);
				
				$current_options['home_service_two_icon']=sanitize_text_field($_POST['home_service_two_icon']);
				$current_options['home_service_two_title']=sanitize_text_field($_POST['home_service_two_title']);
				$current_options['home_service_two_description']=sanitize_text_field($_POST['home_service_two_description']);
				
				$current_options['home_service_three_icon']=sanitize_text_field($_POST['home_service_three_icon']);
				$current_options['home_service_three_title']=sanitize_text_field($_POST['home_service_three_title']);
				$current_options['home_service_three_description']=sanitize_text_field($_POST['home_service_three_description']);
				
				$current_options['home_service_fourth_icon']=sanitize_text_field($_POST['home_service_fourth_icon']);
				$current_options['home_service_fourth_title']=sanitize_text_field($_POST['home_service_fourth_title']);
				$current_options['home_service_fourth_description']=sanitize_text_field($_POST['home_service_fourth_description']);
				
				
				if($_POST['home_service_enabled'])
				{ echo $current_options['home_service_enabled']= sanitize_text_field($_POST['home_service_enabled']); } 
				else
				{ echo $current_options['home_service_enabled']="off"; } 
				
				
				update_option('rambo_theme_options',stripslashes_deep($current_options));
			}
		}	
		if($_POST['rambo_settings_save_3'] == 2) 
		{
			
			$current_options['home_service_enabled']="on";			
			
			$current_options['home_service_one_icon']="fa-tachometer";
			$current_options['home_service_one_title']="fa-tachometer ";
			$current_options['home_service_one_description']="Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem";
			
			$current_options['home_service_two_icon']="fa-film";
			$current_options['home_service_two_title']="fa-film";
			$current_options['home_service_two_description']="Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem";
			
			$current_options['home_service_three_icon']="fa-fighter-jet";
			$current_options['home_service_three_title']="fa-fighter-jet";
			$current_options['home_service_three_description']="Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem";
			
			$current_options['home_service_fourth_icon']="fa-flag-checkered";
			$current_options['home_service_fourth_title']="fa-flag-checkered";
			$current_options['home_service_fourth_description']="Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem";
			
			
			
			update_option('rambo_theme_options',$current_options);
		}
	}  ?>
	<form method="post" id="rambo_theme_options_3">
		<?php wp_nonce_field('rambo_customization_nonce_gernalsetting','rambo_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Включить раздел услуг','rambo'); ?></h3>
			<input type="checkbox" <?php if($current_options['home_service_enabled']=='on') echo "checked='checked'"; ?> id="home_service_enabled" name="home_service_enabled" > <span class="explain">Включить раздел услуг на главной, для страницы с шаблоном Business Home Page</span>
		</div>	
		
		<div class="section">
			<h3>Сервис первый</h3>
			<hr>
			<h3>Иконка - Fontawesome Icon <a href="http://fontawesome.io/icons/" target="blank"> Выбрать название иконки</a></h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['home_service_one_icon'])) { echo $current_options['home_service_one_icon']; } ?>" id="home_service_one_icon" name="home_service_one_icon" size="36" />
			<span class="icons help"><span class="tooltip">Введите иконку fontawesome icon</span></span>
		
			<h3>Заголовок</h3>
			<input class="webriti_inpute"  type="text" name="home_service_one_title" id="home_image_title" value="<?php if( isset($current_options['home_service_one_title'])) echo $current_options['home_service_one_title']; ?>" >
			<span class="icons help"><span class="tooltip">Введите заголовок</span></span>
		
			<h3>Описание</h3>
			<textarea rows="5" cols="8" id="home_service_one_description" name="home_service_one_description"  class="textbox1"><?php if(isset($current_options['home_service_one_description'])) { echo esc_attr($current_options['home_service_one_description']); } ?></textarea>
			<div class="">Введите описание до 150 симв.<br></div>
		</div>		
		
		<div class="section">
			<h3>Сервис второй</h3>
			<hr>
			<h3>Иконка - Fontawesome Icon</h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['home_service_two_icon'])) { echo $current_options['home_service_two_icon']; } ?>" id="home_service_two_icon" name="home_service_two_icon" size="36" />
			<span class="icons help"><span class="tooltip">Введите иконку fontawesome icon</span></span>
			
			<h3>Заголовок</h3>
			<input class="webriti_inpute"  type="text" name="home_service_two_title" id="home_service_two_title" value="<?php if( isset($current_options['home_service_two_title'])) echo $current_options['home_service_two_title']; ?>" >
			<span class="icons help"><span class="tooltip">Введите заголовок</span></span>
		
			<h3>Описание</h3>
			<textarea rows="5" cols="8" id="home_service_two_description" name="home_service_two_description"  class="textbox1"><?php if(isset($current_options['home_service_two_description'])) { echo esc_attr($current_options['home_service_two_description']); } ?></textarea>
			<div class="">Введите описание до 150 симв.<br></div>
		</div>	
		
		<div class="section">
			<h3>Сервис третий</h3>
			<hr>
			<h3>Иконка - Fontawesome Icon</h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['home_service_three_icon'])) { echo $current_options['home_service_three_icon']; } ?>" id="home_service_three_icon" name="home_service_three_icon" size="36" />
			<span class="icons help"><span class="tooltip">Введите иконку fontawesome icon</span></span>
		
			<h3>Заголовок</h3>
			<input class="webriti_inpute"  type="text" name="home_service_three_title" id="home_service_three_title" value="<?php if( isset($current_options['home_service_three_title'])) echo $current_options['home_service_three_title']; ?>" >
			<span class="icons help"><span class="tooltip">Введите заголовок</span></span>
		
			<h3>Описание</h3>
			<textarea rows="5" cols="8" id="home_service_three_description" name="home_service_three_description"  class="textbox1"><?php if(isset($current_options['home_service_three_description'])) { echo esc_attr($current_options['home_service_three_description']); } ?></textarea>
			<div class="">Введите описание до 150 симв.<br></div>
		</div>	
		<div class="section">
			<h3>Сервис четвертый</h3>
			<hr>
			<h3>Иконка - Fontawesome Icon</h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['home_service_fourth_icon'])) { echo $current_options['home_service_fourth_icon']; } ?>" id="home_service_fourth_icon" name="home_service_fourth_icon" size="36"/>
			<span class="icons help"><span class="tooltip">>Введите иконку fontawesome icon</span></span>
		
			<h3>Заголовок</h3>
			<input class="webriti_inpute"  type="text" name="home_service_fourth_title" id="home_service_fourth_title" value="<?php if( isset($current_options['home_service_fourth_title'])) echo $current_options['home_service_fourth_title']; ?>" >
			<span class="icons help"><span class="tooltip">Введите заголовок</span></span>
		
			<h3>Описание</h3>
			<textarea rows="5" cols="8" id="home_service_fourth_description" name="home_service_fourth_description"  class="textbox1"><?php if(isset($current_options['home_service_fourth_description'])) { echo esc_attr($current_options['home_service_fourth_description']); } ?></textarea>
			<div class="">Введите описание до 150 симв.<br></div>
		</div>	
		
		<div id="button_section">
			<input type="hidden" value="1" id="rambo_settings_save_3" name="rambo_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="По умолчанию" onclick="rambo_option_data_reset('3');">
			<input class="btn btn-primary" type="button" value="Сохранить настройки" onclick="rambo_option_data_save('3')" >
			<!--  alert massage when data saved and reset -->
			<div class="rambo_settings_save" id="rambo_settings_save_3_success" >Настройки сохранены</div>
			<div class="rambo_settings_save" id="rambo_settings_save_3_reset" >Настройки восстановленны по умолчанию</div>
		</div>
	</form>
</div>