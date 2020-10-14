<?php
/*
 * Elementor SaaSpot Video Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Video extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_video';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Video', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-video-camera';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Video widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_video'];
	}
	*/
	
	/**
	 * Register SaaSpot Video widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_video',
			[
				'label' => esc_html__( 'Video Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'video_style',
			[
				'label' => esc_html__( 'Custom Width', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your video style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'video_title',
			[
				'label' => esc_html__( 'Title', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'video_style' => array('style-two','style-three'),
				],
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is video link', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Enter your link here', 'saaspot-core' ),				
			]
		);		
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-video:before' => 'background-color: {{VALUE}};',
				],
			]
		);	
		$this->add_responsive_control(
			'video_height',
			[
				'label' => esc_html__( 'Section Height', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-video' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	// Video		
	$this->start_controls_section(
		'section_video_style',
		[
			'label' => esc_html__( 'Button Style', 'saaspot-core' ),
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
				'name' => 'sasvid_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .video-wrap h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Video widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$video_style = !empty( $settings['video_style'] ) ? $settings['video_style'] : '';
		$bg_image = !empty( $settings['bg_image']['id'] ) ? $settings['bg_image']['id'] : '';
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';
		$video_title = !empty( $settings['video_title'] ) ? $settings['video_title'] : '';

		// Video
		$image_url = wp_get_attachment_url( $bg_image );

		$title = $video_title ? '<h2 class="video-title">'.$video_title.'</h2>' : '';
		$video = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="saspot-video-btn"><span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span></a>' : '';

		if($video_style === 'style-two') {
	  	$output = '<div class="saspot-video video-style-two saspot-parallax" style="background-image: url('.$image_url.');">
								  <div class="container">
								    <div class="video-wrap">
								      '.$video.$title.'
								    </div>
								  </div>
								</div>';
		} elseif ($video_style === 'style-three') {
		  $output = '<div class="saspot-video video-style-three saspot-parallax saspot-overlay" style="background-image: url('.$image_url.');">
								  <div class="container">
								    <div class="video-wrap">
								      '.$video.$title.'
								    </div>
								  </div>
								</div>';
		} else {
		  $output = '<div class="saspot-video saspot-parallax" style="background-image: url('.$image_url.');">
								  <div class="saspot-table-wrap">
								    <div class="saspot-align-wrap">
								      <div class="container">
								        '.$video.'
								      </div>
								    </div>
								  </div>
								</div>';
		}


	  echo $output;
		
	}

	/**
	 * Render Video widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Video() );