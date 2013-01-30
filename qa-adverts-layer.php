<?php
/*
*	Q2AM Simple Adverts
*	
*	Adds element to the template file
*	
*	@author			Q2A Market
*	@category		Plugin
*	@Version: 		1.0
*	
*	@Q2A Version	1.5.2
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
            </style>
        
        ');
    }

    function q_list($q_list) 
    {
        
       if (qa_opt('q2am_enable_adverts')) {
        
            if (isset($q_list['qs'])) { 
                $this->output('<DIV CLASS="qa-q-list">', ''); 
                $count=1; 
                foreach ($q_list['qs'] as $q_item) { 
                    $this->q_list_item($q_item); 
                    if ($count%qa_opt('q2am_after_every') == 0) {
                        
                        $link = qa_opt('q2am_advert_destination_link');
                        
                        $this->output('<div class="q2am-advert">');
                        
                        if (qa_opt('q2am_google_adsense')) {
                            
                            $this->output(qa_opt('q2am_google_adsense_codebox'));
                            
                        } elseif (qa_opt('q2am_image_advert')) {                            

                            $this->output('<a href="'.qa_opt('q2am_advert_destination_link').'" >');                            
                            $this->output('<img src="'.qa_opt('q2am_advert_image_url').'" alt="advert" />');
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



}