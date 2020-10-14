<?php
/* Topbar Shortcodes */

/* Free Trial */
function saaspot_free_trial_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "text_size" => '',
    "text_color" => '',
    "btn_text_size" => '',
    "btn_text_color" => '',
    "btn_bg_color" => '',
    "btn_hov_color" => '',
    "btn_bg_hov_color" => '',
    "get_text" => '',
    "btn_text" => '',
    "btn_link" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size || $text_color ) {
    $inline_style .= '.saspot-trial-'. $e_uniqid .'.free-trial span {';
    $inline_style .= ( $text_size ) ? 'font-size:'. saaspot_core_check_px($text_size) .';' : '';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ( $btn_text_size || $btn_text_color || $btn_bg_color ) {
    $inline_style .= '.saspot-trial-'. $e_uniqid .'.free-trial .saspot-label {';
    $inline_style .= ( $btn_text_size ) ? 'font-size:'. saaspot_core_check_px($btn_text_size) .';' : '';
    $inline_style .= ( $btn_text_color ) ? 'color:'. $btn_text_color .';' : '';
    $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
    $inline_style .= '}';
  }
  // Btn Colors & Size
  if ( $btn_hov_color || $btn_bg_hov_color ) {
    $inline_style .= '.saspot-trial-'. $e_uniqid .'.free-trial .saspot-label:hover {';
    $inline_style .= ( $btn_hov_color ) ? 'color:'. $btn_hov_color .';' : '';
    $inline_style .= ( $btn_bg_hov_color ) ? 'background-color:'. $btn_bg_hov_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' saspot-trial-'. $e_uniqid;

  $result = '<div class="free-trial">
              <span class="trial-label">'. $get_text .'</span>
              <a href="'. $btn_link .'" class="saspot-label">'. $btn_text .'</a>
            </div>';
  return $result;
}
add_shortcode("saaspot_free_trial", "saaspot_free_trial_function");

/* Topbar Menus */
function saaspot_top_menus_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    'top_menu_style' =>'',
    'active_text' =>'',
    'active_link' =>'',
    "text_color" => '',
    "text_hov_color" => '',
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size || $text_color ) {
    $inline_style .= '.saspot-topbar ul.saspot-top-menu-'. $e_uniqid .' li a {';
    $inline_style .= ( $text_size ) ? 'font-size:'. saaspot_core_check_px($text_size) .';' : '';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hov_color ) {
    $inline_style .= '.saspot-topbar ul.saspot-top-menu-'. $e_uniqid .' li a:hover{';
    $inline_style .= ( $text_hov_color ) ? 'color:'. $text_hov_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = 'saspot-top-menu-'. $e_uniqid;

  $active = $active_link ? '<a href="'.$active_link.'">'.$active_text.'</a>' : $active_text;

  if ($top_menu_style === 'two') {
    $active_o = '<li class="top-dropdown">'.$active;
    $active_c = '</li>';
    $menu_o = '<ul class="sub-dropdown">';
    $menu_c = '</ul>';
  } else {
    $active_o = '';
    $active_c = '';
    $menu_o = '';
    $menu_c = '';
  }

  $result = '<ul class="'.$styled_class.' '.$custom_class.'">'.$active_o.$menu_o. do_shortcode($content) .$menu_c.$active_c.'</ul>';
  return $result;
}
add_shortcode("saaspot_top_menus", "saaspot_top_menus_function");

/* Topbar Menu */
function saaspot_top_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "menu_link_text" => '',
      "menu_text_link" => '',
      "target_tab" => ''
   ), $atts));

   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $menu_link = $menu_text_link ? ' <a href="'.$menu_text_link.'" '. $target_tab .'> '.$menu_link_text.' </a> ' : $menu_link_text;
   $result = '<li>'.$menu_link.'</li>';
   return $result;
}
add_shortcode("saaspot_top_menu", "saaspot_top_menu_function");

// Header

