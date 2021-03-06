<?php

/*
*	Q2AM Simple Adverts
*
*	Adds element to the template file
*
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.3
*
*	@Q2A Version	1.7
*
*	Do not modify this file unless you know what you are doing
 *
 * @TODO: Add more places for advert such as above and below answer, nth answers, admin sub pages etc.
*/

class qa_html_theme_layer extends qa_html_theme_base
{

	/**
	 * Add css for advert
	 */
	function head_custom()
	{
		parent::head_custom();
		$this->output('
<style>
	div.q2am-advert{
		width:100%;
		text-align:center;
	}
	div.q2am-advert img{
		max-width:100%;
		height:auto;
	}
	.qa-main h1:first-of-type{
		margin-bottom: 5px
	}
	.q2am-page-advert{
		margin-bottom: 5px
	}
	.q2am-page-advert img{
		max-width: 100%;
		height: auto;
	}
</style>
        ');
	}

	/**
	 * Override core function to add adverts
	 * @param $q_list
	 */
	function q_list($q_list)
	{
		$template = ($this->template == 'qa') ? 'home' : $this->template;

		if (qa_opt('q2am_enable_adverts')) {

			if (isset($q_list['qs'])) {
				$this->output('<DIV CLASS="qa-q-list">', '');
				$count = 1;
				foreach ($q_list['qs'] as $q_item) {
					$this->q_list_item($q_item);
					if ($count % qa_opt('q2am_after_every') == 0) {
						$this->output('<div class="qa-q-list-item ' . $template . '">');
						if (qa_opt('q2am_google_adsense')) {
							$this->output(qa_opt('q2am_google_adsense_codebox'));
						} elseif (qa_opt('q2am_image_advert')) {
							$this->output('<a href="' . qa_opt('q2am_advert_destination_link') . '" >');
							$this->output('<img src="' . qa_opt('q2am_advert_image_url') . '" alt="q2a-market-advert" />');
							$this->output('</a>');
						}

						$this->output('</div>');
					}
					$count++;
				}
				$this->output('</DIV> <!-- END qa-q-list -->', '');
			}
		} else {

			parent::q_list($q_list);
		}
	}

	/**
	 * Override core function to add page advert
	 */
	function page_title_error()
	{
		parent::page_title_error();
		$this->page_advert();
	}

	/**
	 * This method will populate advert dynamically based on set option for the plugin
	 */
	function page_advert()
	{
		$template = ($this->template == 'qa') ? 'home' : $this->template;
		$advert = qa_opt('q2am_' . $template . '_advert_image_url');

		if ((qa_opt('q2am_' . $template . '_enable_adverts')) && (!empty($advert))) {
			$html = '
<div class="q2am-page-advert ' . $template . '">
	<a href="' . qa_opt('q2am_' . $template . '_advert_destination_link') . '" >
		<img src="' . qa_opt('q2am_' . $template . '_advert_image_url') . '" alt="q2a-market-' . $template . '-advert" />
	</a>
</div>
            ';

			$this->output($html);
		}
	}
}
