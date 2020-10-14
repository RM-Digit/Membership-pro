<?php
/*
 * Elementor SaaSpot Indepth Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Indepth extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_indepth';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Indepth Videos', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-play-circle';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Indepth widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_indepth'];
	}
	*/
	
	/**
	 * Register SaaSpot Indepth widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_indepth',
			[
				'label' => esc_html__( 'Indepth Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'indepth_image',
			[
				'label' => esc_html__( 'Indepth Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);		
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your link here', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'indepth_subtitle',
			[
				'label' => esc_html__( 'Indepth Sub Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item subtitle here', 'saaspot-core' ),
				'default' => esc_html__( 'PRODUCTS', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'indepth_title',
			[
				'label' => esc_html__( 'Indepth Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'saaspot-core' ),
				'default' => esc_html__( 'How to get to Sesame Street', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'indepth_title_link',
			[
				'label' => esc_html__( 'Indepth Title Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'saaspot-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
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

	// Indepth		
	$this->start_controls_section(
		'section_indepth_style',
		[
			'label' => esc_html__( 'Indepth Options', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);
	$this->add_control(
		'overlay_color',
		[
			'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .indepth-item .saspot-image:before' => 'background-color: {{VALUE}};',
			],
		]
	);
	$this->add_control(
		'image_border_radius',
		[
			'label' => __( 'Image Border Radius', 'saaspot-core' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .indepth-item .saspot-image img, {{WRAPPER}} .indepth-item .saspot-image:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'{{WRAPPER}} .indepth-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_control(
		'content_margin_btm',
		[
			'label' => __( 'Section Margin', 'saaspot-core' ),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors' => [
				'{{WRAPPER}} .indepth-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		[
			'name' => 'content_border',
			'label' => esc_html__( 'Content Border', 'saaspot-core' ),
			'selector' => '{{WRAPPER}} .indepth-info',
		]
	);
	$this->end_controls_section();// end: Section

	// Button		
	$this->start_controls_section(
		'section_btn_style',
		[
			'label' => esc_html__( 'Button Options', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->start_controls_tabs( 'icon_style' );
		$this->start_controls_tab(
			'icon_normal',
			[
				'label' => esc_html__( 'Normal', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn:before, {{WRAPPER}} .video-btn:after' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
		
		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn:hover i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_border_hover_color',
			[
				'label' => esc_html__( 'Border Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-btn:hover:before, {{WRAPPER}} .video-btn:hover:after' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
	$this->end_controls_tabs(); // end tabs
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
			'name' => 'sasinde_title_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .indepth-info h4',
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
					'{{WRAPPER}} .indepth-info h4, {{WRAPPER}} .indepth-info h4 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .indepth-info h4 a:hover' => 'color: {{VALUE}};',
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
			'name' => 'sasinde_stitle_typography',
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .indepth-info h6',
		]
	);
	$this->add_control(
		'stitle_color',
		[
			'label' => esc_html__( 'Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .indepth-info h6' => 'color: {{VALUE}};',
			],
		]
	);
	$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Indepth widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$indepth_image = !empty( $settings['indepth_image']['id'] ) ? $settings['indepth_image']['id'] : '';
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';
		$indepth_title = !empty( $settings['indepth_title'] ) ? $settings['indepth_title'] : '';
		$title_link = !empty( $settings['indepth_title_link']['url'] ) ? $settings['indepth_title_link']['url'] : '';
		$title_external = !empty( $settings['indepth_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$title_nofollow = !empty( $settings['indepth_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$title_link_attr = $title_external.' '.$title_nofollow;
		$indepth_subtitle = !empty( $settings['indepth_subtitle'] ) ? $settings['indepth_subtitle'] : '';

		// Indepth
		$image_url = wp_get_attachment_url( $indepth_image );
		$image = $image_url ? '<img src="'.$image_url.'" alt="Indepth">' : '';

		$subtitle = $indepth_subtitle ? '<h6 class="indepth-subtitle">'.$indepth_subtitle.'</h6>' : '';
		$indepth_title_link = $title_link ? '<a href="'.$title_link.'" '.$title_link_attr.'>'.$indepth_title.'</a>' : $indepth_title;
		$title = $indepth_title ? '<h4 class="indepth-title">'.$indepth_title_link.'</h4>' : '';

		$video = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="saspot-video-btn"><span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span></a>' : '';

	  $output = '<div class="indepth-item">
	              <div class="saspot-image">
	                '.$image.'
	                <div class="indepth-video">
	                  <div class="saspot-table-wrap">
	                    <div class="saspot-align-wrap">
	                      '.$video.'
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <div class="indepth-info">'.$subtitle.$title.'</div>
	            </div>';

	  echo $output;
		
	}

	/**
	 * Render Indepth widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Indepth() );