<?php
/*
 * Elementor SaaSpot Conference Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Conference extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_conference';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Conference Places', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-map-pin';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Conference widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_conference'];
	}
	*/
	
	/**
	 * Register SaaSpot Conference widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_conference',
			[
				'label' => esc_html__( 'Conference Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'conference_image',
			[
				'label' => esc_html__( 'Conference Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);		
		$this->add_control(
			'conference_subtitle',
			[
				'label' => esc_html__( 'Conference Sub Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item subtitle here', 'saaspot-core' ),
				'default' => esc_html__( 'SEPTEMBER 26, 2018', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'conference_title',
			[
				'label' => esc_html__( 'Conference Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
				'default' => esc_html__( 'France', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'conference_title_link',
			[
				'label' => esc_html__( 'Conference Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$this->add_control(
			'conference_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'frontend_available' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspot-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'saaspot-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspot-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
	$this->end_controls_section();// end: Section

	// Conference		
	$this->start_controls_section(
		'section_conference_style',
		[
			'label' => esc_html__( 'Conference Options', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'sasconf_image_box_shadow',
			'label' => esc_html__( 'Box Shadow', 'saaspot-core' ),
			'selector' => '{{WRAPPER}} .place-item',
		]
	);
	$this->add_control(
		'image_border_radius',
		[
			'label' => __( 'Image Border Radius', 'saaspot-core' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .place-item .saspot-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_control(
		'content_border_radius',
		[
			'label' => __( 'Content Border Radius', 'saaspot-core' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .place-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		[
			'name' => 'content_border',
			'label' => esc_html__( 'Content Border', 'saaspot-core' ),
			'selector' => '{{WRAPPER}} .place-info',
		]
	);
	$this->end_controls_section();// end: Section

	// Title
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
			'label' => esc_html__( 'Typography', 'saaspot-core' ),
			'name' => 'sasconf_title_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .place-info h4',
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
					'{{WRAPPER}} .place-info h4, {{WRAPPER}} .place-info h4 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .place-info h4 a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
	$this->end_controls_tabs(); // end tabs
	$this->end_controls_section();// end: Section

	// Sub Title
	$this->start_controls_section(
		'section_stitle_style',
		[
			'label' => esc_html__( 'Sub Title', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		[
			'label' => esc_html__( 'Typography', 'saaspot-core' ),
			'name' => 'sasconf_stitle_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .place-info h6',
		]
	);
	$this->add_control(
		'stitle_color',
		[
			'label' => esc_html__( 'Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .place-info h6' => 'color: {{VALUE}};',
			],
		]
	);
	$this->end_controls_section();// end: Section
	// Content
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
			'selector' => '{{WRAPPER}} .place-info p',
		]
	);
	$this->add_control(
		'content_color',
		[
			'label' => esc_html__( 'Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .place-info p' => 'color: {{VALUE}};',
			],
		]
	);
	$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Conference widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$conference_image = !empty( $settings['conference_image']['id'] ) ? $settings['conference_image']['id'] : '';
		$conference_title = !empty( $settings['conference_title'] ) ? $settings['conference_title'] : '';
		$title_link = !empty( $settings['conference_title_link']['url'] ) ? $settings['conference_title_link']['url'] : '';
		$title_external = !empty( $settings['conference_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$title_nofollow = !empty( $settings['conference_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$title_link_attr = $title_external.' '.$title_nofollow;
		$conference_subtitle = !empty( $settings['conference_subtitle'] ) ? $settings['conference_subtitle'] : '';
		$conference_content = !empty( $settings['conference_content'] ) ? $settings['conference_content'] : '';

		// Conference
		$image_url = wp_get_attachment_url( $conference_image );
		$image = $image_url ? '<div class="saspot-image"><img src="'.$image_url.'" alt="Conference"></div>' : '';

		$conference_title_link = $title_link ? '<a href="'.$title_link.'" '.$title_link_attr.'>'.$conference_title.'</a>' : $conference_title;
		$title = $conference_title ? '<h4 class="place-title">'.$conference_title_link.'</h4>' : '';
		$subtitle = $conference_subtitle ? '<h6 class="place-subtitle">'.$conference_subtitle.'</h6>' : '';
		$content = $conference_content ? '<p>'.$conference_content.'</p>' : '';

	  $output = '<div class="place-item">'.$image.'<div class="place-info">'.$title.$subtitle.$content.'</div></div>';

	  echo $output;
		
	}

	/**
	 * Render Conference widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Conference() );