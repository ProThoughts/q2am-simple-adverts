<?php
/*
*	Q2AM Simple Adverts
*
*	Plugin option form
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.1
*	
*	@Q2A Version	1.5.3
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
			qa_opt('advert_image_url', qa_post_text('q2am_advert_image_url'));
			qa_opt('advert_destination_link', qa_post_text('q2am_advert_destination_link'));
            qa_opt('q2am_google_adsense',(bool)qa_post_text('q2am_google_adsense'));
            qa_opt('q2am_google_adsense_codebox', qa_post_text('q2am_google_adsense_codebox_field'));            
            qa_opt('q2am_after_every', qa_post_text('q2am_after_every'));			
			
			
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