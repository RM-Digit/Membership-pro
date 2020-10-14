<?php
/*
 * Elementor SaaSpot Image Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Image extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_image';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Image', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-picture-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Image widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_image'];
	}
	*/
	
	/**
	 * Register SaaSpot Image widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image Options', 'saaspot-core' ),
			]
		);

		$this->add_control(
			'saspot_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Image Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_responsive_control(
			'image_align',
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
		$this->add_control(
			'need_video',
			[
				'label' => esc_html__( 'Need Video Link', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
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
				'condition' => [
					'need_video' => 'true',
				],
			]
		);		
		$this->add_control(
			'saspot_image_animation',
			[
				'label' => esc_html__( 'Animation', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'entrance_animation',
			[
				'label' => esc_html__( 'Image Entrance Animation', 'saaspot-core' ),
				'type' => Controls_Manager::ANIMATION,
				'label_block' => true,
				'condition' => [
					'saspot_image_animation' => 'true',
				],
			]
		);
		$this->add_control(
			'entrance_animation_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'img_max_width',
			[
				'label' => esc_html__( 'Disable Max Width', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasimg_image_box_shadow',
				'label' => esc_html__( 'Image Box Shadow', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-image img',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'label' => esc_html__( 'Border', 'saaspot-core' ),
				'selector' => '{{WRAPPER}} .saspot-image img',
			]
		);
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saspot-image img, {{WRAPPER}} .video-wrap-inner:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	$this->end_controls_section();// end: Section

	// Content		
	$this->start_controls_section(
		'section_content_style',
		[
			'label' => esc_html__( 'Link Options', 'saaspot-core' ),
			'tab' => Controls_Manager::TAB_STYLE,
		]
	);

	$this->add_control(
		'overlay_color',
		[
			'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
			'type' => Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .video-wrap-inner:before' => 'background-color: {{VALUE}};',
			],
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
		
	}

	/**
	 * Render Image widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$image_align = !empty( $settings['image_align'] ) ? $settings['image_align'] : '';
		$saspot_image = !empty( $settings['saspot_image']['id'] ) ? $settings['saspot_image']['id'] : '';
		$image_link = !empty( $settings['image_link']['url'] ) ? $settings['image_link']['url'] : '';
		$image_link_external = !empty( $settings['image_link']['is_external'] ) ? 'target="_blank"' : '';
		$image_link_nofollow = !empty( $settings['image_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$image_link_attr = !empty( $image_link ) ?  $image_link_external.' '.$image_link_nofollow : '';

		$saspot_image_animation  =  !empty( $settings['saspot_image_animation'] ) ? $settings['saspot_image_animation'] : '';
		$img_max_width  = !empty( $settings['img_max_width'] ) ? $settings['img_max_width'] : '';
		$need_video = !empty( $settings['need_video'] ) ? $settings['need_video'] : '';
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';
		$entrance_animation = !empty( $settings['entrance_animation'] ) ? $settings['entrance_animation'] : '';	
		$entrance_animation_delay = !empty( $settings['entrance_animation_delay'] ) ? $settings['entrance_animation_delay'] : '';	

		// Image
		$image_url = wp_get_attachment_url( $saspot_image );
		$saaspot_alt = get_post_meta($saspot_image, '_wp_attachment_image_alt', true);

		if($img_max_width === 'true') {
		  $max_width_cls = ' no-max-width';
		} else {
		  $max_width_cls = '';
		}

		$entrance_animation = $entrance_animation ? $entrance_animation : 'fadeInUp';
		$entrance_animation_delay = $entrance_animation_delay ? $entrance_animation_delay : '1';
		if($saspot_image_animation === 'true') {
		  $animate_time = ' data-wow-duration="1s" data-wow-delay="'.$entrance_animation_delay.'s"';
		  $animate_cls = $entrance_animation;
		} else {
		  $animate_time = '';
		  $animate_cls = '';
		}

		$image = $image_link ? '<a href="'.$image_link.'" '.$image_link_attr.'><img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'"></a>' : '<img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'">';

		$video = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="saspot-video-btn"><span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span></a>' : '';

		if ($need_video === 'true') {
			$output = '<div class="video-wrap-inner wow '.$animate_cls.'"'.$animate_time.'>
	                <div class="saspot-image">
	                  '.$video.'
	                	<img src="'.esc_url($image_url).'" alt="'.$saaspot_alt.'">
	                </div>
	              </div>';
		} else {
		  $output = '<div class="saspot-image wow '.$animate_cls.$max_width_cls.'"'.$animate_time.'>'.$image.'</div>';
		}

	  echo $output;
		
	}

	/**
	 * Render Image widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Image() );