<?php
/*
 * Elementor SaaSpot Banner Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Banner extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_banner';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Banner', 'saaspot-core' );
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
	 * Retrieve the list of scripts the SaaSpot Banner widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_banner'];
	}
	*/
	
	/**
	 * Register SaaSpot Banner widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_banner',
			[
				'label' => __( 'Banner Content', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your image.', 'saaspot-core'),
			]
		);
		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Title Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'saaspot-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'banner_content',
			[
				'label' => esc_html__( 'Content', 'saaspot-core' ),
				'default' => esc_html__( 'your content text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'saaspot-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'section_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_banner_btn',
			[
				'label' => esc_html__( 'Button Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Button/Link Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Button)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (video)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your button style.', 'saaspot-core' ),
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
					'btn_style' => array('style-two'),
				],			
			]
		);
		$this->add_control(
			'banner_btn',
			[
				'label' => esc_html__( 'Button Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'banner_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'btn_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'banner_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'btn_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'saaspot-core' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'saaspot-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'right',
				'condition' => [
					'btn_style' => array('style-one'),
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'banner_style',
			[
				'label' => esc_html__( 'Banner Style', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saspot-overlay:before' => 'background-color: {{VALUE}};',
				],
			]
		);	
		$this->add_responsive_control(
			'caption_min_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption' => 'max-width: {{SIZE}}{{UNIT}};',
				],
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
				'name' => 'sasban_title_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption h1',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'saaspot-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner-caption h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __( 'Title Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .banner-caption p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption p' => 'color: {{VALUE}};',
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
				'condition' => [
					'btn_style' => array('style-two'),
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

		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button Style', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_style' => array('style-one'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .banner-caption .saspot-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'saaspot-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption .saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption .saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .banner-caption .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .saspot-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .saspot-btn',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'saaspot-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .saspot-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-caption .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .banner-caption .saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$section_alignment = !empty( $settings['section_alignment'] ) ? $settings['section_alignment'] : '';	
		$bg_image = !empty( $settings['bg_image']['id'] ) ? $settings['bg_image']['id'] : '';	
		$banner_title = !empty( $settings['banner_title'] ) ? $settings['banner_title'] : '';	
		$banner_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';	

		$btn_style = !empty( $settings['btn_style'] ) ? $settings['btn_style'] : '';	
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';	
		$banner_btn = !empty( $settings['banner_btn'] ) ? $settings['banner_btn'] : '';	
		$banner_btn_link = !empty( $settings['banner_btn_link']['url'] ) ? $settings['banner_btn_link']['url'] : '';
		$banner_btn_link_external = !empty( $settings['banner_btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$banner_btn_link_nofollow = !empty( $settings['banner_btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$banner_btn_link_attr = !empty( $banner_btn_link ) ?  $banner_btn_link_external.' '.$banner_btn_link_nofollow : '';

		$banner_btn_icon = !empty( $settings['banner_btn_icon'] ) ? $settings['banner_btn_icon'] : '';	
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';	

		// Image
		$image_url = wp_get_attachment_url( $bg_image );

		$title = $banner_title ? '<h1 class="banner-title">'.$banner_title.'</h1>' : '';
		$content = $banner_content ? '<p>'.$banner_content.'</p>' : '';

		$icon = $banner_btn_icon ? '<i class="'.$banner_btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}
		if($btn_style === 'style-two') {
		  $button = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="saspot-video-btn"><span class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></span></a>' : '';
		} else {
		  $button = $banner_btn_link ? '<div class="saspot-btn-wrap"><a href="'.$banner_btn_link.'" '.$banner_btn_link_attr.' class="saspot-btn saspot-light-blue-btn">'.$icon_left.$banner_btn.$icon_right.'</a></div>' : '';
		}

		if($section_alignment === 'left') {
			$align_class = ' left-align';
		} elseif ($btn_style === 'right') {
			$align_class = ' right-align';
		} else {
			$align_class = ' center-align';
		}
		$output = '<div class="saspot-banner saspot-overlay saspot-parallax" style="background-image: url('.$image_url.');">
							  <div class="saspot-table-wrap">
							    <div class="saspot-align-wrap">
							      <div class="container">
							        <div class="banner-caption'.$align_class.'">
							          '.$title.$content.$button.'
							        </div>
							      </div>
							    </div>
							  </div>
							</div>';
		echo $output;
		
	}

	/**
	 * Render Banner widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Banner() );