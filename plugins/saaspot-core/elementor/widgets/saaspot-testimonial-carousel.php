<?php
/*
 * Elementor SaaSpot Testimonial Carousel Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_testimonial_post = (saaspot_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';

if (!$noneed_testimonial_post) {
class SaaSpot_Testimonial_Carousel extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_testimonial_carousel';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Testimonial Carousel', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-comments';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Testimonial Carousel widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_testimonial_carousel'];
	}

	/**
	 * Register SaaSpot Testimonial Carousel widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){

		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__( 'Testimonial Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' => esc_html__( 'Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'testimonial_one' => esc_html__( 'Style One', 'saaspot-core' ),
					'testimonial_two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'testimonial_three' => esc_html__( 'Style Three', 'saaspot-core' ),
					'testimonial_four' => esc_html__( 'Style Four', 'saaspot-core' ),
				],
				'default' => 'testimonial_one',
				'description' => esc_html__( 'Select testimonial Style', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'testimonial_list_heading',
			[
				'label' => __( 'Listing', 'saaspot-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'testimonial_limit',
			[
				'label' => esc_html__( 'Limit', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
			]
		);
		$this->add_control(
			'testimonial_order',
			[
				'label' => esc_html__( 'Order', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('DESC', 'saaspot-core'),
					'ASC' => esc_html__('ASC', 'saaspot-core'),
				],
			]
		);
		$this->add_control(
			'testimonial_orderby',
			[
				'label' => esc_html__( 'Order By', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'none' => esc_html__('None', 'saaspot-core'),
					'ID' => esc_html__('ID', 'saaspot-core'),
					'author' => esc_html__('Author', 'saaspot-core'),
					'title' => esc_html__('Name', 'saaspot-core'),
					'date' => esc_html__('Date', 'saaspot-core'),
					'rand' => esc_html__('Rand', 'saaspot-core'),
					'menu_order' => esc_html__('Menu Order', 'saaspot-core'),
				],
			]
		);
		$this->add_control(
			'testimonial_show_category',
			[
				'label' => __( 'Certain Categories?', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'testimonial_category'),
				'multiple' => true,
			]
		);
		$this->end_controls_section();// end: Section


		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'saaspot-core' ),
			]
		);

		$this->add_responsive_control(
			'carousel_items',
			[
				'label' => esc_html__( 'How many items?', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __( 'Space Between Items', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' =>30,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'saaspot-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
			]
		);
		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__( 'Disable Loop?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Continuously moving carousel, if enabled.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Dots, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to start Carousel automatically, enable it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_animate_out',
			[
				'label' => esc_html__( 'Animate Out', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'CSS3 animation out.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_mousedrag',
			[
				'label' => esc_html__( 'Disable Mouse Drag?', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable Mouse Drag, check it.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_autowidth',
			[
				'label' => esc_html__( 'Auto Width', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Width automatically for each carousel items.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'carousel_autoheight',
			[
				'label' => esc_html__( 'Auto Height', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Height automatically for each carousel items.', 'saaspot-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_area_style',
			[
				'label' => esc_html__( 'Area', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style!' => 'testimonial_two',
				],
			]
		);
		$this->add_control(
			'area_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-info,
					{{WRAPPER}} .testimonials-style-three .testimonials-wrap' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'image_bg_color',
			[
				'label' => esc_html__( 'Image Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-author-wrap' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial-author-wrap h4,
					{{WRAPPER}} .testimonials-wrap h6,
					{{WRAPPER}} .testimonials-wrap h5',
			]
		);
		$this->add_control(
			'before_line_color',
			[
				'label' => esc_html__( 'Line Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'testimonial_style' => 'testimonial_three',
				],
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .testimonials-style-three .author-name:before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-author-wrap h4,
					{{WRAPPER}} .testimonial-author-wrap p,
					{{WRAPPER}} .testimonials-wrap h6,
					{{WRAPPER}} .testimonials-wrap h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_content_text_style',
			[
				'label' => esc_html__( 'Content Text', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonials-wrap p, {{WRAPPER}} .testimonial-info p',
			]
		);
		$this->add_control(
			'content_text_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-wrap p, {{WRAPPER}} .testimonial-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_nav' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 16,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
					{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .owl-carousel .owl-nav button.owl-next' => 'width: calc({{SIZE}}{{UNIT}} + 24px);height: calc({{SIZE}}{{UNIT}} + 24px);',
				],
			]
		);
		$this->start_controls_tabs( 'nav_arrow_style' );
			$this->start_controls_tab(
				'nav_arrow_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next,
						{{WRAPPER}} .testimonials-style-three .owl-carousel .owl-nav' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next',
				]
			);
			$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'nav_arrow_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_active_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab

		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Dots
		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Dots', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_dots' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Size', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'dots_margin',
			[
				'label' => __( 'Margin', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'dots_style' );
			$this->start_controls_tab(
				'dots_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'dots_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot',
				]
			);
			$this->end_controls_tab();  // end:Normal tab

			$this->start_controls_tab(
				'dots_active',
				[
					'label' => esc_html__( 'Active', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'dots_active_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot.active' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_active_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot.active',
				]
			);
			$this->end_controls_tab();  // end:Active tab

		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Testimonial Carousel widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$testimonial_style = !empty( $settings['testimonial_style'] ) ? $settings['testimonial_style'] : '';
		$testimonial_limit = !empty( $settings['testimonial_limit'] ) ? $settings['testimonial_limit'] : '-1';
		$testimonial_order = !empty( $settings['testimonial_order'] ) ? $settings['testimonial_order'] : '';
		$testimonial_orderby = !empty( $settings['testimonial_orderby'] ) ? $settings['testimonial_orderby'] : '';
		$testimonial_show_category = !empty( $settings['testimonial_show_category'] ) ? $settings['testimonial_show_category'] : [];

		// Carousel Options
		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? true : false;
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;

		$styled_class  = ' saspot-testimCarElementor ';

		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="30"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="true"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="3"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="2"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';

		// Testimonial Style
		if ($testimonial_style === 'testimonial_two') {
      $testimonial_style_class = ' testimonials-style-two';
    } elseif ($testimonial_style === 'testimonial_three') {
      $testimonial_style_class = ' testimonials-style-three';
    } elseif ($testimonial_style === 'testimonial_four') {
      $testimonial_style_class = ' testimonials-style-four';
    } else {
      $testimonial_style_class = '';
    }

		// Turn output buffer on
		ob_start();

		$args = array(
		  'post_type' => 'testimonial',
		  'posts_per_page' => (int) $testimonial_limit,
		  'testimonial_category' => $testimonial_show_category,
		  'orderby' => $testimonial_orderby,
		  'order' => $testimonial_order
		);

		$saspot_testi = new \WP_Query( $args );

		if ($saspot_testi->have_posts()) :
		?>
		<div class="saspot-monials<?php echo esc_attr($testimonial_style_class); ?>">
      <?php if ($testimonial_style === 'testimonial_two') { ?>
      <div class="testimonials-wrap">
      <div class="saspot-icon"><img src="<?php echo esc_url(SAASPOT_PLUGIN_IMGS.'/icons/icon33@2x.png'); ?>" width="40" alt="Quote"></div>
      <?php } elseif ($testimonial_style === 'testimonial_three') { ?>
      <div class="testimonials-wrap">
      <?php } else {} ?>
        <div class="owl-carousel" <?php echo $carousel_loop .' '. $carousel_items .' '. $carousel_margin .' '. $carousel_dots .' '. $carousel_nav .' '. $carousel_autoplay_timeout .' '. $carousel_autoplay .' '. $carousel_animate_out .' '. $carousel_mousedrag .' '. $carousel_autowidth .' '. $carousel_autoheight .' '. $carousel_tablet .' '. $carousel_mobile .' '. $carousel_small_mobile; ?>>
				<?php
				while ($saspot_testi->have_posts()) : $saspot_testi->the_post();

				// Get Meta Box Options - saaspot_framework_active()
				$testimonial_options = get_post_meta( get_the_ID(), 'testimonial_options', true );
				$testi_job = $testimonial_options['testi_position'];

				// Featured Image
				$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
				$saaspot_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
				$large_image = $large_image[0];
				if ($testimonial_style === 'testimonial_two') { // Style Two ?>
		      <div class="item">
		        <p><?php the_excerpt(); ?></p>
		        <h6 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a> <?php if ($testi_job) { ?> / <?php echo esc_html($testi_job); ?><?php } ?></h6>
		      </div>
		    <?php } elseif ($testimonial_style === 'testimonial_three') { // Style Three ?>
		      <div class="item">
		        <p><?php the_excerpt(); ?></p>
		        <h5 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a> <?php if ($testi_job) { ?>, <?php echo esc_html($testi_job); ?><?php } ?></h5>
		      </div>
		    <?php } elseif ($testimonial_style === 'testimonial_four') { // Style Four ?>
		    	<div class="item">
					  <div class="testimonial-item">
					    <div class="testimonial-info">
					      <?php if($large_image) { ?>
		              <div class="saspot-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($saaspot_alt); ?>"></div>
	              <?php } ?>
					      <div class="testimonial-wrap">
					        <p><?php the_excerpt(); ?></p>
					      </div>
					      <h5 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>">- <?php echo esc_html(get_the_title()); ?></a></h5>
					    </div>
					  </div>
					</div>
		    <?php } else { ?>
		      <div class="item">
		        <div class="testimonial-item">
		          <div class="testimonial-author-wrap saspot-item">
		            <div class="saspot-table-wrap">
		              <div class="saspot-align-wrap">
		                <?php if($large_image) { ?>
		                <div class="saspot-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($saaspot_alt); ?>"></div>
		                <?php } ?>
		                <h4 class="author-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
		                <?php if ($testi_job) { ?><p><?php echo esc_html($testi_job); ?></p><?php } ?>
		              </div>
		            </div>
		          </div>
		          <div class="testimonial-info saspot-item"><p><?php the_excerpt(); ?></p></div>
		        </div>
		      </div>
		    <?php }
				endwhile;
				wp_reset_postdata();
				?>
			</div> <!-- owl-carousel -->
			<?php if($testimonial_style === 'testimonial_two' || $testimonial_style === 'testimonial_three') {
			  echo '</div>';
			} ?>
		</div>
	<?php
	  endif;
		// outbut buffer
		echo ob_get_clean();

	}

	/**
	 * Render Testimonial Carousel widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Testimonial_Carousel() );
}