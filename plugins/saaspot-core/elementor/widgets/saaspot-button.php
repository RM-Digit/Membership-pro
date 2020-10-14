<?php
/*
 * Elementor SaaSpot Button Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SaaSpot_Button extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-saaspot_button';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Button', 'saaspot-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-mouse-pointer';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the SaaSpot Button widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-saaspot_button'];
	}
	*/
	
	/**
	 * Register SaaSpot Button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_Button',
			[
				'label' => __( 'Button Options', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Button Style', 'saaspot-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One (Button)', 'saaspot-core' ),
					'style-two' => esc_html__( 'Style Two (Link With Text)', 'saaspot-core' ),
					'style-three' => esc_html__( 'Style Three (Link)', 'saaspot-core' ),
					'style-four' => esc_html__( 'Style Four (Image)', 'saaspot-core' ),
					'style-five' => esc_html__( 'Style Five (Video)', 'saaspot-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your Button style.', 'saaspot-core' ),
			]
		);
		$this->add_control(
			'link_style',
			[
				'label' => esc_html__( 'Link Style Two', 'saaspot-core' ),
				'type' => Controls_Manager::SWITCHER,
				'condition' => [
					'btn_style' => 'style-three',
				],
				'label_on' => esc_html__( 'Yes', 'saaspot-core' ),
				'label_off' => esc_html__( 'No', 'saaspot-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_responsive_control(
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .saaspot-btn-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_text_before',
			[
				'label' => esc_html__( 'Link Before Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button/Link Text', 'saaspot-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Button Text', 'saaspot-core' ),
				'placeholder' => esc_html__( 'Type btn text here', 'saaspot-core' ),
				'label_block' => true,
				'condition' => [
					'btn_style!' => array('style-four'),
				],
			]
		);
		$this->add_control(
			'btn_image',
			[
				'label' => esc_html__( 'Upload Image', 'saaspot-core' ),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'btn_style' => 'style-four',
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'saaspot-core'),
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
					'btn_style' => 'style-five',
				],
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'saaspot-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
				'condition' => [
					'btn_style!' => 'style-five',
				],
			]
		);
		$this->add_control(
			'btn_icon',
			[
				'label' => esc_html__( 'Icon', 'saaspot-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'fa fa-angle-right',
				'condition' => [
					'btn_style!' => array('style-four'),
				],
			]
		);
		$this->add_control(
			'icon_alignment',
			[
				'label' => esc_html__( 'Alignment', 'saaspot-core' ),
				'type' => Controls_Manager::CHOOSE,
				'condition' => [
					'btn_style!' => array('style-four'),
				],
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
			]
		);
		$this->end_controls_section();// end: Section
		
		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'saaspot-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'btn_style!' => array('style-four'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .saaspot-btn-wrap .saspot-btn, 
				{{WRAPPER}} .saspot-link-wrap .saspot-link,
				{{WRAPPER}} .saaspot-btn-wrap .create-account,
				{{WRAPPER}} .saaspot-btn-wrap .create-account .saspot-link',
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
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'saaspot-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn, 
						{{WRAPPER}} .saspot-link-wrap .saspot-link,
						{{WRAPPER}} .saaspot-btn-wrap .create-account .saspot-link' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saaspot-btn-wrap .create-account .saspot-link:after, {{WRAPPER}} .saspot-link-wrap .saspot-link:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saaspot-btn-wrap .saspot-btn',
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
						'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn:hover,
						{{WRAPPER}} .saaspot-btn-wrap .create-account .saspot-link:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saaspot-btn-wrap .saspot-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_border_hover_color',
				[
					'label' => esc_html__( 'Link Border Color', 'saaspot-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .saaspot-btn-wrap .create-account .saspot-link:hover:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'saaspot-core' ),
					'selector' => '{{WRAPPER}} .saaspot-btn-wrap .saspot-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		// Button
		$btn_style = !empty( $settings['btn_style'] ) ? $settings['btn_style'] : '';
		$video_link = !empty( $settings['video_link'] ) ? $settings['video_link'] : '';
		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
		$btn_text_before = !empty( $settings['btn_text_before'] ) ? $settings['btn_text_before'] : '';
		$btn_image = !empty( $settings['btn_image']['id'] ) ? $settings['btn_image']['id'] : '';
		$btn_icon = !empty( $settings['btn_icon'] ) ? $settings['btn_icon'] : '';
		$icon_alignment = !empty( $settings['icon_alignment'] ) ? $settings['icon_alignment'] : '';
		$btn_link = !empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty( $settings['btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';
		$link_style  = ( isset( $settings['link_style'] ) && ( 'true' == $settings['link_style'] ) ) ? true : false;
		
		if($link_style) {
		  $link_style_cls = ' link-wrap-style-two';
		} else {
		  $link_style_cls = '';
		}

		$icon = $btn_icon ? '<i class="'.$btn_icon.'" aria-hidden="true"></i>' : '';
		if($icon_alignment === 'left') {
		  $icon_left = $icon.' ';
		  $icon_right = '';
		} else {
		  $icon_left = '';
		  $icon_right = ' '.$icon;
		}

		$image_url = wp_get_attachment_url( $btn_image );

		if($btn_style === 'style-five') {
			$button = $video_link ? '<a href="#0" id="myUrl" data-toggle="modal" data-src="'.$video_link.'" data-target="#SaaSpotVideoModal" class="saspot-btn saspot-light-blue-btn">'.$icon_left.$btn_text.$icon_right.'</a>' : '';
		} elseif($btn_style === 'style-four') {
		  $button = $btn_link ? '<div class="saspot-image"><a href="'.$btn_link.'" '.$btn_link_attr.'><img src="'.$image_url.'" alt="Button"></a></div>' : '';
		} elseif($btn_style === 'style-three') {
		  $button = $btn_link ? '<div class="saspot-link-wrap'.$link_style_cls.'"><a href="'.$btn_link.'" '.$btn_link_attr.' class="saspot-link">'.$icon_left.$btn_text.$icon_right.'</a></div>' : '';
		} elseif ($btn_style === 'style-two') {
		  $button = $btn_link ? '<div class="create-account">'.$btn_text_before.' <a href="'.$btn_link.'" '.$btn_link_attr.' class="saspot-link">'.$icon_left.$btn_text.$icon_right.'</a></div>' : '';
		} else {
		  $button = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="saspot-btn saspot-light-blue-btn">'.$icon_left.$btn_text.$icon_right.'</a>' : '';
		}

		$output = '<div class="saaspot-btn-wrap">'.$button.'</div>';
		
		echo $output;
		
	}

	/**
	 * Render Button widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new SaaSpot_Button() );