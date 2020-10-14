<?php
/*
 * Elementor SaaSpot Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Blog extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_blog';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Blog', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-newspaper-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Blog widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_blog'];
	}
	 */
	
	/**
	 * Register SaaSpot Blog widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$posts = get_posts( 'post_type="post"&numberposts=-1' );
    $PostID = array();
    if ( $posts ) {
      foreach ( $posts as $post ) {
        $PostID[ $post->ID ] = $post->ID;
      }
    } else {
      $PostID[ __( 'No ID\'s found', 'saaspot' ) ] = 0;
    }
		
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Blog Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label' => __( 'Blog Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One(List)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two(Grid)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your blog style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_column',
			[
				'label' => __( 'Columns', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'blog_style' => 'style-two',
				],
				'frontend_available' => true,
				'options' => [
					'col-2' => esc_html__( 'Column Two', 'saaspot-core' ),
					'col-3' => esc_html__( 'Column Three', 'saaspot-core' ),
				],
				'default' => 'col-3',
				'description' => esc_html__( 'Select your blog column.', 'saaspot-core' ),
			]
		);		
		$this->end_controls_section();// end: Section

		
		$this->start_controls_section(
			'section_blog_metas',
			[
				'label' => esc_html__( 'Meta\'s Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_image',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_category',
			[
				'label' => esc_html__( 'Category', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_tag',
			[
				'label' => esc_html__( 'Tag', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_date',
			[
				'label' => esc_html__( 'Date', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_read_time',
			[
				'label' => esc_html__( 'Read Time', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_author',
			[
				'label' => esc_html__( 'Author', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_blog_listing',
			[
				'label' => esc_html__( 'Listing Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_limit',
			[
				'label' => esc_html__( 'Blog Limit', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_order',
			[
				'label' => __( 'Order', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'saaspot-core' ),
					'DESC' => esc_html__( 'Desending', 'saaspot-core' ),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'blog_orderby',
			[
				'label' => __( 'Order By', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'saaspot-core' ),
					'ID' => esc_html__( 'ID', 'saaspot-core' ),
					'author' => esc_html__( 'Author', 'saaspot-core' ),
					'title' => esc_html__( 'Title', 'saaspot-core' ),
					'date' => esc_html__( 'Date', 'saaspot-core' ),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'blog_show_category',
			[
				'label' => __( 'Certain Categories?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'blog_show_id',
			[
				'label' => __( 'Certain ID\'s?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__( 'Excerpt Length', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 55,
				'description' => esc_html__( 'How many words you want in short content paragraph.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'blog_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'blog_pagination',
			[
				'label' => esc_html__( 'Pagination', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'saaspot-core' ),
				'label_off' => esc_html__( 'Hide', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_section_style',
			[
				'label' => esc_html__( 'Section', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasblo_section_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_banner_style',
			[
				'label' => esc_html__( 'Image', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'banner_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .blog-item .saspot-image img',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item .saspot-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasblo_image_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .blog-item .saspot-image img',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasblo_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-info h4',
			]
		);
		$this->start_controls_tabs( 'title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4, {{WRAPPER}} .blog-info h4 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'title_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-info p',
			]
		);
		$this->add_control(
			'excerpt_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_metas_style',
			[
				'label' => esc_html__( 'Meta\'s', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'metas_options',
			[
				'label' => __( 'Meta\'s Options', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'metas_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-info a .saspot-label',
			]
		);
		$this->start_controls_tabs( 'metas_style' );
			$this->start_controls_tab(
				'metas_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'metas_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a .saspot-label' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'metas_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a .saspot-label' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'metas_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'metas_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a:hover .saspot-label' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'metas_bg_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a:hover .saspot-label' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs(); // end tabs

		$this->add_control(
			'author_options',
			[
				'label' => __( 'Author Options', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saspot-meta .author a',
			]
		);
		$this->start_controls_tabs( 'author_style' );
			$this->start_controls_tab(
				'author_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'author_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-meta .author a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'author_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'author_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saspot-meta .author a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs(); // end tabs

		$this->add_control(
			'date_options',
			[
				'label' => __( 'Date & Read Options', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'frontend_available' => true,
				'selector' => '{{WRAPPER}} .blog-date ul',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .blog-date ul' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$blog_style = !empty( $settings['blog_style'] ) ? $settings['blog_style'] : '';
		$blog_column = !empty( $settings['blog_column'] ) ? $settings['blog_column'] : '';
		$blog_limit = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '';
		$blog_image  = ( isset( $settings['blog_image'] ) && ( 'true' == $settings['blog_image'] ) ) ? true : false;
		$blog_category  = ( isset( $settings['blog_category'] ) && ( 'true' == $settings['blog_category'] ) ) ? true : false;
		$blog_tag  = ( isset( $settings['blog_tag'] ) && ( 'true' == $settings['blog_tag'] ) ) ? true : false;
		$blog_date  = ( isset( $settings['blog_date'] ) && ( 'true' == $settings['blog_date'] ) ) ? true : false;
		$blog_read_time  = ( isset( $settings['blog_read_time'] ) && ( 'true' == $settings['blog_read_time'] ) ) ? true : false;
		$blog_author  = ( isset( $settings['blog_author'] ) && ( 'true' == $settings['blog_author'] ) ) ? true : false;
		$blog_order = !empty( $settings['blog_order'] ) ? $settings['blog_order'] : '';
		$blog_orderby = !empty( $settings['blog_orderby'] ) ? $settings['blog_orderby'] : '';
		$blog_show_category = !empty( $settings['blog_show_category'] ) ? $settings['blog_show_category'] : [];
		$blog_show_id = !empty( $settings['blog_show_id'] ) ? $settings['blog_show_id'] : [];
		$short_content = !empty( $settings['short_content'] ) ? $settings['short_content'] : '';
		$blog_pagination  = ( isset( $settings['blog_pagination'] ) && ( 'true' == $settings['blog_pagination'] ) ) ? true : false;
		$blog_aqr  = ( isset( $settings['blog_aqr'] ) && ( 'true' == $settings['blog_aqr'] ) ) ? true : false;
		
		// Column
		if ($blog_column === 'col-2') {
			$saaspot_blog_col_class = 'col-md-6 col-sm-6';
		} else {
			$saaspot_blog_col_class = 'col-lg-4 col-md-6 col-sm-12';
		}

		if ($blog_style === 'style-two') {
			$layout_class = $saaspot_blog_col_class;
		} else {
			$layout_class = 'col-md-12';
		}

		// Excerpt
		if (saaspot_framework_active()) {
		  $excerpt_length = cs_get_option('theme_blog_excerpt');
		  $excerpt_length = $excerpt_length ? $excerpt_length : '55';
		  if ($short_content) {
			$short_content = $short_content;
		  } else {
			$short_content = $excerpt_length;
		  }
		} else {
		  $short_content = '55';
		}

		// Style
		if ($blog_style === 'style-two') {
			$blog_style_cls = ' blog-style-two';
		} else {
			$blog_style_cls = '';
		}

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if( get_query_var( 'paged' ) )
		  $my_page = get_query_var( 'paged' );
		else {
		  if( get_query_var( 'page' ) )
			$my_page = get_query_var( 'page' );
		  else
			$my_page = 1;
		  set_query_var( 'paged', $my_page );
		  $paged = $my_page;
		}

    if ($blog_show_id) {
			$blog_show_id = json_encode( $blog_show_id );
			$blog_show_id = str_replace(array( '[', ']' ), '', $blog_show_id);
			$blog_show_id = str_replace(array( '"', '"' ), '', $blog_show_id);
      $blog_show_id = explode(',',$blog_show_id);
    } else {
      $blog_show_id = '';
    }

		$args = array(
		  // other query params here,
		  'paged' => $my_page,
		  'post_type' => 'post',
		  'posts_per_page' => (int)$blog_limit,
		  'category_name' => implode(',', $blog_show_category),
		  'orderby' => $blog_orderby,
		  'order' => $blog_order,
      'post__in' => $blog_show_id,
		);

		$saspot_post = new \WP_Query( $args ); ?>

		<div class="blog-items-wrap<?php echo esc_attr($blog_style_cls); ?>">
			<div class="row">
			<?php 
			  if ($saspot_post->have_posts()) : while ($saspot_post->have_posts()) : $saspot_post->the_post();
			  $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
			  $large_image = $large_image[0]; 

			  if ($blog_aqr) {
					$featured_img = $large_image;
				} else {
				  if ($blog_style === 'style-two') {
						if ($blog_column === 'col-2') {
					    if(class_exists('Aq_Resize')) {
					      $blog_img = aq_resize( $large_image, '570', '370', true );
					    } else {$blog_img = $large_image;}
					    $featured_img = ( $blog_img ) ? $blog_img : SAASPOT_PLUGIN_ASTS . '/images/holders/570x370.png';
						} else {
					  	if(class_exists('Aq_Resize')) {
								$blog_img = aq_resize( $large_image, '370', '330', true );
					    } else {$blog_img = $large_image;}
							$featured_img = ( $blog_img ) ? $blog_img : SAASPOT_PLUGIN_ASTS . '/images/holders/370x330.png';
						}
					} else {
						if(class_exists('Aq_Resize')) {
							$blog_img = aq_resize( $large_image, '800', '380', true );
					   } else {$blog_img = $large_image;}
						$featured_img = ( $blog_img ) ? $blog_img : $large_image;
					}
				}
				$date_format = cs_get_option('blog_date_format');
				$date_format_actual = $date_format ? $date_format : '';
				$tag_list = get_the_tags();
				$cat_list = get_the_category();
				if($tag_list && $cat_list) {
					$meta_class = 'col-md-6';
				} else {
					$meta_class = 'col-md-12';
				}
			  ?>
				
				<div class="<?php echo esc_attr($layout_class); ?>">
					<div class="blog-item saspot-item">
						<div id="post-<?php the_ID(); ?>" <?php post_class('saspot-blog-post'); ?>>
						  <?php if ($large_image && $blog_image) { ?>
							  <div class="saspot-image">
							    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
							  </div>
							<?php } ?>
						  <div class="blog-info">
						  	<div class="row">
						  		<?php if ( $blog_category && $cat_list ) { ?>
						      <div class="<?php echo esc_attr($meta_class); ?>">
						        <div class="blog-cats">
							        <?php
									    $categories = get_the_category();
							        foreach ( $categories as $category ) : ?>
							            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><span class="saspot-label"><?php echo esc_html( $category->name ); ?></span></a>
							        <?php endforeach; ?>       
						        </div>
						      </div>
						      <?php } if ( $blog_tag && $tag_list ) { ?>
						      <div class="<?php echo esc_attr($meta_class); ?>">
						        <div class="blog-tags">
						        	<?php
									    $tags = get_the_tags();
							        foreach ( $tags as $tag ) : ?>
							            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span class="saspot-label"><?php echo esc_html( $tag->name ); ?></span></a>
							        <?php endforeach; ?>
						        </div>
						      </div>
					    		<?php } ?>
						    </div>
						    <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
						    <?php
									echo '<p>';
									saaspot_excerpt($short_content);
									echo '</p>';
									echo saaspot_wp_link_pages();
								?>
						    <div class="saspot-meta">
						      <div class="row align-items-center">
						        <div class="col-md-6">
						        	<?php if ( $blog_author ) { ?>
						          <div class="author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						            <?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); ?>
						            <span><?php echo esc_html(get_the_author()); ?></span>
						          </a></div>
						          <?php } ?>
						        </div>
						        <div class="col-md-6">
						          <div class="blog-date">
						            <ul>
						              <?php if ( $blog_date ) { ?><li><?php echo get_the_date($date_format_actual); ?></li><?php } ?>
						              <?php if ( $blog_read_time ) { ?><li><?php echo do_shortcode('[rt_reading_time postfix="mins read" postfix_singular="min read"]'); ?></li><?php } ?>
						            </ul>
						          </div>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			  <?php
			  endwhile;
			  endif;
			  wp_reset_postdata();
				if ($blog_pagination) { ?>
				  <div class="pagination-wrap">
				  <?php saaspot_paging_nav($saspot_post->max_num_pages,"",$paged); ?>
				  </div>
				<?php } ?>
			</div>
		</div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Blog() );