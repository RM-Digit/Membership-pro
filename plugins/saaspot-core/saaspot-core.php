<?php
/*
Plugin Name: SaaSpot Core
Plugin URI: http://themeforest.net/user/VictorThemes
Description: Plugin to contain shortcodes and custom post types of the saaspot theme.
Author: VictorThemes
Author URI: http://themeforest.net/user/VictorThemes/portfolio
Version: 1.8.7
Text Domain: saaspot-core
*/

if( ! function_exists( 'saaspot_block_direct_access' ) ) {
	function saaspot_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'SAASPOT_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'SAASPOT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SAASPOT_PLUGIN_ASTS', SAASPOT_PLUGIN_URL . 'assets' );
define( 'SAASPOT_PLUGIN_IMGS', SAASPOT_PLUGIN_ASTS . '/images' );
define( 'SAASPOT_PLUGIN_INC', SAASPOT_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// SaaSpot Elementor Shortcode Path
define( 'SAASPOT_EM_SHORTCODE_BASE_PATH', SAASPOT_PLUGIN_PATH . 'elementor/' );
define( 'SAASPOT_EM_SHORTCODE_PATH', SAASPOT_EM_SHORTCODE_BASE_PATH . 'widgets/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
if( ! function_exists( 'saaspot_framework_active' ) ) {
  function saaspot_framework_active() {
    return ( defined( 'CS_VERSION' ) ) ? true : false;
  }
}

// cs_get_option
if ( ! function_exists( 'cs_get_option' ) ) {
  function cs_get_option( $option_name = '', $default = '' ) {

    if (saaspot_framework_active()) {
      $options = apply_filters( 'cs_get_option', get_option( CS_OPTION ), $option_name, $default );
    } else {
      $options = '';
    }

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

// cs_get_customize_option
if ( ! function_exists( 'cs_get_customize_option' ) ) {
  function cs_get_customize_option( $option_name = '', $default = '' ) {

    if (saaspot_framework_active()) {
      $options = apply_filters( 'cs_get_customize_option', get_option( CS_CUSTOMIZE ), $option_name, $default );
    } else {
      $options = '';
    }

    if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    } else {
      return ( ! empty( $default ) ) ? $default : null;
    }

  }
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'SaaSpot');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('saaspot-core/saaspot-core.php')) {

	// Custom Post Type
	require_once( SAASPOT_PLUGIN_INC . '/custom-post-type.php' );

    // Aq Resizer
  require_once( SAASPOT_PLUGIN_INC . '/aq_resizer.php' );

  if (defined( 'CS_VERSION' )) {
    require_once( SAASPOT_PLUGIN_INC . '/theme-metabox.php' );
  }

  // Shortcodes
  require_once( SAASPOT_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( SAASPOT_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Widgets
  require_once( SAASPOT_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( SAASPOT_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( SAASPOT_PLUGIN_INC . '/widgets/newsletter-widget.php' );
  require_once( SAASPOT_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( SAASPOT_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

  // Elementor
  if( defined('ELEMENTOR_PATH') && file_exists( SAASPOT_EM_SHORTCODE_BASE_PATH . '/em-setup.php' ) ){
    require_once( SAASPOT_EM_SHORTCODE_BASE_PATH . '/em-setup.php' );
  }

}

/**
 * SaaSpot Core Plugin is Activated
 */
if( ! function_exists( 'saaspot_core_plugin_status' ) ) {
  function saaspot_core_plugin_status() {
    return true;
  }
}

/**
 * Get Registered Sidebars
 */
if ( ! function_exists( 'saaspot_vt_registered_sidebars' ) ) {
  function saaspot_vt_registered_sidebars() {

    global $wp_registered_sidebars;
    $widgets = array();

    if( ! empty( $wp_registered_sidebars ) ) {
      foreach ( $wp_registered_sidebars as $key => $value ) {
        $widgets[$key] = $value['name'];
      }
    }

    return array_reverse( $widgets );

  }
}

/**
 * Plugin language
 */
function saaspot_plugin_language_setup() {
  load_plugin_textdomain( 'saaspot-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'saaspot_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'saaspot_set_wpautop' ) ) {
  function saaspot_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function saaspot_add_twitter_facebook( $contactmethods ) {
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['google_plus']  = 'Google Plus';
  $contactmethods['pinterest']  = 'Pinterest';
  return $contactmethods;
}
add_filter('user_contactmethods','saaspot_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/* Share Options */
  if ( ! function_exists( 'saaspot_wp_share_option' ) ) {
    function saaspot_wp_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_text = cs_get_option('share_text');
      $share_text = $share_text ? $share_text : esc_html__( 'Share This Article', 'saaspot' );
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'saaspot' );
      ?>
      <div class="saspot-blog-share">
        <h5 class="blog-meta-title"><?php echo $share_text; ?></h5>
        <div class="saspot-social">
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'saaspot'); ?>" target="_blank"><i class="fa fa-facebook facebook"></i><?php echo esc_attr('Facebook', 'saaspot');?></a>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'saaspot'); ?>" target="_blank"><i class="fa fa-twitter twitter"></i><?php echo esc_attr('Twitter', 'saaspot');?></a>
          <a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'saaspot'); ?>" target="_blank"><i class="fa fa-pinterest pinterest"></i><?php echo esc_attr('Pinterest', 'saaspot'); ?></a>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'saaspot'); ?>" target="_blank"><i class="fa fa-linkedin linkedin"></i><?php echo esc_attr('Linkedin', 'saaspot'); ?></a>

        </div>
      </div>
  <?php
    }
  }

/* Apps Share Options */
  if ( ! function_exists( 'saaspot_title_share_option' ) ) {
    function saaspot_title_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'saaspot' );
      ?>
      <div class="saspot-social rounded">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" data-toggle="tooltip" data-placement="top" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" data-toggle="tooltip" data-placement="top" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="http://pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" data-toggle="tooltip" data-placement="top" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>
      </div>
  <?php
    }
  }
/* Common Share Options */
  if ( ! function_exists( 'saaspot_post_share_option' ) ) {
    function saaspot_post_share_option() {

      global $post;
      $page_url = get_permalink($post->ID );
      $title = $post->post_title;
      $share_on_text = cs_get_option('share_on_text');
      $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share This Post On', 'saaspot' );
      ?>
      <div class="saspot-page-share">
        <div class="saspot-social">
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'saaspot'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'saaspot'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'saaspot'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        </div>
        <span class="share-link"><p><i class="fa fa-share-alt"></i>Share</p></span>
      </div>
  <?php
    }
  }

/* Apps Category List */
  if ( ! function_exists( 'saaspot_apps_category_list' ) ) {
    function saaspot_apps_category_list() {

      $terms = get_terms('apps_category');
      $count = count($terms);
      $i=0;
      $term_list = '';
      if ($count > 0) {
        foreach ($terms as $term) {
          $i++;
          $term_list .= '<li><a href="#section-apps" class="filter cat-'. esc_attr($term->slug) .'" data-filter=".cat-'. esc_attr($term->slug) .'" title="' . esc_attr($term->name) . '"><i class="fa fa-angle-right" aria-hidden="true"></i> ' . esc_html($term->name) . '</a></li>';
          if ($count != $i) {
            $term_list .= '';
          } else {
            $term_list .= '';
          }
        }
        echo $term_list;
      }

    }
  }

/* Webinars Category List */
  if ( ! function_exists( 'saaspot_webinars_category_list' ) ) {
    function saaspot_webinars_category_list() {

      $terms = get_terms('webinars_category');
      $count = count($terms);
      $i=0;
      $term_list = '';
      if ($count > 0) {
        foreach ($terms as $term) {
          $i++;
          $term_list .= '<li><a href="javascript:void(0);" class="filter webi-'. esc_attr($term->slug) .'" data-filter=".webi-'. esc_attr($term->slug) .'" title="' . esc_attr($term->name) . '">' . esc_html($term->name) . '</a></li>';
          if ($count != $i) {
            $term_list .= '';
          } else {
            $term_list .= '';
          }
        }
        echo $term_list;
      }

    }
  }

/* Custom WordPress admin login logo */
  if( ! function_exists( 'saaspot_theme_login_logo' ) ) {
    function saaspot_theme_login_logo() {
      $login_logo = cs_get_option('brand_logo_wp');
      if($login_logo) {
        $login_logo_url = wp_get_attachment_url($login_logo);
      } else {
        $login_logo_url = SAASPOT_PLUGIN_IMGS . '/logo.png';
      }
      if($login_logo) {
      echo "
        <style>
          body.login #login h1 a {
          background: url('$login_logo_url') no-repeat scroll center bottom transparent;
          height: 100px;
          width: 100%;
          margin-bottom:0px;
          }
        </style>";
      }
    }
    add_action('login_head', 'saaspot_theme_login_logo');
  }
/* WordPress admin login logo link */
if( ! function_exists( 'saaspot_login_url' ) ) {
  function saaspot_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'saaspot_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'saaspot_login_title' ) ) {
  function saaspot_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertext', 'saaspot_login_title');
}

/* Login Form Forgot Password */
add_filter('login_form_middle','saaspot_login_form_middle');
function saaspot_login_form_middle($content){
  $url=wp_lostpassword_url();
  $forgot_content='<p class="forgot-link"><a href="'.$url.'">Forget Password?</a></p>';
  return $forgot_content;
}

/* WP Registration form in Shortcode */
add_shortcode( 'saaspot_registration', 'saaspot_registration' );
function saaspot_registration() {
    ob_start();
    saaspot_registration_function();
    return ob_get_clean();
}

/* Registration Form Function */
function saaspot_registration_function() {
  $first_name = $last_name = $number = $password = $re_password = $email = $agree ='';
  if ( isset($_POST['wp-submit'] ) ) {
    registration_validation(
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['email'],
    $_POST['number'],
    $_POST['password'],
    $_POST['re_password'],
    $_POST['agree']
    );

    // sanitize user form input
    global $username, $password, $re_password, $number, $email, $first_name, $last_name, $agree;

    $username   =   sanitize_email( $_POST['email'] );
    $password   =   esc_attr( $_POST['password'] );
    $re_password   =   esc_attr( $_POST['re_password'] );
    $email      =   sanitize_email( $_POST['email'] );
    $number      =   esc_attr( $_POST['number'] );
    $first_name =   sanitize_text_field( $_POST['first_name'] );
    $last_name =   sanitize_text_field( $_POST['last_name'] );
    // call @function complete_registration to create the user
    // only when no WP_error is found
    complete_registration($username,$password,$re_password,$number,$email,$first_name,$last_name,$agree
    );
  }

  registration_form($first_name,$last_name,$number,$email,$password,$re_password,$agree );
}

/* Complete Resgistration Form s*/
function complete_registration() {
  global $reg_errors, $first_name, $last_name, $number, $email, $password, $re_password;
  if ( 1 > count( $reg_errors->get_error_messages() ) ) {
    $userdata = array(
    'user_login'    =>   $email,
    'user_number'    =>  $number,
    'user_email'    =>   $email,
    'user_pass'     =>   $password,
    'user_repass'   =>   $re_password,
    'first_name'    =>   $first_name,
    'last_name'     =>   $last_name,
    );
    $user = wp_insert_user( $userdata );
    //print_r($user);
    if($user) {
      echo '<span class="reg-complete">Registration complete.</span>';
      $_POST = array();
    } else{
      echo __('Problem in Registration . ','saaspot');
    }
  }
}

/* WP Registration Form Output */
function registration_form( $first_name, $last_name, $number, $email, $password, $re_password, $agree ) {
  echo '
  <form name="loginform" id="loginform" action="'.( is_ssl() ? 'https://' : 'http://' ).$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="row">
      <div class="col-sm-6">
        <p>
          <input name="first_name" id="full_name" class="input" placeholder="First Name" size="20" type="text" value="'.( isset( $_POST['first_name']) ? $first_name : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="last_name" id="last_name" class="input" placeholder="Last Name" size="20" type="text" value="'.( isset( $_POST['last_name']) ? $last_name : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="number" id="number" class="input" placeholder="Phone" size="20" type="text" value="'.( isset( $_POST['number']) ? $number : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="email" id="email" class="input" placeholder="Email" size="20" type="email" value="'.( isset( $_POST['email']) ? $email : null ).'">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="password" id="password" class="input" placeholder="Password" size="20" type="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
        </p>
      </div>
      <div class="col-sm-6">
        <p>
          <input name="re_password" id="re_password" class="input" placeholder="Repeat Password" size="20" type="password" value="' . ( isset( $_POST['re_password'] ) ? $re_password : null ) . '">
        </p>
      </div>
      <div class="col-md-12">
        <div class="checkbox-wrap">
          <label for="agree">
            <span class="checkbox-icon-wrap">
              <input name="agree" type="checkbox" id="agree" value="agree" class="input-checkbox" />
              <span class="checkbox-icon"></span>
            </span>
            <span class="agree">I agree to the terms of use, privacy notice and offer details</span>
          </label>
        </div>
      </div>
      <div class="col-sm-12 text-center">
        <p>
          <input name="wp-submit" id="wp-submit" class="" value="Create Account" type="submit">
          <input name="redirect_to" value="" type="hidden">
        </p>
      </div>
    </div>
  </form>';
}

/* Registration Form Validation */
function registration_validation( $first_name, $last_name, $email, $number, $password, $re_password, $agree )  {
  global $reg_errors;
  $reg_errors = new WP_Error;

  if( $first_name == "" ) {
    $reg_errors->add('first_name', __('Enter your First name'));
  }
  if( $last_name == "" ) {
    $reg_errors->add( 'last_name', __('Enter your Last name'));
  }
  if( $first_name == $last_name ) {
    $reg_errors->add( 'first_name', __('First name and last name cannot be same'));
  }
  if( $password == "" ) {
    $reg_errors->add( 'password', __('Enter your password'));
  }
  if( strlen($password) < 6 ) {
    $reg_errors->add( 'password', __('Password must be more than 6 characters'));
  }
  if( $password != $re_password ) {
    $reg_errors->add( 'password', __('Password and confirm password does not match!'));
  }
  if( $email != "" && !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST["email"] ) ) {
    $reg_errors->add( 'email', __('Enter valid email'));
  }
  if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', __('Email Already in use','saaspot'));
  }
  if  (empty($_POST['agree']) ) {
    $reg_errors->add( 'agree', __('Agree is required','saaspot'));
  }

  if ( is_wp_error( $reg_errors ) ) {

    foreach ( $reg_errors->get_error_messages() as $error ) {
      echo '<div class="saspot-register-error">';
      echo '<strong>'.__('ERROR','saaspot').'</strong>: ';
      echo $error . '<br/>';
      echo '</div>';
    }
  }
}
/* end code for registration form*/

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'saaspot_enqueue_inline_styles' ) ) {
  function saaspot_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( $all_inline_styles ) ) {
      echo '<style id="saaspot-inline-style" type="text/css">'. saaspot_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'saaspot_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'saaspot_core_check_px' ) ) {
  function saaspot_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

add_action('login_head', function(){
?>
<style>
  #registerform > p:first-child{
    display:none;
  }
</style>
<?php });

//Remove error for username, only show error for email only.
add_filter('registration_errors', function($wp_error, $sanitized_user_login, $user_email){
if(isset($wp_error->errors['empty_username'])){
    unset($wp_error->errors['empty_username']);
}

if(isset($wp_error->errors['username_exists'])){
    unset($wp_error->errors['username_exists']);
}
return $wp_error;
}, 10, 3);

add_action('login_form_register', function(){
if(isset($_POST['user_login']) && isset($_POST['user_email']) && !empty($_POST['user_email'])){
    $_POST['user_login'] = $_POST['user_email'];
}
});

// Redirect Registration Page
function my_registration_page_redirect() {
  global $pagenow;
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $redirection_link = cs_get_option('redirection_link');
  $redirection = $redirection_link ? $redirection_link : home_url( '/' );
  if ( strpos($url,'registered') !== false ) {
    wp_redirect( esc_url($redirection) );
  }
}
add_filter( 'init', 'my_registration_page_redirect' );

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function saaspot_import_files() {
  return array(
    array(
      'import_file_name'           => 'SaaSpot',
      'import_file_url'            => trailingslashit( SAASPOT_PLUGIN_URL ) . 'inc/import/content.xml',
      'import_widget_file_url'     => trailingslashit( SAASPOT_PLUGIN_URL ) . 'inc/import/widget.wie',
      'import_customizer_file_url' => trailingslashit( SAASPOT_PLUGIN_URL ) . 'inc/import/customize.dat',
      'local_import_csf'           => array(
        array(
          'file_path'   => trailingslashit( SAASPOT_PLUGIN_URL ) . 'inc/import/theme-options.json',
          'option_name' => '_cs_options',
        ),
      ),
      'import_notice'              => __( 'Import process may take 2-4 minutes, please be patient. It\'s really based on your network speed.', 'saaspot-core' ),
      'preview_url'                => 'http://victorthemes.com/themes/saaspot',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'saaspot_import_files' );

/**
 * One Click Import Function for CodeStar Framework
 */
if ( ! function_exists( 'csf_after_content_import_execution' ) ) {
  function csf_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

    $downloader = new OCDI\Downloader();

    if( ! empty( $import_files[$selected_index]['import_csf'] ) ) {

      foreach( $import_files[$selected_index]['import_csf'] as $index => $import ) {
        $file_path = $downloader->download_file( $import['file_url'], 'demo-csf-import-file-'. $index . '-'. date( 'Y-m-d__H-i-s' ) .'.json' );
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    } else if( ! empty( $import_files[$selected_index]['local_import_csf'] ) ) {

      foreach( $import_files[$selected_index]['local_import_csf'] as $index => $import ) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file( $file_path );
        update_option( $import['option_name'], json_decode( $file_raw, true ) );
      }

    }

    // Put info to log file.
    $ocdi       = OCDI\OneClickDemoImport::get_instance();
    $log_path   = $ocdi->get_log_file_path();

    OCDI\Helpers::append_to_file( 'Codestar Framework files loaded.'. $logs, $log_path );

  }
  add_action('pt-ocdi/after_content_import_execution', 'csf_after_content_import_execution', 3, 99 );
}

/**
 * [saaspot_after_import_setup]
 * @return Front Page, Post Page & Menu Set
 */
function saaspot_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
      )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog Standard' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'saaspot_after_import_setup' );

// Install Demos Menu - Menu Edited
function saaspot_core_one_click_page( $default_settings ) {
  $default_settings['parent_slug'] = 'themes.php';
  $default_settings['page_title']  = esc_html__( 'Install Demos', 'saaspot-core' );
  $default_settings['menu_title']  = esc_html__( 'Install Demos', 'saaspot-core' );
  $default_settings['capability']  = 'import';
  $default_settings['menu_slug']   = 'install_demos';

  return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'saaspot_core_one_click_page' );

// Model Popup - Width Increased
function saaspot_ocdi_confirmation_dialog_options ( $options ) {
  return array_merge( $options, array(
    'width'       => 600,
    'dialogClass' => 'wp-dialog',
    'resizable'   => false,
    'height'      => 'auto',
    'modal'       => true,
  ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'saaspot_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
  $auto_install = admin_url('themes.php?page=install_demos');
  $manual_install = admin_url('themes.php?page=install_demos&import-mode=manual');
  $default_text .= '<h1>Install Demos</h1>
  <div class="saaspot-core_intro-text vtdemo-one-click">
  <div id="poststuff">

    <div class="postbox important-notes">
      <h3><span>Important notes:</span></h3>
      <div class="inside">
        <ol>
          <li>Please note, this import process will take time. So, please be patient.</li>
          <li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
          <li>All images are demo purposes only. So, images may repeat in your site content.</li>
        </ol>
      </div>
    </div>

    <div class="postbox vt-support-box vt-error-box">
      <h3><span>Don\'t Edit Parent Theme Files:</span></h3>
      <div class="inside">
        <p>Don\'t edit any files from parent theme! Use only a <strong>Child Theme</strong> files for your customizations!</p>
        <p>If you get future updates from our theme, you\'ll lose edited customization from your parent theme.</p>
      </div>
    </div>

    <div class="postbox vt-support-box">
      <h3><span>Need Support?</span> <a href="https://www.youtube.com/watch?v=NjzZaKfXDEE" target="_blank" class="cs-section-video"><i class="fa fa-youtube-play"></i> <span>How to?</span></a></h3>
      <div class="inside">
        <p>Have any doubts regarding this installation or any other issues? Please feel free to open a ticket in our support center.</p>
        <a href="http://victorthemes.com/docs/saaspot" class="button-primary" target="_blank">Docs</a>
        <a href="https://victorthemes.com/my-account/support/" class="button-primary" target="_blank">Support</a>
        <a href="https://1.envato.market/AOqDR" class="button-primary" target="_blank">Item Page</a>
      </div>
    </div>
    <div class="nav-tab-wrapper vt-nav-tab">
      <a href="'. $auto_install .'" class="nav-tab vt-mode-switch vt-auto-mode nav-tab-active">Auto Import</a>
      <a href="'. $manual_install .'" class="nav-tab vt-mode-switch vt-manual-mode">Manual Import</a>
    </div>

  </div>
  </div>';

  return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );