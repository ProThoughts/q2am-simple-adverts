<?php
/*
*	Q2AM Simple Adverts
*
*	Plugin option form
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.2
*	
*	@Q2A Version	1.6
*
*	Do not modify this file unless you know what you are doing
*/

class qa_adverts {

	function allow_template($template)
	{
		return ($template!='admin');
	}

	function option_default($option) {

		switch($option) {
  
            case 'q2am_enable_adverts':
                return true;
            
            case 'q2am_image_advert':
                return true;
            
            case 'q2am_after_every':
                return 5;
                
			default:
				return null;
		}	

	}
	
	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('np_q_save_button')) {
			
			qa_opt('q2am_enable_adverts',(bool)qa_post_text('q2am_enable_adverts'));            
			qa_opt('q2am_image_advert',(bool)qa_post_text('q2am_image_advert'));			
			qa_opt('q2am_advert_image_url', qa_post_text('q2am_advert_image_url'));
			qa_opt('q2am_advert_destination_link', qa_post_text('q2am_advert_destination_link'));
			qa_opt('q2am_google_adsense',(bool)qa_post_text('q2am_google_adsense'));
			qa_opt('q2am_google_adsense_codebox', qa_post_text('q2am_google_adsense_codebox_field'));            
			qa_opt('q2am_after_every', qa_post_text('q2am_after_every'));


			// page advert options
			qa_opt('q2am_home_advert_image_url', qa_post_text('q2am_home_advert_image_url'));
			qa_opt('q2am_home_advert_destination_link', qa_post_text('q2am_home_advert_destination_link'));

			qa_opt('q2am_activity_advert_image_url', qa_post_text('q2am_activity_advert_image_url'));
			qa_opt('q2am_activity_advert_destination_link', qa_post_text('q2am_activity_advert_destination_link'));

			qa_opt('q2am_questions_advert_image_url', qa_post_text('q2am_questions_advert_image_url'));
			qa_opt('q2am_questions_advert_destination_link', qa_post_text('q2am_questions_advert_destination_link'));

			qa_opt('q2am_unanswered_advert_image_url', qa_post_text('q2am_unanswered_advert_image_url'));
			qa_opt('q2am_unanswered_advert_destination_link', qa_post_text('q2am_unanswered_advert_destination_link'));

			qa_opt('q2am_tags_advert_image_url', qa_post_text('q2am_tags_advert_image_url'));
			qa_opt('q2am_tags_advert_destination_link', qa_post_text('q2am_tags_advert_destination_link'));

			qa_opt('q2am_categories_advert_image_url', qa_post_text('q2am_categories_advert_image_url'));
			qa_opt('q2am_categories_advert_destination_link', qa_post_text('q2am_categories_advert_destination_link'));

			qa_opt('q2am_users_advert_image_url', qa_post_text('q2am_users_advert_image_url'));
			qa_opt('q2am_users_advert_destination_link', qa_post_text('q2am_users_advert_destination_link'));

			qa_opt('q2am_admin_advert_image_url', qa_post_text('q2am_admin_advert_image_url'));
			qa_opt('q2am_admin_advert_destination_link', qa_post_text('q2am_admin_advert_destination_link'));


			qa_opt('q2am_home_enable_adverts',(bool)qa_post_text('q2am_home_enable_adverts'));
			qa_opt('q2am_activity_enable_adverts',(bool)qa_post_text('q2am_activity_enable_adverts'));
			qa_opt('q2am_questions_enable_adverts',(bool)qa_post_text('q2am_questions_enable_adverts'));
			qa_opt('q2am_unanswered_enable_adverts',(bool)qa_post_text('q2am_unanswered_enable_adverts'));
			qa_opt('q2am_tags_enable_adverts',(bool)qa_post_text('q2am_tags_enable_adverts'));
			qa_opt('q2am_categories_enable_adverts',(bool)qa_post_text('q2am_categories_enable_adverts'));
			qa_opt('q2am_users_enable_adverts',(bool)qa_post_text('q2am_users_enable_adverts'));
			qa_opt('q2am_admin_enable_adverts',(bool)qa_post_text('q2am_admin_enable_adverts'));
			
			$ok = qa_lang('admin/options_saved');
		}
		else if (qa_clicked('np_q_reset_button')) {
			foreach($_POST as $i => $v) {
				$def = $this->option_default($i);
				if($def !== null) qa_opt($i,$def);
			}
			$ok = qa_lang('admin/options_reset');
		}
        
			qa_set_display_rules($qa_content, array(
				
				'q2am_google_adsense_codebox_display' => 'q2am_google_adsense',
				'q2am_advert_image_url' => 'q2am_image_advert',
				'q2am_advert_destination_link' => 'q2am_image_advert',

				// page advert
				'q2am_home_advert_image_url' => 'q2am_home_enable_adverts',
				'q2am_activity_advert_image_url' => 'q2am_activity_enable_adverts',
				'q2am_questions_advert_image_url' => 'q2am_questions_enable_adverts',
				'q2am_unanswered_advert_image_url' => 'q2am_unanswered_enable_adverts',
				'q2am_tags_advert_image_url' => 'q2am_tags_enable_adverts',
				'q2am_categories_advert_image_url' => 'q2am_categories_enable_adverts',
				'q2am_users_advert_image_url' => 'q2am_users_enable_adverts',
				'q2am_admin_advert_image_url' => 'q2am_admin_enable_adverts',

				'q2am_home_advert_destination_link' => 'q2am_home_enable_adverts',
				'q2am_activity_advert_destination_link' => 'q2am_activity_enable_adverts',
				'q2am_questions_advert_destination_link' => 'q2am_questions_enable_adverts',
				'q2am_unanswered_advert_destination_link' => 'q2am_unanswered_enable_adverts',
				'q2am_tags_advert_destination_link' => 'q2am_tags_enable_adverts',
				'q2am_categories_advert_destination_link' => 'q2am_categories_enable_adverts',
				'q2am_users_advert_destination_link' => 'q2am_users_enable_adverts',
				'q2am_admin_advert_destination_link' => 'q2am_admin_enable_adverts',
				
			));

		$fields = array();

		$fields[] = array(
			'label' => 'Enable Adverts',
			'tags' => 'NAME="q2am_enable_adverts"',
			'value' => qa_opt('q2am_enable_adverts'),
			'type' => 'checkbox',
		);
        
		$fields[] = array(
			'label' => 'Image Advert (This option will be ignored if Google Adsense or HTML option is active)',
			'type' => 'checkbox',
			'value' => qa_opt('q2am_image_advert'),
			'tags' => 'NAME="q2am_image_advert" ID="q2am_image_advert"',
		);

		$fields[] = array(
			'id' => 'q2am_advert_image_url',
			'label' => 'Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_advert_image_url'),
			'tags' => 'NAME="q2am_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_advert_destination_link',
			'label' => 'Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_advert_destination_link'),
			'tags' => 'NAME="q2am_advert_destination_link"',
		);
        
		$fields[] = array(
			'label' => 'Google Adsense or HTML',
			'type' => 'checkbox',
			'value' => qa_opt('q2am_google_adsense'),
			'tags' => 'NAME="q2am_google_adsense" ID="q2am_google_adsense"',
		);
		
		$fields[] = array(
			'id' => 'q2am_google_adsense_codebox_display',
			'label' => 'Google Adsense or HTML Code',
			'type' => 'textarea',
			'value' => qa_opt('q2am_google_adsense_codebox'),
			'tags' => 'NAME="q2am_google_adsense_codebox_field"',
            'rows' => 3,
		);
        
		$fields[] = array(
			'label' => 'Display After Every',
			'tags' => 'NAME="q2am_after_every"',
			'value' => qa_opt('q2am_after_every'),
			'type' => 'number',				
		);

		$fields[] = array(
			'type' => 'blank',
		);

		// page specific options
		$fields[] = array(
			'label' => 'Enable Home Adverts',
			'tags' => 'NAME="q2am_home_enable_adverts" ID="q2am_home_enable_adverts"',
			'value' => qa_opt('q2am_home_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_home_advert_image_url',
			'label' => 'Home Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_home_advert_image_url'),
			'tags' => 'NAME="q2am_home_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_home_advert_destination_link',
			'label' => 'Home Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_home_advert_destination_link'),
			'tags' => 'NAME="q2am_home_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Activity Adverts',
			'tags' => 'NAME="q2am_activity_enable_adverts" ID="q2am_activity_enable_adverts"',
			'value' => qa_opt('q2am_activity_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_activity_advert_image_url',
			'label' => 'Activity Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_activity_advert_image_url'),
			'tags' => 'NAME="q2am_activity_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_activity_advert_destination_link',
			'label' => 'Activity Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_activity_advert_destination_link'),
			'tags' => 'NAME="q2am_activity_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Questions Adverts',
			'tags' => 'NAME="q2am_questions_enable_adverts" ID="q2am_questions_enable_adverts"',
			'value' => qa_opt('q2am_questions_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_questions_advert_image_url',
			'label' => 'Questions Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_questions_advert_image_url'),
			'tags' => 'NAME="q2am_questions_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_questions_advert_destination_link',
			'label' => 'Questions Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_questions_advert_destination_link'),
			'tags' => 'NAME="q2am_questions_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Unanswered Adverts',
			'tags' => 'NAME="q2am_unanswered_enable_adverts" ID="q2am_unanswered_enable_adverts"',
			'value' => qa_opt('q2am_unanswered_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_unanswered_advert_image_url',
			'label' => 'Unanswered Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_unanswered_advert_image_url'),
			'tags' => 'NAME="q2am_unanswered_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_unanswered_advert_destination_link',
			'label' => 'Unanswered Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_unanswered_advert_destination_link'),
			'tags' => 'NAME="q2am_unanswered_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Tags Adverts',
			'tags' => 'NAME="q2am_tags_enable_adverts" ID="q2am_tags_enable_adverts"',
			'value' => qa_opt('q2am_tags_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_tags_advert_image_url',
			'label' => 'Tags Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_tags_advert_image_url'),
			'tags' => 'NAME="q2am_tags_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_tags_advert_destination_link',
			'label' => 'Tags Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_tags_advert_destination_link'),
			'tags' => 'NAME="q2am_tags_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Categories Adverts',
			'tags' => 'NAME="q2am_categories_enable_adverts" ID="q2am_categories_enable_adverts"',
			'value' => qa_opt('q2am_categories_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_categories_advert_image_url',
			'label' => 'Categories Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_categories_advert_image_url'),
			'tags' => 'NAME="q2am_categories_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_categories_advert_destination_link',
			'label' => 'Categories Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_categories_advert_destination_link'),
			'tags' => 'NAME="q2am_categories_advert_destination_link"',
		);

		$fields[] = array(
			'label' => 'Enable Users Adverts',
			'tags' => 'NAME="q2am_users_enable_adverts" ID="q2am_users_enable_adverts"',
			'value' => qa_opt('q2am_users_enable_adverts'),
			'type' => 'checkbox',
		);

		$fields[] = array(
			'id' => 'q2am_users_advert_image_url',
			'label' => 'Users Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_users_advert_image_url'),
			'tags' => 'NAME="q2am_users_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_users_advert_destination_link',
			'label' => 'Users Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_users_advert_destination_link'),
			'tags' => 'NAME="q2am_users_advert_destination_link"',
		);	

		$fields[] = array(
			'label' => 'Enable Admin Adverts',
			'tags' => 'NAME="q2am_admin_enable_adverts" ID="q2am_admin_enable_adverts"',
			'value' => qa_opt('q2am_admin_enable_adverts'),
			'type' => 'checkbox',
		);	

		$fields[] = array(
			'id' => 'q2am_admin_advert_image_url',
			'label' => 'Admin Image Full URL (leading with http:// )',
			'type' => 'text',
			'value' => qa_opt('q2am_admin_advert_image_url'),
			'tags' => 'NAME="q2am_admin_advert_image_url"',
		);

		$fields[] = array(
			'id' => 'q2am_admin_advert_destination_link',
			'label' => 'Admin Advert Link',
			'type' => 'text',
			'value' => qa_opt('q2am_admin_advert_destination_link'),
			'tags' => 'NAME="q2am_admin_advert_destination_link"',
		);		

		

		$fields[] = array(
			'type' => 'blank',
		);

		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			
			'fields' => $fields,
			
			'buttons' => array(
				array(
				'label' => qa_lang_html('main/save_button'),
				'tags' => 'NAME="np_q_save_button"',
				),
				array(
				'label' => qa_lang_html('admin/reset_options_button'),
				'tags' => 'NAME="np_q_reset_button"',
				),
			),
		);
	}

}