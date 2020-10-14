<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class saaspot_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'saspot-recent-blog',
      VTHEME_NAME_P . __( ': Latest Posts', 'saaspot' ),
      array(
        'classname'   => 'latest-blog-widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays recent posts.', 'saaspot' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => __( 'Latest Post', 'saaspot' ),
      'ptypes'   => 'post',
      'limit'    => '3',
      'date'     => true,
      'date_format' => '',
      'category' => '',
      'order' => '',
      'orderby' => '',
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

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'saaspot' ),
      'title' => __( 'Post Type :', 'saaspot' ),
    );
    echo cs_add_element( $ptypes_field, $ptypes_value );

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'saaspot' ),
      'help' => __( 'How many posts want to show?', 'saaspot' ),
    );
    echo cs_add_element( $limit_field, $limit_value );

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'saaspot' ),
      'off_text'  => __( 'No', 'saaspot' ),
      'title' => __( 'Display Date :', 'saaspot' ),
    );
    echo cs_add_element( $date_field, $date_value );

    // Date Format
    $date_format_value = esc_attr( $instance['date_format'] );
    $date_format_field = array(
      'id'    => $this->get_field_name('date_format'),
      'name'  => $this->get_field_name('date_format'),
      'type'  => 'text',
      'on_text'  => __( 'Yes', 'saaspot' ),
      'off_text'  => __( 'No', 'saaspot' ),
      'title' => __( 'Date Format :', 'saaspot' ),
      'help' => __( "Enter date format (for more info <a href='https://codex.wordpress.org/Formatting_Date_and_Time' target='_blank'>click here</a>).", 'saaspot')
    );
    echo cs_add_element( $date_format_field, $date_format_value );

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'saaspot' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'saaspot' ),
    );
    echo cs_add_element( $category_field, $category_value );

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'saaspot' ),
      'title' => __( 'Order :', 'saaspot' ),
    );
    echo cs_add_element( $order_field, $order_value );

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'saaspot'),
        'ID' => __('ID', 'saaspot'),
        'author' => __('Author', 'saaspot'),
        'title' => __('Title', 'saaspot'),
        'name' => __('Name', 'saaspot'),
        'type' => __('Type', 'saaspot'),
        'date' => __('Date', 'saaspot'),
        'modified' => __('Modified', 'saaspot'),
        'rand' => __('Random', 'saaspot'),
      ),
      'default_option' => __( 'Select OrderBy', 'saaspot' ),
      'title' => __( 'OrderBy :', 'saaspot' ),
    );
    echo cs_add_element( $orderby_field, $orderby_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['date_format']         = strip_tags( stripslashes( $new_instance['date_format'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title          = apply_filters( 'widget_title', $instance['title'] );
    $ptypes         = $instance['ptypes'];
    $limit          = $instance['limit'];
    $display_date   = $instance['date'];
    $display_date_format = $instance['date_format'];
    $category       = $instance['category'];
    $order          = $instance['order'];
    $orderby        = $instance['orderby'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

     $saaspot_rpw = new WP_Query( $args );
     global $post;

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    $display_date_format = $display_date_format ? $display_date_format : '';

    if ($saaspot_rpw->have_posts()) :
    while ($saaspot_rpw->have_posts()) : $saaspot_rpw->the_post();
      $saaspot_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
      $saaspot_large_image = $saaspot_large_image[0];
      if(class_exists('Aq_Resize')) {
        $blog_img = aq_resize( $saaspot_large_image, '89', '87', true );
      } else {$blog_img = $saaspot_large_image;}
      $featured_img = ( $blog_img ) ? $blog_img : $saaspot_large_image;
    ?>
    <div class="post-item">
      <?php if($featured_img) { ?>
        <div class="saspot-image">
          <a href="<?php esc_url(the_permalink()) ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title(); ?>"></a>
        </div>
      <?php } ?>
      <div class="post-info">
        <h4 class="post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h4>
        <div class="blog-date">
          <ul>
            <?php if ($display_date === '1') { ?><li><?php echo get_the_date($display_date_format); ?></li><?php } ?>
            <li><?php echo do_shortcode('[rt_reading_time postfix="mins read" postfix_singular="min read"]'); ?></li>
          </ul>
        </div>
      </div>
    </div>
  <?php
  endwhile;
  endif;
  wp_reset_postdata();
  // Display the markup after the widget
  echo $after_widget;
  }
}

// Register the widget using an annonymous function
function saaspot_recent_posts_function() {
  register_widget( "saaspot_recent_posts" );
}
add_action( 'widgets_init', 'saaspot_recent_posts_function' );