/* WPML */
function saaspot_wpml_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "wpml_lang_style" => '',
    "wpml_lang_type" => '',
  ), $atts));

  $output   = '';

  if ( saaspot_is_wpml_activated() ) {
    global $sitepress;
    $sitepress_settings = $sitepress->get_settings();
    $icl_get_languages  = icl_get_languages();

    if ( ! empty( $icl_get_languages ) ) {
      // Vertical View
      $languages = icl_get_languages('skip_missing=0&orderby=code');
        if(!empty($languages)){
          if ($wpml_lang_style === 'two') {
            echo '<div class="copyright-language nice-select-two"><i class="fa fa-globe" aria-hidden="true"></i>';
          }
            echo '<select>';
              foreach($languages as $l){

                if($wpml_lang_type === 'translated_name') {
                  $lang_type = $l['translated_name'];
                } elseif($wpml_lang_type === 'language_code') {
                  $lang_type = $l['language_code'];
                }
                else {
                  $lang_type = $l['native_name'];
                }

                echo '<option>';
                if(!$l['active']) echo '<a href="'.$l['url'].'">';
                  echo icl_disp_language($lang_type);
                if(!$l['active']) echo '</a>';
                  echo '</option>';
              }
            echo '</select>';
            if ($wpml_lang_style === 'two') {
              echo '</div>';
            }
        }
    }

  } else {
    $output .= '<p class="wpml-not-active">Please Activate WPML Plugin</p>';
  }
  return $output;

}
add_shortcode("saaspot_wpml", "saaspot_wpml_function");

/* Header Contacts */
function saaspot_header_contacts_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    'active_title' =>'',
    'active_text' =>'',
    'active_link' =>'',

    "title_color" => '',
    "text_color" => '',
    "text_hov_color" => '',
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $title_color ) {
    $inline_style .= '.saspot-top-menu-'. $e_uniqid .' .contact-label {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_color ) {
    $inline_style .= '.saspot-top-menu-'. $e_uniqid .'.header-contact-link a {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= '}';
  }
  if ( $text_size ) {
    $inline_style .= '.saspot-top-menu-'. $e_uniqid .'.header-contact-link a {';
    $inline_style .= ( $text_size ) ? 'font-size:'. saaspot_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hov_color ) {
    $inline_style .= '.saspot-top-menu-'. $e_uniqid .'.header-contact-link a:hover{';
    $inline_style .= ( $text_hov_color ) ? 'color:'. $text_hov_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = 'saspot-top-menu-'. $e_uniqid;

  $title = $active_title ? '<span class="contact-label">'.$active_title.'</span>' : '';
  $active = $active_link ? '<a href="'.$active_link.'">'.$active_text.'</a>' : '';

  $result = '<div class="header-contact-link">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <div class="disable-link">'.$title.$active.'</div>
              <div class="contact-link-wrap">
                <ul>'. do_shortcode($content) .'</ul>
              </div>
            </div>';
  return $result;
}
add_shortcode("saaspot_header_contacts", "saaspot_header_contacts_function");

/* Header Contact */
function saaspot_header_contact_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "menu_link_title" => '',
      "menu_link_text" => '',
      "menu_text_link" => '',
      "target_tab" => ''
   ), $atts));

   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $label = $menu_link_title ? '<span class="contact-label">'.$menu_link_title.'</span>' : '';
   $menu_link = $menu_text_link ? ' <a href="'.$menu_text_link.'" '. $target_tab .'> '.$menu_link_text.' </a> ' : '';
   $result = '<li>'.$label.$menu_link.'</li>';
   return $result;
}
add_shortcode("saaspot_header_contact", "saaspot_header_contact_function");

/* Header Buttons */
function saaspot_header_btns_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="header-btn '. $custom_class .'">'. do_shortcode($content) .'</div>';
   return $result;
}
add_shortcode("saaspot_header_btns", "saaspot_header_btns_function");

/* Header Button */
function saaspot_header_btn_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "btn_style" => '',
      "trans_btn" => '',
      "btn_link_text" => '',
      "btn_text_link" => '',
      "target_tab" => ''
   ), $atts));

   if ($btn_style === '') {
     # code...
   }

  $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
  $trans_cls = ( $trans_btn === '1' ) ? 'saspot-border-btn ' : '';
   
  $result = '<a href="'. $btn_text_link .'" '.$target_tab.' class="saspot-btn '.$trans_cls.$btn_style.'">'. $btn_link_text .'</a>';

   return $result;
}
add_shortcode("saaspot_header_btn", "saaspot_header_btn_function");

/* Content Shortcodes */

