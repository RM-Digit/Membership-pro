<?php
/*
 * All Custom Shortcode for saaspot theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'saaspot_vt_shortcodes' ) ) {
  function saaspot_vt_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => __('Topbar Shortcodes', 'saaspot'),
      'shortcodes' => array(

        // Free Trial
        array(
          'name'          => 'saaspot_free_trial',
          'title'         => __('Free Trial', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'btn_text_size',
              'type'      => 'text',
              'title'     => __('Button Text Size', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'btn_text_color',
              'type'      => 'color_picker',
              'title'     => __('Button Text Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'btn_hov_color',
              'type'      => 'color_picker',
              'title'     => __('Button Hover Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'btn_bg_color',
              'type'      => 'color_picker',
              'title'     => __('Button Background Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'btn_bg_hov_color',
              'type'      => 'color_picker',
              'title'     => __('Button Hover Background Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'get_text',
              'type'      => 'textarea',
              'title'     => __('Text Block', 'saaspot'),
              'wrap_class' => 'column_full',
            ),
            array(
              'id'        => 'btn_text',
              'type'      => 'text',
              'title'     => __('Button Text', 'saaspot')
            ),
            array(
              'id'        => 'btn_link',
              'type'      => 'text',
              'title'     => __('Button Link', 'saaspot')
            ),

          ),

        ),
        // Free Trial
        
        // Topbar Menu
        array(
          'name'          => 'saaspot_top_menus',
          'title'         => __('Topbar Menu', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_top_menu',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(
            array(
              'id'        => 'top_menu_style',
              'type'      => 'select',
              'options'      => array(
                'one'   => esc_html__('One', 'saaspot-core'),
                'two' => esc_html__('Two', 'saaspot-core'),
              ),
              'title'     => esc_html__('Menu Style', 'saaspot-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'active_text',
              'type'      => 'text',
              'title'     => __('Active Link Text', 'saaspot'),
              'dependency'  => array('top_menu_style', '==', 'two'),
            ),
            array(
              'id'        => 'active_link',
              'type'      => 'text',
              'title'     => __('Active Title Link', 'saaspot'),
              'dependency'  => array('top_menu_style', '==', 'two'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'saaspot'),
            ),
            array(
              'id'        => 'text_hov_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'saaspot'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'saaspot')
            ),
            array(
              'id'        => 'menu_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'saaspot')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),

          ),

        ),
        // Topbar Menu

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'saaspot'),
      'shortcodes' => array(

        // WPML 
        array(
          'name'          => 'saaspot_wpml',
          'title'         => esc_html__('SaaSpot WPML', 'saaspot-core'),
          'fields'        => array(

            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'saaspot-core'),
            ),
            array(
              'id'        => 'wpml_lang_style',
              'type'      => 'select',
              'options'           => array(
                'one'     => esc_html__('Style One (Header)', 'saaspot-core'),
                'two'     => esc_html__('Style Two (Footer)', 'saaspot-core'),
              ),
              'title'     => esc_html__('Language Style', 'saaspot-core'),
            ),
            array(
              'id'        => 'wpml_lang_type',
              'type'      => 'select',
              'options'           => array(
                'native_name'     => esc_html__('Native Name', 'saaspot-core'),
                'translated_name' => esc_html__('Translated Name', 'saaspot-core'),
                'language_code'   => esc_html__('Language Code', 'saaspot-core'),
              ),
              'title'     => esc_html__('Language Type', 'saaspot-core'),
            ),
            
          ),
        ),
        // WPML

        // Header Contact
        array(
          'name'          => 'saaspot_header_contacts',
          'title'         => __('Header Contact', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_header_contact',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(
            
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'active_title',
              'type'      => 'text',
              'title'     => __('Active Title', 'saaspot'),
            ),
            array(
              'id'        => 'active_text',
              'type'      => 'text',
              'title'     => __('Active Link Text', 'saaspot'),
            ),
            array(
              'id'        => 'active_link',
              'type'      => 'text',
              'title'     => __('Active Text Link', 'saaspot'),
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title', 'saaspot'),
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'saaspot'),
            ),
            array(
              'id'        => 'text_hov_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'saaspot'),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_link_title',
              'type'      => 'text',
              'title'     => __('Title', 'saaspot')
            ),
            array(
              'id'        => 'menu_link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'saaspot')
            ),
            array(
              'id'        => 'menu_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'saaspot')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),

          ),

        ),
        // Header Contact

        // Header Buttons
        array(
          'name'          => 'saaspot_header_btns',
          'title'         => __('Header Buttons', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_header_btn',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'btn_style',
              'type'      => 'select',
              'title'     => __('Button Size', 'saaspot'),
              'options'        => array(
                'saspot-small-btn'  => __('Small', 'saaspot'),
                'saspot-medium-btn' => __('Medium', 'saaspot'),
                'saspot-normal-btn' => __('Large', 'saaspot'),
              ),
            ),
            array(
              'id'        => 'trans_btn',
              'type'      => 'switcher',
              'title'     => __('Transparent Button?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),
            array(
              'id'        => 'btn_link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'saaspot')
            ),
            array(
              'id'        => 'btn_text_link',
              'type'      => 'text',
              'title'     => __('Text Link', 'saaspot'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),

          ),

        ),
        // Header Buttons

      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'saaspot'),
      'shortcodes' => array(

        // Advertisement Banner
        array(
          'name'          => 'saaspot_ads_banner',
          'title'         => __('Advertisement Banner', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'get_banner_image',
              'type'      => 'upload',
              'title'     => __('Image', 'saaspot')
            ),
            array(
              'id'        => 'ad_link',
              'type'      => 'text',
              'title'     => __('Advertisement Link', 'saaspot'),
            ),
            array(
              'id'        => 'ad_text',
              'type'      => 'text',
              'title'     => __('Advertisement Text', 'saaspot'),
            ),

          ),

        ),
        // Advertisement Banner

        // Icons
        array(
          'name'          => 'saaspot_ratings',
          'title'         => __('Icons', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'rating_style',
              'type'      => 'select',
              'options'           => array(
                'star'     => esc_html__('Style One (Star)', 'saaspot-core'),
                'tick'     => esc_html__('Style Two (Tick)', 'saaspot-core'),
              ),
              'title'     => esc_html__('Rating Style', 'saaspot-core'),
            ),
            array(
              'id'        => 'rating',
              'type'      => 'text',
              'title'     => __('Rating', 'saaspot'),
              'attributes' => array(
                'placeholder'     => '5',
              ),
            ),

          ),
        ),
        // Icons

        // Social Icons
        array(
          'name'          => 'saaspot_socials',
          'title'         => __('Social Icons', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_social',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'saaspot'),
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'saaspot'),
              'wrap_class' => 'column_half',
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'saaspot'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'saaspot')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'saaspot')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),

          ),

        ),
        // Social Icons

        // Simple Image
        array(
          'name'          => 'saaspot_simple_image',
          'title'         => __('Simple Image', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'saaspot')
            ),
            array(
              'id'    => 'retina_img',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Retina Image?', 'saaspot')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'saaspot')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'saaspot')
            ),

          ),

        ),
        // Simple Image

        // Pricing Table
        array(
          'name'          => 'saaspot_pricing_tables',
          'title'         => __('Pricing Table', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_pricing_table',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'pricing_col',
              'type'      => 'select',
              'options'      => array(
                'four'   => esc_html__('Four', 'saaspot-core'),
                'three' => esc_html__('Three', 'saaspot-core'),
                'two' => esc_html__('Two', 'saaspot-core'),
              ),
              'title'     => esc_html__('Column Option', 'saaspot-core'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Title', 'saaspot'),
            ),
            array(
              'id'        => 'price',
              'type'      => 'text',
              'title'     => __('Price', 'saaspot'),
            ),
            array(
              'id'        => 'validity',
              'type'      => 'text',
              'title'     => __('Validity', 'saaspot'),
            ),
            array(
              'id'        => 'btn_text',
              'type'      => 'text',
              'title'     => __('Button Text', 'saaspot'),
            ),
            array(
              'id'        => 'btn_link',
              'type'      => 'text',
              'title'     => __('Button Link', 'saaspot'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'disable',
              'type'      => 'switcher',
              'title'     => __('Disable?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),
            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Text', 'saaspot')
            ),
            array(
              'id'        => 'list_link',
              'type'      => 'text',
              'title'     => __('Link', 'saaspot'),
            ),

          ),

        ),
        // Pricing Table

        // Simple Textarea
        array(
          'name'          => 'saaspot_simple_textarea',
          'title'         => __('Simple Textarea', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),
            array(
              'id'        => 'get_text',
              'type'      => 'textarea',
              'title'     => __('Text Block', 'saaspot')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'saaspot'),
            ),

          ),

        ),
        // Simple Textarea

        // Custom WPML
        array(
          'name'          => 'saaspot_custom_wpmls',
          'title'         => __('Custom WPML', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_custom_wpml',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_wpml_style',
              'type'      => 'select',
              'options'      => array(
                'one'   => esc_html__('One (Header)', 'saaspot-core'),
                'two' => esc_html__('Two (Footer)', 'saaspot-core'),
                'three' => esc_html__('Three (Full Page)', 'saaspot-core'),
              ),
              'title'     => esc_html__('WPML Style', 'saaspot-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'wpml_style',
              'type'      => 'select',
              'options'      => array(
                'one'   => esc_html__('One (Header & Footer)', 'saaspot-core'),
                'two' => esc_html__('Two (Full Page)', 'saaspot-core'),
              ),
              'title'     => esc_html__('WPML Style', 'saaspot-core'),
            ),
            array(
              'id'        => 'wpml_selected',
              'type'      => 'switcher',
              'title'     => __('Active Language?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
              'dependency'  => array('wpml_style', '==', 'one'),
            ),
            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => __('Text', 'saaspot')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => __('Link', 'saaspot'),
            ),

          ),

        ),
        // Custom WPML

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'saaspot'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'saaspot_footer_menus',
          'title'         => __('Footer Menu Links', 'saaspot'),
          'view'          => 'clone',
          'clone_id'      => 'saaspot_footer_menu',
          'clone_title'   => __('Add New', 'saaspot'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'saaspot'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Icon Image (If Needed)', 'saaspot')
            ),
            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => __('Menu Text', 'saaspot')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => __('Menu Link', 'saaspot')
            ),
            array(
              'id'        => 'label_title',
              'type'      => 'text',
              'title'     => __('Label Text', 'saaspot')
            ),
            array(
              'id'        => 'live_link',
              'type'      => 'switcher',
              'title'     => __('Live Link?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'saaspot'),
              'on_text'     => __('Yes', 'saaspot'),
              'off_text'     => __('No', 'saaspot'),
            ),

          ),

        ),
        // Footer Menus

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'saaspot_vt_shortcodes' );
}
