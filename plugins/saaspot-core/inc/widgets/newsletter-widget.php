<?php
/*
 * Subscribe Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class saaspot_subscribe_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'saspot-subscribe-widget',
      VTHEME_NAME_P . __( ': Subscribe', 'saaspot' ),
      array(
        'classname'   => 'subscribe-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays subscribe.', 'saaspot' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'content' => '',
      'form' => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'saaspot' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'text',
      'shortcode'  => true,
      'attributes'    => array(
        'rows'        => 16,
        'cols'        => 20,
      ),
      'title' => __( 'Content :', 'saaspot' ),
    );
    echo cs_add_element( $content_field, $content_value );

    // Form
    $form_value = esc_attr( $instance['form'] );
    $form_field = array(
      'id'    => $this->get_field_name('form'),
      'name'  => $this->get_field_name('form'),
      'type'  => 'textarea',
      'shortcode'  => true,
      'attributes'    => array(
        'rows'        => 16,
        'cols'        => 20,
      ),
      'title' => __( 'Form :', 'saaspot' ),
    );
    echo cs_add_element( $form_field, $form_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['content']     = strip_tags( stripslashes( $new_instance['content'] ) );
    $instance['form']     = strip_tags( stripslashes( $new_instance['form'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = $instance['title'];
    $content       = $instance['content'];
    $form       = $instance['form'];

    // Display the markup before the widget
    echo $before_widget; ?>

    <div class="subscribe-wrap saspot-form">
      <?php if ( $title ) { ?><h3><?php echo $title; ?></h3><?php } ?>
      <div class="subscribe-form">
        <p><?php echo $content; ?></p>
        <?php echo do_shortcode($form); ?>
      </div>
    </div>

    <?php
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function saaspot_subscribe_widget_function() {
  register_widget( "saaspot_subscribe_widget" );
}
add_action( 'widgets_init', 'saaspot_subscribe_widget_function' );
