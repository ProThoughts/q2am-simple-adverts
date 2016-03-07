<?php

/*
*	Q2AM Simple Adverts
*
*	Plugin option form
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

class qa_adverts
{
    private $page_template;

    function __construct()
    {
        $this->page_template = [
            'home',
            'activity',
            'questions',
            'question',
            'unanswered',
            'tags',
            'categories',
            'users',
            'user',
            'admin',
            'ask'
        ];
    }

    function allow_template( $template )
    {
        return ( $template != 'admin' );
    }

    function option_default( $option )
    {

        switch ( $option ) {

            case 'q2am_enable_adverts':
                return TRUE;

            case 'q2am_image_advert':
                return TRUE;

            case 'q2am_after_every':
                return 5;

            default:
                return NULL;
        }

    }

    function display_check()
    {
        $default = [
            'q2am_google_adsense_codebox_display' => 'q2am_google_adsense',
            'q2am_advert_image_url'               => 'q2am_image_advert',
            'q2am_advert_destination_link'        => 'q2am_image_advert',
        ];

        foreach ( $this->page_template as $page ) {
            $image_ids[] = 'q2am_' . $page . '_advert_image_url';
            $link_ids[]  = 'q2am_' . $page . '_advert_destination_link';
            $values[]    = 'q2am_' . $page . '_enable_adverts';
        }

        $data = array_merge(
            $default,
            array_combine( $image_ids, $values ),
            array_combine( $link_ids, $values )
        );

        return $data;
    }

    function admin_form( &$qa_content )
    {

        $ok = NULL;
        if ( qa_clicked( 'np_q_save_button' ) ) {

            qa_opt( 'q2am_enable_adverts', (bool)qa_post_text( 'q2am_enable_adverts' ) );
            qa_opt( 'q2am_image_advert', (bool)qa_post_text( 'q2am_image_advert' ) );
            qa_opt( 'q2am_advert_image_url', qa_post_text( 'q2am_advert_image_url' ) );
            qa_opt( 'q2am_advert_destination_link', qa_post_text( 'q2am_advert_destination_link' ) );
            qa_opt( 'q2am_google_adsense', (bool)qa_post_text( 'q2am_google_adsense' ) );
            qa_opt( 'q2am_google_adsense_codebox', qa_post_text( 'q2am_google_adsense_codebox_field' ) );
            qa_opt( 'q2am_after_every', qa_post_text( 'q2am_after_every' ) );


            foreach ( $this->page_template as $page ) {
                qa_opt( 'q2am_' . $page . '_advert_image_url', qa_post_text( 'q2am_' . $page . '_advert_image_url' ) );
                qa_opt( 'q2am_' . $page . '_advert_destination_link', qa_post_text( 'q2am_' . $page . '_advert_destination_link' ) );
                qa_opt( 'q2am_' . $page . '_enable_adverts', (bool)qa_post_text( 'q2am_' . $page . '_enable_adverts' ) );
            }

            // page advert options
            /*
            qa_opt( 'q2am_home_advert_image_url', qa_post_text( 'q2am_home_advert_image_url' ) );
            qa_opt( 'q2am_home_advert_destination_link', qa_post_text( 'q2am_home_advert_destination_link' ) );

            qa_opt( 'q2am_activity_advert_image_url', qa_post_text( 'q2am_activity_advert_image_url' ) );
            qa_opt( 'q2am_activity_advert_destination_link', qa_post_text( 'q2am_activity_advert_destination_link' ) );

            qa_opt( 'q2am_questions_advert_image_url', qa_post_text( 'q2am_questions_advert_image_url' ) );
            qa_opt( 'q2am_questions_advert_destination_link', qa_post_text( 'q2am_questions_advert_destination_link' ) );

            qa_opt( 'q2am_unanswered_advert_image_url', qa_post_text( 'q2am_unanswered_advert_image_url' ) );
            qa_opt( 'q2am_unanswered_advert_destination_link', qa_post_text( 'q2am_unanswered_advert_destination_link' ) );

            qa_opt( 'q2am_tags_advert_image_url', qa_post_text( 'q2am_tags_advert_image_url' ) );
            qa_opt( 'q2am_tags_advert_destination_link', qa_post_text( 'q2am_tags_advert_destination_link' ) );

            qa_opt( 'q2am_categories_advert_image_url', qa_post_text( 'q2am_categories_advert_image_url' ) );
            qa_opt( 'q2am_categories_advert_destination_link', qa_post_text( 'q2am_categories_advert_destination_link' ) );

            qa_opt( 'q2am_users_advert_image_url', qa_post_text( 'q2am_users_advert_image_url' ) );
            qa_opt( 'q2am_users_advert_destination_link', qa_post_text( 'q2am_users_advert_destination_link' ) );

            qa_opt( 'q2am_admin_advert_image_url', qa_post_text( 'q2am_admin_advert_image_url' ) );
            qa_opt( 'q2am_admin_advert_destination_link', qa_post_text( 'q2am_admin_advert_destination_link' ) );


            qa_opt( 'q2am_home_enable_adverts', (bool)qa_post_text( 'q2am_home_enable_adverts' ) );
            qa_opt( 'q2am_activity_enable_adverts', (bool)qa_post_text( 'q2am_activity_enable_adverts' ) );
            qa_opt( 'q2am_questions_enable_adverts', (bool)qa_post_text( 'q2am_questions_enable_adverts' ) );
            qa_opt( 'q2am_unanswered_enable_adverts', (bool)qa_post_text( 'q2am_unanswered_enable_adverts' ) );
            qa_opt( 'q2am_tags_enable_adverts', (bool)qa_post_text( 'q2am_tags_enable_adverts' ) );
            qa_opt( 'q2am_categories_enable_adverts', (bool)qa_post_text( 'q2am_categories_enable_adverts' ) );
            qa_opt( 'q2am_users_enable_adverts', (bool)qa_post_text( 'q2am_users_enable_adverts' ) );
            qa_opt( 'q2am_admin_enable_adverts', (bool)qa_post_text( 'q2am_admin_enable_adverts' ) );
            */
            $ok = qa_lang( 'admin/options_saved' );
        } else {
            if ( qa_clicked( 'np_q_reset_button' ) ) {
                foreach ( $_POST as $i => $v ) {
                    $def = $this->option_default( $i );
                    if ( $def !== NULL ) {
                        qa_opt( $i, $def );
                    }
                }
                $ok = qa_lang( 'admin/options_reset' );
            }
        }

        qa_set_display_rules( $qa_content, $this->display_check() );

        /*
        qa_set_display_rules( $qa_content, [

            'q2am_google_adsense_codebox_display' => 'q2am_google_adsense',
            'q2am_advert_image_url'               => 'q2am_image_advert',
            'q2am_advert_destination_link'        => 'q2am_image_advert',

            // page advert
            'q2am_home_advert_image_url'          => 'q2am_home_enable_adverts',
            'q2am_activity_advert_image_url'      => 'q2am_activity_enable_adverts',
            'q2am_questions_advert_image_url'     => 'q2am_questions_enable_adverts',
            'q2am_unanswered_advert_image_url'    => 'q2am_unanswered_enable_adverts',
            'q2am_tags_advert_image_url'          => 'q2am_tags_enable_adverts',
            'q2am_categories_advert_image_url'    => 'q2am_categories_enable_adverts',
            'q2am_users_advert_image_url'         => 'q2am_users_enable_adverts',
            'q2am_admin_advert_image_url'         => 'q2am_admin_enable_adverts',

            'q2am_home_advert_destination_link'       => 'q2am_home_enable_adverts',
            'q2am_activity_advert_destination_link'   => 'q2am_activity_enable_adverts',
            'q2am_questions_advert_destination_link'  => 'q2am_questions_enable_adverts',
            'q2am_unanswered_advert_destination_link' => 'q2am_unanswered_enable_adverts',
            'q2am_tags_advert_destination_link'       => 'q2am_tags_enable_adverts',
            'q2am_categories_advert_destination_link' => 'q2am_categories_enable_adverts',
            'q2am_users_advert_destination_link'      => 'q2am_users_enable_adverts',
            'q2am_admin_advert_destination_link'      => 'q2am_admin_enable_adverts',

        ] );
        */

        $fields = [ ];

        $fields[] = [
            'label' => 'Enable Adverts',
            'tags'  => 'NAME="q2am_enable_adverts"',
            'value' => qa_opt( 'q2am_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'label' => 'Image Advert (This option will be ignored if Google Adsense or HTML option is active)',
            'type'  => 'checkbox',
            'value' => qa_opt( 'q2am_image_advert' ),
            'tags'  => 'NAME="q2am_image_advert" ID="q2am_image_advert"',
        ];

        $fields[] = [
            'id'    => 'q2am_advert_image_url',
            'label' => 'Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_advert_image_url' ),
            'tags'  => 'NAME="q2am_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_advert_destination_link',
            'label' => 'Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_advert_destination_link' ),
            'tags'  => 'NAME="q2am_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Google Adsense or HTML',
            'type'  => 'checkbox',
            'value' => qa_opt( 'q2am_google_adsense' ),
            'tags'  => 'NAME="q2am_google_adsense" ID="q2am_google_adsense"',
        ];

        $fields[] = [
            'id'    => 'q2am_google_adsense_codebox_display',
            'label' => 'Google Adsense or HTML Code',
            'type'  => 'textarea',
            'value' => qa_opt( 'q2am_google_adsense_codebox' ),
            'tags'  => 'NAME="q2am_google_adsense_codebox_field"',
            'rows'  => 3,
        ];

        $fields[] = [
            'label' => 'Display After Every',
            'tags'  => 'NAME="q2am_after_every"',
            'value' => qa_opt( 'q2am_after_every' ),
            'type'  => 'number',
        ];

        $fields[] = [
            'type' => 'blank',
        ];

        // page specific options

        foreach ( $this->page_template as $page ) {

            $fields[] = [
                'label' => 'Enable ' . ucfirst( $page ) . ' Adverts',
                'tags'  => 'NAME="q2am_' . $page . '_enable_adverts" ID="q2am_' . $page . '_enable_adverts"',
                'value' => qa_opt( 'q2am_' . $page . '_enable_adverts' ),
                'type'  => 'checkbox',
            ];

            $fields[] = [
                'id'    => 'q2am_' . $page . '_advert_image_url',
                'label' => ucfirst( $page ) . ' Image Full URL (leading with http:// )',
                'type'  => 'text',
                'value' => qa_opt( 'q2am_' . $page . '_advert_image_url' ),
                'tags'  => 'NAME="q2am_' . $page . '_advert_image_url"',
            ];

            $fields[] = [
                'id'    => 'q2am_' . $page . '_advert_destination_link',
                'label' => ucfirst( $page ) . ' Advert Link',
                'type'  => 'text',
                'value' => qa_opt( 'q2am_' . $page . '_advert_destination_link' ),
                'tags'  => 'NAME="q2am_' . $page . '_advert_destination_link"',
            ];

        }

        /*
        $fields[] = [
            'label' => 'Enable Home Adverts',
            'tags'  => 'NAME="q2am_home_enable_adverts" ID="q2am_home_enable_adverts"',
            'value' => qa_opt( 'q2am_home_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_home_advert_image_url',
            'label' => 'Home Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_home_advert_image_url' ),
            'tags'  => 'NAME="q2am_home_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_home_advert_destination_link',
            'label' => 'Home Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_home_advert_destination_link' ),
            'tags'  => 'NAME="q2am_home_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Activity Adverts',
            'tags'  => 'NAME="q2am_activity_enable_adverts" ID="q2am_activity_enable_adverts"',
            'value' => qa_opt( 'q2am_activity_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_activity_advert_image_url',
            'label' => 'Activity Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_activity_advert_image_url' ),
            'tags'  => 'NAME="q2am_activity_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_activity_advert_destination_link',
            'label' => 'Activity Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_activity_advert_destination_link' ),
            'tags'  => 'NAME="q2am_activity_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Questions Adverts',
            'tags'  => 'NAME="q2am_questions_enable_adverts" ID="q2am_questions_enable_adverts"',
            'value' => qa_opt( 'q2am_questions_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_questions_advert_image_url',
            'label' => 'Questions Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_questions_advert_image_url' ),
            'tags'  => 'NAME="q2am_questions_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_questions_advert_destination_link',
            'label' => 'Questions Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_questions_advert_destination_link' ),
            'tags'  => 'NAME="q2am_questions_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Unanswered Adverts',
            'tags'  => 'NAME="q2am_unanswered_enable_adverts" ID="q2am_unanswered_enable_adverts"',
            'value' => qa_opt( 'q2am_unanswered_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_unanswered_advert_image_url',
            'label' => 'Unanswered Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_unanswered_advert_image_url' ),
            'tags'  => 'NAME="q2am_unanswered_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_unanswered_advert_destination_link',
            'label' => 'Unanswered Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_unanswered_advert_destination_link' ),
            'tags'  => 'NAME="q2am_unanswered_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Tags Adverts',
            'tags'  => 'NAME="q2am_tags_enable_adverts" ID="q2am_tags_enable_adverts"',
            'value' => qa_opt( 'q2am_tags_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_tags_advert_image_url',
            'label' => 'Tags Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_tags_advert_image_url' ),
            'tags'  => 'NAME="q2am_tags_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_tags_advert_destination_link',
            'label' => 'Tags Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_tags_advert_destination_link' ),
            'tags'  => 'NAME="q2am_tags_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Categories Adverts',
            'tags'  => 'NAME="q2am_categories_enable_adverts" ID="q2am_categories_enable_adverts"',
            'value' => qa_opt( 'q2am_categories_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_categories_advert_image_url',
            'label' => 'Categories Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_categories_advert_image_url' ),
            'tags'  => 'NAME="q2am_categories_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_categories_advert_destination_link',
            'label' => 'Categories Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_categories_advert_destination_link' ),
            'tags'  => 'NAME="q2am_categories_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Users Adverts',
            'tags'  => 'NAME="q2am_users_enable_adverts" ID="q2am_users_enable_adverts"',
            'value' => qa_opt( 'q2am_users_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_users_advert_image_url',
            'label' => 'Users Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_users_advert_image_url' ),
            'tags'  => 'NAME="q2am_users_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_users_advert_destination_link',
            'label' => 'Users Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_users_advert_destination_link' ),
            'tags'  => 'NAME="q2am_users_advert_destination_link"',
        ];

        $fields[] = [
            'label' => 'Enable Admin Adverts',
            'tags'  => 'NAME="q2am_admin_enable_adverts" ID="q2am_admin_enable_adverts"',
            'value' => qa_opt( 'q2am_admin_enable_adverts' ),
            'type'  => 'checkbox',
        ];

        $fields[] = [
            'id'    => 'q2am_admin_advert_image_url',
            'label' => 'Admin Image Full URL (leading with http:// )',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_admin_advert_image_url' ),
            'tags'  => 'NAME="q2am_admin_advert_image_url"',
        ];

        $fields[] = [
            'id'    => 'q2am_admin_advert_destination_link',
            'label' => 'Admin Advert Link',
            'type'  => 'text',
            'value' => qa_opt( 'q2am_admin_advert_destination_link' ),
            'tags'  => 'NAME="q2am_admin_advert_destination_link"',
        ];
        */

        $fields[] = [
            'type' => 'blank',
        ];

        return [
            'ok' => ( $ok && !isset( $error ) ) ? $ok : NULL,

            'fields' => $fields,

            'buttons' => [
                [
                    'label' => qa_lang_html( 'main/save_button' ),
                    'tags'  => 'NAME="np_q_save_button"',
                ],
                [
                    'label' => qa_lang_html( 'admin/reset_options_button' ),
                    'tags'  => 'NAME="np_q_reset_button"',
                ],
            ],
        ];
    }

}