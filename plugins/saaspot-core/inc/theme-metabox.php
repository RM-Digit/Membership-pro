<?php
/*
 * All Metabox related options for SaaSpot theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function saaspot_vt_metabox_options( $options ) {

  $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
  $contact_forms = array();
  if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[ $cform->ID ] = $cform->post_title;
    }
  } else {
    $contact_forms[ __( 'No contact forms found', 'saaspot' ) ] = 0;
  }

  $templates = get_posts( 'post_type="elementor_library"&numberposts=-1' );
  $elementor_templates = array();
  if ( $templates ) {
    foreach ( $templates as $template ) {
      $elementor_templates[ $template->ID ] = $template->post_title;
    }
  } else {
    $elementor_templates[ __( 'No templates found', 'saaspot' ) ] = 0;
  }

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'saaspot'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'saaspot'),
            'wrap_class' => 'vt-minimal-heading hide-title',
          ),
          // Standard, Image

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'saaspot'),
    'post_type' => array('post', 'page', 'apps', 'testimonial', 'job', 'team', 'webinars'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_layout_section',
        'title' => esc_html__('Layout', 'saaspot'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'title'          => esc_html__('Page Layout', 'saaspot'),
            'options'   => array(
              'default'       => SAASPOT_PLUGIN_IMGS . '/pages/page-0.png',
              'full-width'    => SAASPOT_PLUGIN_IMGS . '/pages/page-2.png',
              'left-sidebar'  => SAASPOT_PLUGIN_IMGS . '/pages/page-3.png',
              'right-sidebar' => SAASPOT_PLUGIN_IMGS . '/pages/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'default',
            'radio'      => true,
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'saaspot'),
            'options'        => saaspot_vt_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'saaspot'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),
          array(
            'id'    => 'full_page',
            'type'  => 'switcher',
            'title' => esc_html__('Need Full Page?', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
          ),
          array(
            'id'             => 'full_page_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'saaspot'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'saaspot'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'saaspot'),
          ),
          array(
            'type'    => 'notice',
            'title'   => 'Form',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Form', 'saaspot'),
            'dependency'   => array('full_page', '==', 'true'),
          ),
          array(
            'id'    => 'form_title',
            'type'  => 'text',
            'title' => esc_html__('Form Title', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your form title...', 'saaspot'),
            ),
            'dependency'   => array('full_page', '==', 'true' ),
          ),
          array(
            'id'    => 'form_content',
            'type'  => 'text',
            'title' => esc_html__('Form Content', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your form content...', 'saaspot'),
            ),
            'dependency'   => array('full_page', '==', 'true' ),
          ),
          array(
            'id'             => 'form_code',
            'type'           => 'select',
            'title'          => esc_html__('Choose Form', 'saaspot'),
            'desc'          => esc_html__('Choose form for this page.', 'saaspot'),
            'options'        => $contact_forms,
            'default_option' => esc_html__('Select your form', 'saaspot'),
            'dependency'   => array('full_page', '==', 'true' ),
          ),
          array(
            'id'    => 'footer_code',
            'type'  => 'textarea',
            'title' => esc_html__('Footer Shortcode', 'saaspot'),
            'desc' => esc_html__('Enter content or shortcodes that you want to show in this page.', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your content...', 'saaspot'),
            ),
            'shortcode' => true,
            'dependency'   => array('full_page', '==', 'true' ),
          ),
          array(
            'type'    => 'notice',
            'title'   => 'Image',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Image', 'saaspot'),
            'dependency'   => array('full_page', '==', 'true'),
          ),
          array(
            'id'    => 'form_image',
            'type'  => 'image',
            'title' => esc_html__('Background Image', 'saaspot'),
            'dependency'   => array('full_page', '==', 'true'),
          ),
          array(
            'id'    => 'form_video',
            'type'  => 'text',
            'title' => esc_html__('Video', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your link...', 'saaspot'),
            ),
            'dependency'   => array('full_page', '==', 'true' ),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'saaspot'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'saaspot'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'saaspot'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'saaspot'),
          ),

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'saaspot'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'saaspot'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'elementor-templates' => 'Elementor Templates',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'             => 'ele_templates',
            'type'           => 'select',
            'title'          => esc_html__('Elementor Templates', 'saaspot'),
            'desc'          => esc_html__('Choose template for this page.', 'saaspot'),
            'options'        => $elementor_templates,
            'default_option' => esc_html__('Select your template', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'elementor-templates' ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'saaspot'),
            'desc' => esc_html__('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'saaspot'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider' ),
          ),
          array(
            'id'        => 'title_style',
            'type'      => 'select',
            'title'     => esc_html__('Title Style', 'saaspot'),
            'options'   => array(
              'one' => esc_html__('Style One (Normal)', 'saaspot'),
              'two' => esc_html__('Style Two (Normal)', 'saaspot'),
              'three' => esc_html__('Style Three (Column)', 'saaspot'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_icon',
            'type'  => 'image',
            'title' => esc_html__('Icon Image', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'saaspot'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_content',
            'type'  => 'textarea',
            'title' => esc_html__('Content', 'saaspot'),
            'desc' => esc_html__('Enter content or shortcodes that you want to show in this page title area.', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your content...', 'saaspot'),
            ),
            'shortcode' => true,
            'dependency'   => array('banner_type', '==', 'default-title' ),
          ),
          array(
            'id'    => 'need_share',
            'type'  => 'switcher',
            'title' => esc_html__('Need Share?', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'content_size',
            'type'  => 'text',
            'title' => esc_html__('Content Size', 'saaspot'),
            'attributes'  => array( 'placeholder' => '18px' ),
            'dependency'  => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'content_width',
            'type'  => 'text',
            'title' => esc_html__('Content Width', 'saaspot'),
            'attributes'  => array( 'placeholder' => '500px' ),
            'dependency'  => array('banner_type', '==', 'default-title'),
          ),
          array(
            'type'    => 'notice',
            'title'   => 'Conference & Button',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Conference & Button', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'need_conference',
            'type'  => 'switcher',
            'title' => esc_html__('Need Conference?', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'conferenceby_text',
            'type'  => 'text',
            'title' => esc_html__('Conference By Text', 'saaspot'),
            'dependency'   => array('banner_type|need_conference', '==|==', 'default-title|true'),
          ),
          array(
            'id'    => 'conference_image',
            'type'  => 'image',
            'title' => esc_html__('Conference Image', 'saaspot'),
            'dependency'   => array('banner_type|need_conference', '==|==', 'default-title|true'),
          ),
          array(
            'id'    => 'conference_text',
            'type'  => 'text',
            'title' => esc_html__('Conference Text', 'saaspot'),
            'dependency'   => array('banner_type|need_conference', '==|==', 'default-title|true'),
          ),
          array(
            'id'    => 'button_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'btn_image',
            'type'  => 'image',
            'title' => esc_html__('Button Image', 'saaspot'),
            'dependency'   => array('banner_type|title_style', '==|==', 'default-title|three'),
          ),
          array(
            'id'    => 'button_link',
            'type'  => 'text',
            'title' => esc_html__('Button Link', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title' ),
          ),
          array(
            'id'    => 'title_image',
            'type'  => 'image',
            'title' => esc_html__('Title Image', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title' ),
          ),
          array(
            'type'    => 'notice',
            'title'   => 'Spaces & Background',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Spaces & Background', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'saaspot'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'saaspot'),
              'padding-xs' => esc_html__('Extra Small Padding', 'saaspot'),
              'padding-sm' => esc_html__('Small Padding', 'saaspot'),
              'padding-md' => esc_html__('Medium Padding', 'saaspot'),
              'padding-lg' => esc_html__('Large Padding', 'saaspot'),
              'padding-xl' => esc_html__('Extra Large Padding', 'saaspot'),
              'padding-no' => esc_html__('No Padding', 'saaspot'),
              'padding-custom' => esc_html__('Custom Padding', 'saaspot'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'saaspot'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'saaspot'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_area_bg_size',
            'type'  => 'text',
            'title' => esc_html__('Background Size', 'saaspot'),
            'attributes'  => array( 'placeholder' => '400px' ),
            'dependency'  => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'overlay_image',
            'type'  => 'image',
            'title' => esc_html__('Overlay Image', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'hide_parallax',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Parallax', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'saaspot'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'saaspot'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'saaspot'),
              'padding-xs' => esc_html__('Extra Small Padding', 'saaspot'),
              'padding-sm' => esc_html__('Small Padding', 'saaspot'),
              'padding-md' => esc_html__('Medium Padding', 'saaspot'),
              'padding-lg' => esc_html__('Large Padding', 'saaspot'),
              'padding-xl' => esc_html__('Extra Large Padding', 'saaspot'),
              'padding-cnt-no' => esc_html__('No Padding', 'saaspot'),
              'padding-custom' => esc_html__('Custom Padding', 'saaspot'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'saaspot'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'saaspot'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'saaspot'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'saaspot'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
          ),
          array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright', 'saaspot'),
            'label' => esc_html__('Yes, Please do it.', 'saaspot'),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'saaspot'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_position',
            'type'    => 'text',
            'title'     => esc_html__('Job Position', 'saaspot'),
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'saaspot'),
            ),
            'info'    => esc_html__('Enter job position in your company.', 'saaspot'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Team
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Team Options', 'saaspot'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'team_option_section',
        'fields' => array(

          array(
            'id'      => 'team_job_position',
            'title'   => esc_html__('Job Position', 'saaspot'),
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Financial Manager', 'saaspot'),
            ),
            'info'    => esc_html__('Enter this employee job position, in your company.', 'saaspot'),
          ),

          // Contact fields
          array(
            'id'                  => 'contact_details',
            'type'                => 'group',
            'title'    => esc_html__('Contact Details', 'ceremony'),
            'button_title'       => 'Add New',
            'accordion_title'    => 'Adding New',
            'accordion'          => true,
            'fields'              => array(

              array(
                'id'              => 'contact_title',
                'type'            => 'text',
                'title'           => esc_html__('Enter your title', 'ceremony'),
              ),
              array(
                'id'              => 'contact_text',
                'type'            => 'text',
                'title'           => esc_html__('Enter your text', 'ceremony'),
              ),
              array(
                'id'              => 'contact_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your link', 'ceremony'),
              ),

            ),
          ),
          // Contact fields

          // Social fields
          array(
            'id'                  => 'social_icons',
            'type'                => 'group',
            'title'    => esc_html__('Social Icons', 'ceremony'),
            'button_title'       => 'Add New Icon',
            'accordion_title'    => 'Adding New Icon',
            'accordion'          => true,
            'fields'              => array(
              array(
                'id'              => 'icon',
                'type'            => 'icon',
                'title'           => esc_html__('Selected your icon', 'ceremony'),
              ),
              array(
                'id'              => 'icon_link',
                'type'            => 'text',
                'title'           => esc_html__('Enter your icon link', 'ceremony'),
              ),
            ),
          ),
          // Social fields

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Job
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'job_options',
    'title'     => esc_html__('Job Details', 'saaspot'),
    'post_type' => 'job',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'job_option_section',
        'fields' => array(

          array(
            'id'      => 'job_location',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Melbourne', 'saaspot'),
            ),
            'info'    => esc_html__('Enter job location.', 'saaspot'),
          ),
          array(
            'id'      => 'job_type',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Eg : Full-time', 'saaspot'),
            ),
            'info'    => esc_html__('Enter job type.', 'saaspot'),
          ),

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Webinars Metabox Options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'webinars_metabox',
    'title'     => esc_html__('Video Options', 'havnor'),
    'post_type' => 'webinars',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'webinars_formats',
        'fields' => array(

          // Video
          array(
            'id'      => 'webinars_video',
            'title'     => esc_html__('Video Link', 'saaspot'),
            'type'    => 'textarea',
            'info'    => esc_html__('Enter this webinar video link.', 'saaspot'),
          ),
          // Video

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'saaspot_vt_metabox_options' );