/* Advertisement Banner */
function saaspot_ads_banner_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "get_banner_image" => '',
      "ad_link" => '',
      "ad_text" => '',
   ), $atts));

   $text = $ad_link ? '<a href="'.$ad_link.'"><span>'.$ad_text.'</span></a>' : '<span>'.$ad_text.'</span>';

   $result = '<div class="advertisiment-info">
                <div class="saspot-image">
                  <img src="'.$get_banner_image.'" alt="Advertisement"/>
                  <h4 class="ad-title">'.$text.'</h4>
                </div>
              </div>';

   return $result;

}
add_shortcode("saaspot_ads_banner", "saaspot_ads_banner_function");

/* Ratings */
function saaspot_ratings_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "rating_style" => '',
    "rating" => '',
  ), $atts));
  if ($rating_style === 'tick') {
    $acls = 'fa fa-check';
    $dcls = 'fa fa-check disable';
  } else {
    $acls = 'fa fa-star';
    $dcls = 'fa fa-star-o';
  }
  $result ='';
  for( $i=1; $i<= $rating; $i++) {
    $result .='<i class="'.$acls.'" aria-hidden="true"></i>';
    if ($i === 5) { break; }
  } 
  for( $i=5; $i > $rating; $i--) {
    $result .='<i class="'.$dcls.'" aria-hidden="true"></i>';
  }
  return $result;
}
add_shortcode("saaspot_ratings", "saaspot_ratings_function");

/* Social Icons */
function saaspot_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size || $bg_color ) {
    $inline_style .= '.saspot-socials-'. $e_uniqid .'.saspot-social.rounded a {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. saaspot_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color || $bg_hover_color ) {
    $inline_style .= '.saspot-socials-'. $e_uniqid .'.saspot-social.rounded a:hover {';
    $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
    $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
    $inline_style .= '}';
  }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' saspot-socials-'. $e_uniqid;

  $result = '<div class="saspot-social rounded '. $custom_class . $styled_class .'">'. do_shortcode($content) .'</div>';
  return $result;
}
add_shortcode("saaspot_socials", "saaspot_socials_function");

/* Social Icon */
function saaspot_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => '',
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
   $result = '<a '. $social_link . $target_tab .' class="'. str_replace('fa fa-', '', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';
   return $result;

}
add_shortcode("saaspot_social", "saaspot_social_function");

/* Simple Image */
function saaspot_simple_image_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_image" => '',
    "retina_img" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  $alt_text = get_post_meta($get_image, '_wp_attachment_image_alt', true);
  if($get_image) {
    list($width, $height, $type, $attr) = getimagesize($get_image);
  } else {
    $width = '';
    $height = '';
  }
  if($retina_img) {
    $logo_width = $width/2;
    $logo_height = $height/2;
  } else {
    $logo_width = '';
    $logo_height = '';
  }
  
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt="'.esc_attr($alt_text).'" style="width: '.saaspot_core_check_px($logo_width).'; height: '.saaspot_core_check_px($logo_height).'"/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }
  $result = '<div class="saspot-image '.$custom_class.'">'. $link_o . $my_image . $link_c .'</div>';
  return $result;
}
add_shortcode("saaspot_simple_image", "saaspot_simple_image_function");

/* Pricing Tables */
function saaspot_pricing_tables_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "pricing_col" => '',
    "title" => '',
    "price" => '',
    "validity" => '',
    "btn_text" => '',
    "btn_link" => '',
    "custom_class" => '',
  ), $atts));

  $title = $title ? '<h5 class="price-top-title">'.$title.'</h5>' : '';
  $price = $price ? '<h2 class="price-top-subtitle">'.$price.'</h2>' : '';
  $validity = $validity ? '<p>'.$validity.'</p>' : '';

  if ($pricing_col === 'two') {
    $col_class = 'col-md-6';
  } elseif ($pricing_col === 'three') {
    $col_class = 'col-md-4 col-sm-6';
  } else {
    $col_class = 'col-md-3 col-sm-6';
  }

  $button = $btn_link ? '<a href="'.$btn_link.'" class="saspot-btn">'.$btn_text.' <i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';
  
  $result = '<div class="'. $col_class .'"><div class="price-item pricing-style-two '. $custom_class .'">
              <div class="price-top-wrap">'.$title.$price.$validity.'</div>
              <div class="price-info"><ul>'. do_shortcode($content) .'</ul></div>
              '.$button.'
            </div></div>';

  return $result;

}
add_shortcode("saaspot_pricing_tables", "saaspot_pricing_tables_function");

