<?php
/*
*	Q2AM Simple Adverts
*	
*	Adds element to the template file
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.2
*	
*	@Q2A Version	1.6
*
*	Do not modify this file unless you know what you are doing
*/

class qa_html_theme_layer extends qa_html_theme_base {
    
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

    function q_list($q_list) 
    {
        $template = qa_request() == '' ? 'home' : qa_request_part(0);
        
        if (qa_opt('q2am_enable_adverts')) {
        
            if (isset($q_list['qs'])) { 
                $this->output('<DIV CLASS="qa-q-list">', ''); 
                $count=1; 
                foreach ($q_list['qs'] as $q_item) { 
                    $this->q_list_item($q_item); 
                    if ($count%qa_opt('q2am_after_every') == 0) {
                        
                        $link = qa_opt('q2am_advert_destination_link');
                        
                        $this->output('<div class="qa-q-list-item '.$template.'">');
                        
                        if (qa_opt('q2am_google_adsense')) {
                            
                            $this->output(qa_opt('q2am_google_adsense_codebox'));
                            
                        } elseif (qa_opt('q2am_image_advert')) {                            

                            $this->output('<a href="'.qa_opt('q2am_advert_destination_link').'" >');                            
                            $this->output('<img src="'.qa_opt('q2am_advert_image_url').'" alt="q2a-market-advert" />');
                            $this->output('</a>');
                        
                        }                        
                        
                        $this->output('</div>');
                        
                    } 
                    $count++; 
                } 
                $this->output('</DIV> <!-- END qa-q-list -->', ''); 
            }
            
        } else {
            
            qa_html_theme_base::q_list($q_list);
            
        }
         
    }


    function page_title_error()
    {
        qa_html_theme_base::page_title_error();
        $this->page_advert();
    }



    function page_advert()
    {

        $template = qa_request() == '' ? 'home' : qa_request_part(0);
        $advert = qa_opt('q2am_'.$template.'_advert_image_url');

        if((qa_opt('q2am_'.$template.'_enable_adverts')) && (!empty($advert))) {

            $html = '
            <!-- Start Q2A Market page advert -->
            <div class="q2am-page-advert '.$template.'">
                <a href="'.qa_opt('q2am_'.$template.'_advert_destination_link').'" >
                    <img src="'.qa_opt('q2am_'.$template.'_advert_image_url').'" alt="q2a-market-'.$template.'-advert" />
                </a>
            </div>
            <!-- End Q2A Market page advert -->
            ';

            $this->output($html);

        } //endif

    }


}