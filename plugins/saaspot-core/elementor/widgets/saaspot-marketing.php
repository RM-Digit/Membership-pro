<?php
/*
 * Elementor SaaSpot Marketing Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Marketing extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_marketing';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Marketing', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-history';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Marketing widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-saaspot_marketing'];
	}
	
	/**
	 * Register SaaSpot Marketing widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_marketing',
			[
				'label' => esc_html__( 'Marketing Options', 'saaspot-core' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'marketing_year',
			[
				'label' => esc_html__( 'Marketing Year', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type year here', 'saaspot-core' ),
				'default' => esc_html__( '1971', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'marketing_title',
			[
				'label' => esc_html__( 'Marketing Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
				'default' => esc_html__( 'First Email Sent', 'saaspot-core' ),
			]
		);
		$repeater->add_control(
			'marketing_title_link',
			[
				'label' => esc_html__( 'Marketing Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->add_control(
			'marketing_content',
			[
				'label' => esc_html__( 'Marketing Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'marketing_groups',
			[
				'label' => esc_html__( 'Marketing Logos', 'saaspot-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'marketing_title' => esc_html__( 'Marketing', 'saaspot-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ marketing_title }}}',
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
				'default' => 4,
				'description' => esc_html__( 'Enter the number of items to show.', 'saaspot-core' ),
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __( 'Space Between Items', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' =>10,
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
				'default' => true,
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
				'default' => true,
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
				'default' => true,
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
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next' => 'background: {{VALUE}};',
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

		// Year Style
		$this->start_controls_section(
			'year_style',
			[
				'label' => esc_html__( 'Year', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'year_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .year-wrap',
			]
		);
		$this->add_control(
			'year_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .year-wrap' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'year_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .year-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'top_border_color',
			[
				'label' => esc_html__( 'Top Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .marketing-year:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'year_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .year-wrap',
			]
		);
		$this->end_controls_section();// end: Section

		// Title Style
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
				'name' => 'sasmarkt_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .marketing-item h3',
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
						'{{WRAPPER}} .marketing-item h3, {{WRAPPER}} .marketing-item h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .marketing-item h3 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Content Style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'saaspot-core' ),
				'name' => 'content_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .marketing-item p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .marketing-item p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Marketing widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$marketing_groups = !empty( $settings['marketing_groups'] ) ? $settings['marketing_groups'] : [];

		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';
		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;
		
		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="4"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="10"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="true"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="2"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="1"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';

		$output = '<div class="saspot-marketing">
							  <div class="marketing-year">
							    <div class="container">
							      <div class="owl-carousel" '. $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight  . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .'>';

											// Group Param Output
											if( is_array( $marketing_groups ) && !empty( $marketing_groups ) ){
												foreach ( $marketing_groups as $each_logo ) {
													$year = !empty( $each_logo['marketing_year'] ) ? $each_logo['marketing_year'] : '';
													$title = !empty( $each_logo['marketing_title'] ) ? $each_logo['marketing_title'] : '';
												  $title_link = !empty( $each_logo['marketing_title_link']['url'] ) ? $each_logo['marketing_title_link']['url'] : '';
													$title_external = !empty( $each_logo['marketing_title_link']['is_external'] ) ? 'target="_blank"' : '';
													$title_nofollow = !empty( $each_logo['marketing_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
													$title_link_attr = $title_external.' '.$title_nofollow;
												  $content = !empty( $each_logo['marketing_content'] ) ? $each_logo['marketing_content'] : '';

												  $marketing_content = $content ? '<p>'.$content.'</p>' : '';
													$marketing_title_link = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;
													$marketing_title = $title ? '<h3 class="year-title">'.$marketing_title_link.'</h3>' : '';

													$output .= '<div class="item">
															          <div class="marketing-item">
															            <div class="year-wrap">
															              <div class="saspot-table-wrap">
															                <div class="saspot-align-wrap">
															                  '.$year.'
															                </div>
															              </div>
															            </div>
															            '.$marketing_title.$marketing_content.'
															          </div>
															        </div>';
												}
											}
				$output .= '</div>
							    </div>
							  </div>
							</div>';

		echo $output;
		
		
	}

	/**
	 * Render Marketing widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Marketing() );