/* Pricing Table */
function saaspot_pricing_table_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "disable" => '',
    "list_title" => '',
    "list_link" => '',
  ), $atts));

  $disable = $disable ? ' class="disable"' : '';
  $link = $list_link ? '<a href="'.$list_link.'">'.$list_title.'</a>' : $list_title;

  $result = $list_title ? '<li'.$disable.'>'.$link.'</li>' : '';

  return $result;

}
add_shortcode("saaspot_pricing_table", "saaspot_pricing_table_function");

/* Textarea */
function saaspot_simple_textarea_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "get_text" => '',
    "text_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_size) {
    $inline_style .= '.saspot-textarea-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. saaspot_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' saspot-type-text-'. $e_uniqid;

  $result = '<p class="'.$custom_class . $styled_class.'">'. $get_text .'</p>';
  return $result;
}
add_shortcode("saaspot_simple_textarea", "saaspot_simple_textarea_function");

/* Custom WPML */
function saaspot_custom_wpmls_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_wpml_style" => '',
    "custom_class" => '',
  ), $atts));

  if ($custom_wpml_style === 'two') {
    $result = '<div class="copyright-language nice-select-two '. $custom_class .'"><i class="fa fa-globe" aria-hidden="true"></i><select onchange="location = this.value;">'. do_shortcode($content) .'</select></div>';
  } elseif ($custom_wpml_style === 'three') {
    $result = '<ul class="'. $custom_class .'">'. do_shortcode($content) .'</ul>';
  }else {
    $result = '<select onchange="location = this.value;" class="'. $custom_class .'">'. do_shortcode($content) .'</select>';
  }
  return $result;

}
add_shortcode("saaspot_custom_wpmls", "saaspot_custom_wpmls_function");

/* Custom WPML */
function saaspot_custom_wpml_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "wpml_style" => '',
      "wpml_selected" => '',
      "menu_title" => '',
      "menu_link" => '',
   ), $atts));

  $wpml_selected = ( $wpml_selected === '1' ) ? ' selected="selected"' : '';
  $link = $menu_link ? '<a href="'.$menu_link.'">'. $menu_title .'</a>' : $menu_title;
  $value = $menu_link ? $menu_link : '#0';

  if ($wpml_style === 'two') {
    $wpml_link_title = $menu_title ? '<li>'.$link.'</li>' : '';
  } else {
    $wpml_link_title = $menu_title ? '<option'.$wpml_selected.' value="'.$value.'">'.$menu_title.'</option>' : '';
  }

   $result = $wpml_link_title;
   return $result;

}
add_shortcode("saaspot_custom_wpml", "saaspot_custom_wpml_function");

/* Footer Menus */
function saaspot_footer_menus_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));

   $result = '<ul class="'. $custom_class .'">'. do_shortcode($content) .'</ul>';
   return $result;

}
add_shortcode("saaspot_footer_menus", "saaspot_footer_menus_function");

/* Footer Menu */
function saaspot_footer_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "get_image" => '',
      "menu_title" => '',
      "menu_link" => '',
      "label_title" => '',
      "live_link" => '',
      "target_tab" => ''
   ), $atts));

   $menu_link = ( isset( $menu_link ) ) ? 'href="'. $menu_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';
   $label_title = $label_title ? ' <span class="saspot-label">'. $label_title . '</span>' : '';
   $live_link = ( $live_link === '1' ) ? ' class="live-link"' : '';
   $link = $menu_link ? '<a '. $menu_link . $target_tab . $live_link .'>'. $menu_title .'</a>' : $menu_title;

   $image = $get_image ? '<img src="'.$get_image.'" width="20" alt="Icon">' : '';

   $menu_link_title = $menu_title ? '<li>'.$image.$link.$label_title.'</li>' : '';

   $result = $menu_link_title;
   return $result;

}
add_shortcode("saaspot_footer_menu", "saaspot_footer_menu_function");

/* Current Year - Shortcode */
if( ! function_exists( 'saaspot_current_year' ) ) {
  function saaspot_current_year() {
    return date('Y');
  }
  add_shortcode( 'saaspot_current_year', 'saaspot_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'saaspot_home_url' ) ) {
  function saaspot_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'saaspot_home_url', 'saaspot_home_url' );
}
